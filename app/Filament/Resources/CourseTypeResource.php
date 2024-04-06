<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseTypeResource\Pages;
use App\Filament\Resources\CourseTypeResource\RelationManagers;
use App\Models\CourseType;
use App\Traits\AdminAuthorization;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CourseTypeResource extends Resource
{
    use AdminAuthorization;

    protected static ?string $model = CourseType::class;

    protected static ?string $navigationGroup = 'Website';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required()->columnSpan(2),
                TextInput::make('description')->columnSpan(1),
                TextInput::make('course_type_image_url')->columnSpan(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('students_count')
                    ->label('Students')
                    ->getStateUsing(fn($record) => $record->students_count),
                Tables\Columns\TextColumn::make('description')->limit(50),
                Tables\Columns\TextColumn::make('course_type_image_url')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
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
            'index' => Pages\ListCourseTypes::route('/'),
            'create' => Pages\CreateCourseType::route('/create'),
            //'edit' => Pages\EditCourseType::route('/{record}/edit'),
        ];
    }
}
