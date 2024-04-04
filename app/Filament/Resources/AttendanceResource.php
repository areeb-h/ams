<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttendanceResource\Pages;
use App\Filament\Resources\AttendanceResource\RelationManagers;
use App\Models\Student;
use Filament\Forms\Components\BelongsToSelect;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Columns\TextColumn;
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
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AttendanceResource extends Resource
{
    protected static ?string $model = StudySession::class;

    protected static ?string $navigationLabel = 'Attendance Sheet';

    protected static ?string $title = 'Attendance Sheet';

    protected static ?string $navigationGroup = 'Manage Centre';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Repeater::make('attendances')
                    ->relationship('attendances')
                    ->schema([
                        Forms\Components\TextInput::make('student.name')
                            ->label('Student Name')
                            ->disabled(true),
                        Forms\Components\Checkbox::make('attended')
                            ->label('Attended')
                    ])
                    ->columns(2),
            ]);

    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('studyGroup.name')->label('Study Group')->searchable(),

                TextColumn::make('date')->dateTime()
                    ->label('Date')
                    ->dateTime('d/m/y')->searchable()->sortable(),

                TextColumn::make('attendanceSummary')
                    ->label('Attended')->alignCenter(),
            ])
            ->filters([
                SelectFilter::make('study_session_id')
                    ->label('Study Session')
                    ->searchable()
                    ->relationship('studySession', 'date', fn (Builder $query) => $query),

            ])
            ->actions([
                Tables\Actions\Action::make('markAttendance')
                    ->url(fn ($record) => route('filament.admin.resources.attendances.mark-attendance', ['session' => $record->id]))
                    ->icon('heroicon-o-pencil'),
            ])
            ->bulkActions([
                BulkAction::make('toggle_attended')
                    ->label('Toggle Attended Status')
                    ->action(function ($records, $data): void {
                        foreach ($records as $record) {
                            $record->attended = !$record->attended;
                            $record->save();
                        }
                    })
                    ->deselectRecordsAfterCompletion()
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function canCreate(): bool
    {
        // Return false to disable the creation of new records
        return false;
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAttendances::route('/'),
           // 'edit' => Pages\EditAttendance::route('/{record}/edit'),
        ];
    }
}
