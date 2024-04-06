<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyGroupResource\Pages;
//use App\Filament\Resources\StudyGroupResource\RelationManagers;
use App\Models\Course;
use App\Models\Day;
use App\Models\Location;
use App\Models\StudyGroup;
use Carbon\Carbon;
use Closure;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Illuminate\Support\Str;

class StudyGroupResource extends Resource
{
    protected static ?string $model = StudyGroup::class;

    protected static ?string $navigationLabel = 'Classes';

    protected static ?string $navigationGroup = 'Manage Centre';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\BelongsToSelect::make('course')
                ->relationship('course', 'name')->searchable()
                ->reactive()
                ->afterStateUpdated(self::updateGroupNameBasedOnState()),

            Forms\Components\TextInput::make('name')
                ->placeholder('Name will be auto-generated on save')
                ->label('Group Name')->reactive()
                ->disabled()
                ->dehydrated(),

            Group::make([
                Group::make([
                    DateTimePicker::make('from_time')
                        ->prefix('Starts at')
                        ->label('Time Period')
                        ->withoutDate()
                        ->withoutSeconds()
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(self::updateGroupNameBasedOnState()),

                    DateTimePicker::make('to_time')
                        ->prefix('Ends at .')
                        ->label('')
                        ->withoutDate()
                        ->withoutSeconds()
                        ->required()
                        ->after('from_time')
                        ->reactive()
                        ->afterStateUpdated(self::updateGroupNameBasedOnState()),

                ])->columnSpan([
                    'sm' => 2,
                ]),
            ]),
            Forms\Components\Textarea::make('description')
                ->label('Description'),

            Forms\Components\BelongsToManyMultiSelect::make('students')
                ->relationship('students', 'name'),

            Forms\Components\BelongsToManyMultiSelect::make('teachers')
                ->relationship('teachers', 'name'),

            Forms\Components\BelongsToSelect::make('location')
                ->relationship('location', 'address_line')->reactive()
                ->afterStateUpdated(self::updateGroupNameBasedOnState())->required(),

            Forms\Components\CheckboxList::make('days')
                ->relationship('days', 'day')
                ->reactive()->required()
                ->afterStateUpdated(self::updateGroupNameBasedOnState()),

        ]);
    }

    protected static function updateGroupNameBasedOnState(): Closure
    {
        return function ($state, $set, $get, $record) {
            // Check if a state is set to prevent unnecessary operations
            if (!$state) return;

            $set('name', self::generateGroupName($get, $record));
        };
    }

    protected static function generateGroupName($get, $record): string
    {

        $course_code = Course::find($get('course'))->code; //$record->course->first();
        $location_code = Location::find($get('location'))->code;
        $daysCollection = Day::findMany($get('days'));

        $fromTime = $get('from_time') ? Carbon::parse($get('from_time'))->format('Hi') : '';

        $days = $daysCollection->isNotEmpty() ? implode('_', $daysCollection->pluck('short')->toArray()) : '';

        $name = "{$course_code}_{$fromTime}_{$days}_{$location_code}";

        return strtoupper($name);
    }




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('name')
//                    ->label('Name')->searchable(),
                Tables\Columns\TextColumn::make('course.name')
                    ->label('Course')->searchable(),
                Tables\Columns\TextColumn::make('location.code')
                    ->label('Location'),
//                Tables\Columns\TextColumn::make('from_time')
//                    ->date()
//                    ->label('Date'),
                Tables\Columns\TextColumn::make('from_time')
                    ->dateTime('H:i')
                    ->label('From'),
                Tables\Columns\TextColumn::make('to_time')
                    ->dateTime('H:i')
                    ->label('To'),
                Tables\Columns\TextColumn::make('days.short'),
                // Tables\Columns\TextColumn::make('duration')->label('Duration (min)'),
//                Tables\Columns\TextColumn::make('description')
//                    ->label('Description')->limit(50),
            ])
            ->filters([
                SelectFilter::make('location')
                    ->relationship('location', 'address_line', fn (Builder $query) => $query),
                SelectFilter::make('day')
                    ->relationship('days', 'day', fn (Builder $query) => $query),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListStudyGroups::route('/'),
            'create' => Pages\CreateStudyGroup::route('/create'),
            //'edit' => Pages\EditStudyGroup::route('/{record}/edit'),
        ];
    }
}
