<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeacherResource\Pages;
use App\Filament\Resources\TeacherResource\RelationManagers;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Models\Teacher;
use Filament\Actions\CreateAction;
use Filament\Forms;
use Filament\Forms\Components\BelongsToManyMultiSelect;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;

class TeacherResource extends Resource
{
    protected static ?string $model = Teacher::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                BelongsToSelect::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->reactive()
                    ->visible(fn ($livewire) => $livewire instanceof Pages\CreateTeacher) // Only visible on the create page
                    ->afterStateUpdated(function (callable $set, $state) {
                        $user = \App\Models\User::find($state);

                        if ($user) {
                            $set('name', $user->name);
                        }
                    }),
                TextInput::make('name')
                    ->label('Name')
                    ->disabled()
                    ->reactive()
                    ->dehydrated(true),
                TextInput::make('mobile')
                    ->tel()
                    ->label('Mobile'),
                TextInput::make('address')
                    ->label('Address'),
                BelongsToManyMultiSelect::make('course_ids')
                    ->relationship('courses', 'name')
                    ->label('Courses'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('mobile'),
                Tables\Columns\TextColumn::make('address'),
                Tables\Columns\TextColumn::make('user.status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'success',
                        '0' => 'danger',
                    })->formatStateUsing(function ($state) {
                        return $state == '1' ? 'Active' : 'Inactive';
                    })->label('Status'),
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
            'index' => Pages\ListTeachers::route('/'),
            'create' => Pages\CreateTeacher::route('/create'),
//            'edit' => Pages\EditTeacher::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Auth::user()->hasRole('admin');
    }
}
