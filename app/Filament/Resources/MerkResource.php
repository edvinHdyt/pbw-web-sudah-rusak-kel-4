<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerkResource\Pages;
use App\Models\Merk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MerkResource extends Resource
{
    protected static ?string $model = Merk::class;

    protected static ?string $navigationGroup = 'Master Menu';

    protected static ?string $navigationIcon = 'heroicon-o-tag';

    protected static ?string $navigationLabel = 'Merk Master';

    protected static ?string $modelLabel = 'Merk';

    protected static ?string $pluralModelLabel = 'Merk';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('merk')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true)
                    ->label('Merk')
                    ->placeholder('Masukkan nama merk'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('merk')
                    ->searchable()
                    ->sortable()
                    ->label('Merk'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMerks::route('/'),
            'create' => Pages\CreateMerk::route('/create'),
            'edit' => Pages\EditMerk::route('/{record}/edit'),
        ];
    }
}
