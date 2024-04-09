<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudentResource\Pages;
// use App\Filament\Resources\StudentResource\RelationManagers;
use App\Filament\Resources\StudentResource\Widgets\StudentOverview;
use App\Models\Course;
use App\Models\Student;
use App\Traits\AdminAuthorization;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Malzariey\FilamentDaterangepickerFilter\Filters\DateRangeFilter;

class StudentResource extends Resource
{
    use AdminAuthorization;
    protected static ?string $model = Student::class;

    protected static ?string $navigationGroup = 'Manage Centre';

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('address'),
                Forms\Components\TextInput::make('mobile')->tel(),
                Forms\Components\DateTimePicker::make('admission_date'),
                Forms\Components\DatePicker::make('dob')->label('Date of birth'),
                Forms\Components\Toggle::make('status')->label('Active status'),
                Forms\Components\TextInput::make('sid')->required()->unique(ignoreRecord: true),
                Forms\Components\BelongsToManyCheckboxList::make('courses')->relationship('courses', 'name'),
            ]);
    }

    public static function table(Table $table): Table
    {
        $isAdmin = auth()->user()->hasRole('admin');

        $columns = [
            Tables\Columns\TextColumn::make('sid')->searchable()->sortable()->label('SID')->toggleable(isToggledHiddenByDefault: !self::isAdmin()),

            Tables\Columns\TextColumn::make('name')->searchable()->sortable(),

            Tables\Columns\TextColumn::make('mobile')->searchable()->sortable()->copyable(),

            Tables\Columns\TextColumn::make('address')->searchable()->sortable()->toggleable(isToggledHiddenByDefault: !self::isAdmin()),

            Tables\Columns\TextColumn::make('admission_date')->date()->searchable()->sortable()->toggleable(isToggledHiddenByDefault: true),

            Tables\Columns\TextColumn::make('attendance')->label('Att.')->copyable(),

            Tables\Columns\TextColumn::make('attendance_score')
                ->label('Att. score')
                ->badge()
                ->colors([
                    'danger' => fn ($state): bool => $state < 50,
                    'warning' => fn ($state): bool => $state >= 50 && $state < 75,
                    'success' => fn ($state): bool => $state >= 75,
                ])
                ->copyable()
                ->sortable()
                ->alignCenter(),

//            Tables\Columns\TextColumn::make('status')->visible($isAdmin)
//                ->badge()
//                ->color(fn (string $state): string => match ($state) {
//                    '1' => 'success',
//                    '0' => 'danger',
//                })->formatStateUsing(function ($state) {
//                    return $state == '1' ? 'Active' : 'Inactive';
//                }),
        ];

        return $table
            ->columns($columns)
            ->filters([
                SelectFilter::make('courses')->searchable()
                    ->relationship('courses', 'name', fn (Builder $query) => $query),
                DateRangeFilter::make('admission_date')
                    ->label('Admission Date')
                    ->timezone('UTC')
                    ->firstDayOfWeek(1)
                    ->alwaysShowCalendar(false)
                    ->setTimePickerOption(true)
                    ->setTimePickerIncrementOption(2)
                    ->setAutoApplyOption(true)
                    ->setLinkedCalendarsOption(true)
                    ->disabledDates(['array of Dates'])
                    ->minDate(\Carbon\Carbon::now()->subMonth())
                    ->maxDate(\Carbon\Carbon::now()->addMonth())
                    ->displayFormat('YYYY-MM-DD')
                    ->withIndicator()
                    ->ranges([
                        'This Month [' . now()->format('F') . ']' => [now()->startOfMonth(), now()->endOfMonth()],
                        'This Year [' . now()->format('Y') . ']' => [now()->startOfYear(), now()->endOfYear()],
                        'Last Year [' . now()->subYear()->format('Y') . ']' => [now()->subYear()->startOfYear(), now()->endOfYear()],
                    ])
                    ->useRangeLabels()
                    ->disableCustomRange()
                    ->separator(' to ')
                    ->query(function (Builder $query, array $data): Builder {

                        $admissionDate = $data['admission_date'] ?? null;

                        [$startDate, $endDate] = array_pad(explode(' to ', $admissionDate ?? '', 2), 2, null);

                        if ($startDate && $endDate) {
                            return $query->whereBetween('admission_date', [$startDate, $endDate]);
                        }

                        return $query;
                    })->withIndicator(),

                SelectFilter::make('status')
                    ->options([
                        '' => 'All',
                        '1' => 'Active',
                        '0' => 'Inactive',
                    ])
                    ->default('')
                    ->selectablePlaceholder(false)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\BulkAction::make('addToCourse')
                        ->label('Add to Course')
                        ->action(function (Collection $records, array $data) {
                            foreach ($records as $record) {
                                $record->courses()->attach($data['course_id']);
                            }
                        })->icon('heroicon-o-user-plus')
                        ->form([
                            Forms\Components\Select::make('course_id')
                                ->label('Course')
                                ->options(Course::all()->pluck('name', 'id'))
                                ->searchable()
                                ->required(),
                        ]),
                    ])->authorize(self::isAdmin())->label('Actions'),
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
            'index' => Pages\ListStudents::route('/'),
            'create' => Pages\CreateStudent::route('/create'),
            //'edit' => Pages\EditStudent::route('/{record}/edit'),
        ];
    }
}
