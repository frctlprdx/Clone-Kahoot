<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LeaderboardResource\Pages;
use App\Filament\Resources\LeaderboardResource\RelationManagers;
use App\Models\Leaderboard;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class LeaderboardResource extends Resource
{
    protected static ?string $model = Leaderboard::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('round_id')
                    ->label('Round ID')
                    ->required(),
                Forms\Components\TextInput::make('user_id')
                    ->label('User  ID')
                    ->required(),
                Forms\Components\TextInput::make('rank')
                    ->label('Rank')
                    ->required(),
                Forms\Components\TextInput::make('total_points')
                    ->label('Total Points')
                    ->required(),
                Forms\Components\BooleanInput::make('is_correct')
                    ->label('Is Correct')
                    ->required(),
                Forms\Components\NumberInput::make('points')
                    ->label('Points')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('round_id')
                    ->label('Round ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->label('User  ID')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('rank')
                    ->label('Rank')
                    ->sortable(),
                Tables\Columns\TextColumn::make('total_points')
                    ->label('Total Points')
                    ->sortable(),
                Tables\Columns\BooleanColumn::make('is_correct')
                    ->label('Is Correct')
                    ->sortable(),
                Tables\Columns\NumberColumn::make('points')
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
            'index' => Pages\ListLeaderboards::route('/'),
            'create' => Pages\CreateLeaderboard::route('/create'),
            'edit' => Pages\EditLeaderboard::route('/{record}/edit'),
        ];
    }    
}
