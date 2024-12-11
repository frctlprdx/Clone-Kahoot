<?php

namespace App\Filament\Resources;

use App\Filament\Resources\QuestionResource\Pages;
use App\Filament\Resources\QuestionResource\RelationManagers;
use App\Models\Question;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Forms\Components\TextInput;  
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DateTimePicker; 
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class QuestionResource extends Resource
{
    protected static ?string $model = Question::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Form $form): Form
    {
        return $form->schema([
            // Input soal dalam bentuk teks
            TextArea::make('content')
                ->label('Question Content')
                ->required()
                ->maxLength(255),
        
            // Input untuk gambar soal
            FileUpload::make('image')
                ->label('Question Image')
                ->image() // Menandakan bahwa hanya gambar yang dapat diunggah
                ->disk('public') // Tentukan disk untuk menyimpan gambar
                ->directory('questions') // Direktori untuk gambar soal
                ->required(false), // Gambar tidak wajib diisi, dapat dikosongkan
        
            // Input jawaban A
            TextInput::make('option_a')
                ->label('Option A')
                ->required()
                ->maxLength(255),
        
            // Input jawaban B
            TextInput::make('option_b')
                ->label('Option B')
                ->required()
                ->maxLength(255),
        
            // Input jawaban C
            TextInput::make('option_c')
                ->label('Option C')
                ->required()
                ->maxLength(255),
        
            // Input jawaban D
            TextInput::make('option_d')
                ->label('Option D')
                ->required()
                ->maxLength(255),
        
            // Pilihan jawaban yang benar
            Select::make('correct_option')
                ->label('Correct Answer')
                ->options([
                    'A' => 'A',
                    'B' => 'B',
                    'C' => 'C',
                    'D' => 'D',
                ])
                ->required(),
        
            // Pilih ID babak
            Select::make('round_id')
                ->label('Round ID')
                ->options(
                    \App\Models\Round::all()->pluck('name', 'id')
                )
                ->required(),
    
        ]);
        
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
                Tables\Columns\TextColumn::make('id')
                ->label('ID')
                ->getStateUsing(function ($rowLoop) {
                    return $rowLoop->index + 1; // Nomor urut mulai dari 1
                }),
            
                Tables\Columns\TextColumn::make('content')
                    ->label('Content'),
                
                // ImageColumn::make('image')
                //     ->label('Image')
                //     ->disk('public') // Disk tempat penyimpanan gambar
                //     ->url(function ($record) {
                //         return $record->image ? asset('storage/' . $record->image) : null; // URL penuh gambar
                //     })
                //     ->circular(), // Opsional: Membuat gambar berbentuk lingkaran
                
                
                Tables\Columns\TextColumn::make('correct_option')
                    ->label('Correct Option'),
                
                Tables\Columns\TextColumn::make('round.name') // Menggunakan relasi
                    ->label('Round')
                    ->sortable()
                    ->formatStateUsing(function ($state, $record) {
                        return $record->round->name ?? 'No Round';
                    }),
                    
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime('d-m-Y H:i'),
                
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Updated At')
                    ->dateTime('d-m-Y H:i'),
                
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
            'index' => Pages\ListQuestions::route('/'),
            'create' => Pages\CreateQuestion::route('/create'),
            'edit' => Pages\EditQuestion::route('/{record}/edit'),
        ];
    }    
}