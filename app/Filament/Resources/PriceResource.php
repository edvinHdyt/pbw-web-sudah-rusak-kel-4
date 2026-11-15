<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PriceResource\Pages;
use App\Models\Price;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class PriceResource extends Resource
{
    protected static ?string $model = Price::class;

    protected static ?string $navigationGroup  = 'Master Menu';
    protected static ?string $navigationIcon = 'heroicon-o-currency-dollar';

    protected static ?string $navigationLabel = 'Harga Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nominal_harga')
                    ->required()
                    ->numeric()
                    ->label('Nominal Harga'),
                Forms\Components\Textarea::make('deskripsi')
                    ->label('Deskripsi')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nominal_harga')
                    ->money('IDR')
                    ->sortable()
                    ->searchable()
                    ->label('Nominal Harga'),
                Tables\Columns\TextColumn::make('deskripsi')
                    ->limit(50)
                    ->label('Deskripsi'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat Pada'),
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
            'index' => Pages\ListPrices::route('/'),
            'create' => Pages\CreatePrice::route('/create'),
            'edit' => Pages\EditPrice::route('/{record}/edit'),
        ];
    }
}
