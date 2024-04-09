<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Student;
use App\Models\Teacher;
use BladeUI\Icons\Components\Icon;
use Carbon\Carbon;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Indicator;
use Filament\Tables\Filters\SelectFilter;
use App\Models\Attendance;
use App\Models\StudySession;
use Filament\Tables\Actions\Action;
use Filament\Forms;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class AttendanceResource extends Resource
{
    protected static ?string $model = StudySession::class;

    protected static ?string $modelLabel = 'Attendance';

    protected static ?string $navigationLabel = 'Attendance';

    protected static ?string $navigationGroup = 'Manage Centre';

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('studyGroup.name')->label('Study Group')->searchable(),

                TextColumn::make('date')->date()->sortable(),

                TextColumn::make('attendanceSummary')
                    ->label('Attended')->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('studyGroup')->searchable()->label('Class')
                    ->relationship('studyGroup', 'name')
                    ->preload(),

                SelectFilter::make('teacher')
                    ->relationship('teachers', 'name')
                    ->searchable()
                    ->preload(),

                Filter::make('date_range')
                    ->form([
                        Select::make('dateRange')
                            ->options([
                                'today' => 'Today',
                                'yesterday' => 'Yesterday',
                                'this_month' => 'This Month',
                                'this_year' => 'This Year',
                            ])->native(false),
                    ])
                    ->query(function (Builder $query, array $data): Builder {

                        $selectedOption = $data['dateRange'] ?? null;

                        switch ($selectedOption) {
                            case 'today':
                                $startDate = now()->startOfDay();
                                $endDate = now()->endOfDay();
                                break;
                            case 'yesterday':
                                $startDate = now()->subDay()->startOfDay();
                                $endDate = now()->subDay()->endOfDay();
                                break;
                            case 'this_month':
                                $startDate = now()->startOfMonth();
                                $endDate = now()->endOfMonth();
                                break;
                            case 'this_year':
                                $startDate = now()->startOfYear();
                                $endDate = now()->endOfYear();
                                break;
                            default:
                                $startDate = null;
                                $endDate = null;
                                break;
                        }

                        return $query
                            ->when(
                                $startDate,
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '>=', $startDate),
                            )
                            ->when(
                                $endDate,
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '<=', $endDate),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        $selectedKey = $data['dateRange'] ?? null;

                        if ($selectedKey) {
                            // Replace underscores with spaces and capitalize the first letter of each word
                            $formattedLabel = ucwords(str_replace('_', ' ', $selectedKey));

                            // Create an indicator with the formatted label
                            $indicators[] = Indicator::make('Period [' . $formattedLabel . ']')
                                ->color('primary'); // Example: Set the color of the indicator
                        }
                        return $indicators;
                    }),
                Filter::make('data')
                    ->form([
                        DatePicker::make('from')->native(false),
                        DatePicker::make('until')->native(false),
                    ])
                    // ...
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];

                        if ($data['from'] ?? null) {
                            $indicators[] = Indicator::make('From ' . Carbon::parse($data['from'])->toFormattedDateString())
                                ->removeField('from');
                        }

                        if ($data['until'] ?? null) {
                            $indicators[] = Indicator::make('Until ' . Carbon::parse($data['until'])->toFormattedDateString())
                                ->removeField('until');
                        }

                        return $indicators;
                    })
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['from'],
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '>=', $date),
                            )
                            ->when(
                                $data['until'],
                                fn(Builder $query, $date): Builder => $query->whereDate('date', '<=', $date),
                            );
                    })

//                SelectFilter::make('teachers')
//                    ->options(function () {
//                        return ['mine' => 'Mine'] + Teacher::pluck('name', 'id')->toArray();
//                    })
//                    ->query(function (Builder $query, $data): Builder {
//                        if ($data['teachers'] === 'mine') {
//                            return $query->whereHas('teachers', function ($query) {
//                                $query->where('teachers.id', Auth::user()->teacher->id);
//                            });
//                        }
//
//                        return $query->whereHas('teachers', function ($query) use ($data) {
//                            $query->where('teachers.id', $data['teachers']);
//                        });
//                    })
        ])
            ->defaultSort('date', 'desc') // Sort by date (
            ->actions([
                Tables\Actions\EditAction::make()
                    ->url(fn ($record) => route('filament.admin.resources.attendances.mark-attendance', ['record' => $record->id]))
                    ->icon('heroicon-o-pencil')->label('Mark')
//                    ->visible(function ($record) {
//                        // Assuming every user has a 'teacher' relationship or attribute
//                        $teacherId = auth()->user()->teacher->id ?? null;
//
//                        // If there's no teacher ID available for the user, hide the action
//                        if (!$teacherId) {
//                            return false;
//                        }
//
//                        // Check if the current teacher is associated with the session
//                        return $record->teachers->contains($teacherId);
//                    }),
            //->disabled(fn ($record) => !$record->teachers->contains(auth()->user()->teacher->id ?? null)),
            ])
            ->selectable(true)
            ->bulkActions([
//                BulkAction::make('toggle_attended')
//                    ->label('Toggle Attended Status')
//                    ->action(function ($records, $data): void {
//                        foreach ($records as $record) {
//                            $record->attended = !$record->attended;
//                            $record->save();
//                        }
//                    })
//                    ->deselectRecordsAfterCompletion()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canEdit(Model $record): bool
    {
        return Gate::allows('markAttendance', $record);
    }

    public static function canView(Model $record): bool
    {
        return true;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
            'create' => Pages\CreateAttendance::route('/create'),
            'mark-attendance' => Pages\MarkAttendance::route('/{record}/mark-attendance'),
        ];
    }
}
