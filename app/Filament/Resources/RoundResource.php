<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RoundResource\Pages;
use App\Filament\Resources\RoundResource\RelationManagers;
use App\Models\Round;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;  
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker; 
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoundResource extends Resource
{
    protected static ?string $model = Round::class;

    protected static ?string $navigationIcon = 'heroicon-o-clock';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('name')
            ->required()
            ->maxLength(50),
            TextArea::make('description')
            ->required()
            ->maxLength(500)
            ->helperText('Maksimal 500 karakter') // Menambahkan catatan kepada pengguna
            ->label('Description'), // Opsional: menambahkan label
            DateTimePicker::make('start_time')
            ->required()
            ->label('Start Time'), // Label untuk start time
            TextInput::make('duration')
            ->required()
            ->numeric() // memastikan input hanya berupa angka
            ->label('Duration (Second)'), // Label untuk duration
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('description'),
            Tables\Columns\TextColumn::make('start_time'),
            Tables\Columns\TextColumn::make('duration')
            ->label('Duration (S)'),
            Tables\Columns\TextColumn::make('created_at'),
            Tables\Columns\TextColumn::make('updated_at'),
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
            'index' => Pages\ListRounds::route('/'),
            'create' => Pages\CreateRound::route('/create'),
            'edit' => Pages\EditRound::route('/{record}/edit'),
        ];
    }    
}