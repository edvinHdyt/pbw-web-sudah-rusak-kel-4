<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\Pages;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon   = 'heroicon-o-list-bullet';
    protected static ?string $navigationGroup  = 'Master Menu';
    protected static ?string $navigationLabel  = 'Kategori Master';
    protected static ?string $modelLabel       = 'Kategori';
    protected static ?string $pluralModelLabel = 'Kategori Master';
    protected static ?int    $navigationSort   = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('nama_category')
                ->label('Kategori')
                ->required()
                ->maxLength(20)
                ->unique(ignoreRecord: true),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(6)
                ->columnSpanFull(),
        ])->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('no')
                    ->label('No')
                    ->rowIndex(),

                Tables\Columns\TextColumn::make('nama_category')
                    ->label('Kategori')
                    ->searchable()
                    ->sortable(),
            ])
            ->searchPlaceholder('Cari Kategori')
            ->actions([
                Tables\Actions\EditAction::make()->iconButton(),
                Tables\Actions\DeleteAction::make()
                    ->iconButton()
                    ->modalHeading('Hapus Kategori')
                    ->successNotificationTitle('Kategori berhasil dihapus'),
            ])
            ->defaultSort('created_at', 'asc')
            ->paginated([5, 10, 25]);
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'edit'   => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}