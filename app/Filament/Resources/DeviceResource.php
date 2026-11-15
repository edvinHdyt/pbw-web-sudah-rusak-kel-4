<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DeviceResource\Pages;
use App\Models\Device;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DeviceResource extends Resource
{
    protected static ?string $model = Device::class;

    protected static ?string $navigationIcon = 'heroicon-o-computer-desktop';

    protected static ?string $navigationLabel = 'Device Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('id_category')
                    ->relationship('category', 'nama_category')
                    ->required()
                    ->label('Kategori'),
                Forms\Components\Select::make('id_merk')
                    ->relationship('merk', 'merk')
                    ->required()
                    ->label('Merk'),
                Forms\Components\TextInput::make('model')
                    ->required()
                    ->maxLength(20)
                    ->label('Device (Model)'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('model')
                    ->searchable()
                    ->sortable()
                    ->label('Device (Model)'),
                Tables\Columns\TextColumn::make('merk.merk')
                    ->searchable()
                    ->sortable()
                    ->label('Merk'),
                Tables\Columns\TextColumn::make('category.nama_category')
                    ->searchable()
                    ->sortable()
                    ->label('Kategori'),
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
            'index' => Pages\ListDevices::route('/'),
            'create' => Pages\CreateDevice::route('/create'),
            'edit' => Pages\EditDevice::route('/{record}/edit'),
        ];
    }
}