<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StudySessionResource\Pages;
use App\Filament\Resources\StudySessionResource\RelationManagers;
use App\Models\StudyGroup;
use App\Models\StudySession;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StudySessionResource extends Resource
{
    protected static ?string $model = StudySession::class;

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
                Textarea::make('description')
                    ->label('Description'),
                BelongsToManyMultiSelect::make('student_ids')
                    ->relationship('students', 'name')
                    ->options(function (callable $get) {
                        // Fetch students based on the study group
                        $studyGroupId = $get('study_group_id');
                        return $studyGroupId ? StudyGroup::find($studyGroupId)->students()->pluck('name', 'id') : [];
                    })
                    ->visible(fn ($get) => $get('study_group_id') && $get('id') !== null)
                    ->reactive(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('studyGroup.name')->label('Study Group')->copyable(),

                TextColumn::make('date')->dateTime()
                    ->label('Date')
                ->dateTime('d/m/y'),

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
                //
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
            'index' => Pages\ListStudySessions::route('/'),
            'create' => Pages\CreateStudySession::route('/create'),
            //'edit' => Pages\EditStudySession::route('/{record}/edit'),
        ];
    }
}
