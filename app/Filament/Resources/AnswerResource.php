<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AnswerResource\Pages;
use App\Filament\Resources\AnswerResource\RelationManagers;
use App\Models\Answer;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BooleanColumn;
use Filament\Tables\Columns\NumberColumn;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AnswerResource extends Resource
{
    protected static ?string $model = Answer::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('user_id')
                    ->label('User  ID')
                    ->required(),
                TextInput::make('question_id')
                    ->label('Question ID')
                    ->required(),
                Select::make('selected_option')
                    ->label('Selected Option')
                    ->options([
                        'A' => 'A',
                        'B' => 'B',
                        'C' => 'C',
                        'D' => 'D',
                    ])
                    ->required(),
                TextInput::make('responses_time')
                    ->label('Responses Time')
                    ->required(),
                BooleanColumn::make('is_correct')
                    ->label('Is Correct')
                    ->required(),
                NumberColumn::make('points')
                    ->label('Points')
                    ->required(),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('user_id')
                    ->label('User  ID')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('question_id')
                    ->label('Question ID')
                    ->sortable(),
                TextColumn::make('selected_option')
                    ->label('Selected Option')
                    ->sortable(),
                TextColumn::make('responses_time')
                    ->label('Responses Time')
                    ->sortable(),
                BooleanColumn::make('is_correct')
                    ->label('Is Correct')
                    ->sortable(),
                NumberColumn::make('points')
                    ->label('Points')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListAnswers::route('/'),
            'create' => Pages\CreateAnswer::route('/create'),
            'edit' => Pages\EditAnswer::route('/{record}/edit'),
        ];
    }    
}
