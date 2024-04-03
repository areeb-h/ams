<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudyGroupResource\Pages;
//use App\Filament\Resources\StudyGroupResource\RelationManagers;
use App\Models\Course;
use App\Models\Day;
use App\Models\Location;
use App\Models\StudyGroup;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Group;
use Illuminate\Support\Str;

class StudyGroupResource extends Resource
{
    protected static ?string $model = StudyGroup::class;

    protected static ?string $navigationGroup = 'Manage Centre';

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\BelongsToSelect::make('course')
                ->relationship('course', 'name')->searchable()
                ->reactive() // Make sure the field is reactive to update the form on change.
                ->afterStateUpdated(function ($state, $set, $get) {
                    $set('name', self::generateGroupName($get));
                }),

            Forms\Components\TextInput::make('name')
                ->placeholder('Name will be auto-generated on save')
                ->label('Group Name'),
                //->disabled(),

            Group::make([
                Group::make([
                    DateTimePicker::make('from_time')
                        ->prefix('Starts at')
                        ->label('Time Period')
                        ->withoutDate()
                        ->withoutSeconds()
                        ->required()
                        ->reactive()
                        ->afterStateUpdated(function ($state, $set, $get) {
                            $set('name', self::generateGroupName($get));
                        }),
                    DateTimePicker::make('to_time')
                        ->prefix('Ends at .')
                        ->label('')
                        ->withoutDate()
                        ->withoutSeconds()
                        ->required()
                        ->after('from_time')
                        ->reactive()
                        ->afterStateUpdated(function ($state, $set, $get) {
                            $set('name', self::generateGroupName($get));
                        }),
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
                ->relationship('location', 'address_line')->searchable()
                ->afterStateUpdated(function ($state, $set, $get) {
                    $set('name', self::generateGroupName($get));
                }),
            Forms\Components\CheckboxList::make('days')
                ->relationship('days', 'day')
                ->reactive()
                ->afterStateUpdated(function ($state, $set, $get) {
                    $set('name', self::generateGroupName($get));
                }),
            ]);
    }

    protected static function generateGroupName($get): string
    {
        // Fetch all necessary data to build group name
        $courseName = $get('course') ? str_replace(' ', '_', Course::find($get('course'))->name) : 'NON';
        $fromTime = $get('from_time') ? Carbon::parse($get('from_time'))->format('Hi') : '';
        $toTime = $get('to_time') ? Carbon::parse($get('to_time'))->format('Hi') : '';
        $days = $get('days') ? implode('_', Day::findMany($get('days'))->pluck('short')->toArray()) : '';
        $location = $get('location') ? Location::find($get('location'))->code : 'hmp1';

        // Combine data to generate name
        $name = "{$courseName}_{$fromTime}_{$toTime}_{$days}_{$location}";

        // Convert to a slug or any format you prefer
        return strtoupper($name);

        //return Str::slug($name);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Name'),
                Tables\Columns\TextColumn::make('course.name')
                    ->label('Course'),
//                Tables\Columns\TextColumn::make('from_time')
//                    ->date()
//                    ->label('Date'),
                Tables\Columns\TextColumn::make('from_time')
                    ->dateTime('H:i')
                    ->label('From'),
                Tables\Columns\TextColumn::make('to_time')
                    ->dateTime('H:i')
                    ->label('To'),
                Tables\Columns\TextColumn::make('duration')->label('Duration (min)'),
                Tables\Columns\TextColumn::make('description')
                    ->label('Description')->limit(50),
            ])
            ->filters([
                //
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
            'edit' => Pages\EditStudyGroup::route('/{record}/edit'),
        ];
    }
}
