<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseResource\Pages;
use App\Filament\Resources\CourseResource\RelationManagers;
use App\Models\Course;
use App\Models\StudyGroup;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class CourseResource extends Resource
{
    protected static ?string $model = Course::class;

    protected static ?string $navigationGroup = 'Website';

    //protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make([
                TextInput::make('name')->required()->columnSpan(2),
                TextInput::make('age_range')->required()->columnSpan(1),
                TextInput::make('fee')->required()->columnSpan(1),
            ])->columns([
                'sm' => 2,
            ]),

            Group::make([
                Forms\Components\BelongsToSelect::make('course_type')
                    ->relationship('courseType', 'name')->required(),
                Textarea::make('description')->required(),
            ]),

            Forms\Components\BelongsToManyMultiSelect::make('teachers')
                ->relationship('teachers', 'name'),

            Forms\Components\BelongsToManyMultiSelect::make('students')
                ->relationship('students', 'name'),

            Forms\Components\FileUpload::make('course_image_url')
                ->label('Course Image')
                ->disk('public')
                ->directory('course_images')
                ->image(),

        ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->sortable(),
                Tables\Columns\TextColumn::make('students_count')
                    ->label('Students')
                    ->sortable()
                    ->counts('students'),
                Tables\Columns\TextColumn::make('fee')->sortable(),
                Tables\Columns\TextColumn::make('age_range')->sortable(),
                Tables\Columns\TextColumn::make('courseType.name')->sortable(),
            ])->filters([
                // Define any filters here
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
            'index' => Pages\ListCourses::route('/'),
            'create' => Pages\CreateCourse::route('/create'),
            //'edit' => Pages\EditCourse::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public static function canEdit(Model $record): bool
    {
        return Auth::user()->hasRole('admin');
    }

    public static function canDelete(Model $record): bool
    {
        return Auth::user()->hasRole('admin');
    }
}
