<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudySessionResource\Pages;
use App\Filament\Resources\StudySessionResource\RelationManagers;
use App\Models\StudyGroup;
use App\Models\StudySession;
use App\Traits\AdminAuthorization;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class StudySessionResource extends Resource
{
    use AdminAuthorization;

    protected static ?string $model = StudySession::class;

    protected static ?string $navigationLabel = 'Sessions';

    protected static ?string $navigationGroup = 'Manage Centre';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('study_group_id')
                    ->label('Study Group')
                    ->relationship('studyGroup', 'name')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (callable $set, $state) {
                        $studyGroup = StudyGroup::find($state);
                        if ($studyGroup) {
                            $set('from_time', $studyGroup->from_time->format('H:i'));
                            $set('to_time', $studyGroup->to_time->format('H:i'));
                        }
                    }),
                DatePicker::make('date')
                    ->label('Date')
                    ->native(false)
                    ->required(),
                DateTimePicker::make('from_time')
                    ->prefix('Starts at')
                    ->label('Time')
                    ->withoutDate()
                    ->withoutSeconds(),
                DateTimePicker::make('to_time')
                    ->prefix('Ends at .')
                    ->label('Time')
                    ->withoutDate()
                    ->withoutSeconds()
                    ->after('from_time'),
                BelongsToManyMultiSelect::make('teacher_ids')
                    ->relationship('teachers', 'name')
                    ->options(function (callable $get) {
                        $studyGroupId = $get('study_group_id');
                        return $studyGroupId ? StudyGroup::find($studyGroupId)->teachers()->pluck('name', 'id') : [];
                    })
                    ->visible(fn ($get) => $get('study_group_id') !== null)
                    ->reactive(),
                BelongsToManyMultiSelect::make('student_ids')
                    ->relationship('students', 'name')
                    ->options(function (callable $get) {
                        $studyGroupId = $get('study_group_id');
                        return $studyGroupId ? StudyGroup::find($studyGroupId)->students()->pluck('name', 'id') : [];
                    })
                    ->visible(fn ($get) => $get('study_group_id') !== null)
                    ->reactive(),
                Textarea::make('description')
                    ->label('Description'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('studyGroup.name')->label('Study Group')->searchable(),

                TextColumn::make('date')->date()->sortable(),

                TextColumn::make('from_time')
                    ->dateTime('H:i')
                    ->label('From')->alignCenter(),

                TextColumn::make('to_time')
                    ->dateTime('H:i')
                    ->label('To')->alignCenter(),

                TextColumn::make('attendanceSummary')
                    ->label('Attended')->alignCenter(),

            ])
            ->filters([
                SelectFilter::make('studyGroup')->searchable()->label('Class')
                    ->relationship('studyGroup', 'name'),
                DateRangeFilter::make('date')
                    ->label('Date range')
                    ->timezone('UTC')
                    ->firstDayOfWeek(1)
                    ->alwaysShowCalendar()
                    ->setTimePickerOption()
                    ->setTimePickerIncrementOption(2)
                    ->setAutoApplyOption()
                    ->setLinkedCalendarsOption()
                    ->disabledDates(['array of Dates'])
                    ->minDate(\Carbon\Carbon::now()->subMonth())
                    ->maxDate(\Carbon\Carbon::now()->addMonth())
                    ->displayFormat('YYYY-MM-DD')
                    ->withIndicator()
                    ->ranges([
                        'Today' => [now()->startOfDay(), now()->endOfDay()],
                        'Yesterday' => [now()->subDay()->startOfDay(), now()->subDay()->endOfDay()],
                        'This Month [' . now()->format('F') . ']' => [now()->startOfMonth(), now()->endOfMonth()],
                        'This Year [' . now()->format('Y') . ']' => [now()->startOfYear(), now()->endOfYear()],
                        'Last Year [' . now()->subYear()->format('Y') . ']' => [now()->subYear()->startOfYear(), now()->endOfYear()],
                    ])
                    ->useRangeLabels()
                    ->disableCustomRange()
                    ->separator(' to ')
                    ->query(function (Builder $query, array $data): Builder {

                        $admissionDate = $data['date'] ?? null;

                        [$startDate, $endDate] = array_pad(explode(' to ', $admissionDate ?? '', 2), 2, null);

                        if ($startDate && $endDate) {
                            return $query->whereBetween('date', [$startDate, $endDate]);
                        }

                        return $query;
                    })->withIndicator(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
//                Tables\Actions\Action::make('markAttendance')
//                    ->url(fn ($record) => route('filament.admin.resources.study-sessions.mark-attendance', ['session' => $record->id]))
//                    ->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ])->authorize(self::isAdmin()),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStudySessions::route('/'),
            'create' => Pages\CreateStudySession::route('/create'),
            //'edit' => Pages\EditStudySession::route('/{record}/edit'),
        ];
    }
}
