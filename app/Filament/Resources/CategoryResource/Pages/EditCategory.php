<?php

namespace App\Filament\Resources\CategoryResource\Pages;

use App\Filament\Resources\CategoryResource;
use Filament\Actions\Action;
use Filament\Resources\Pages\EditRecord;

class EditCategory extends EditRecord
{
    protected static string $resource = CategoryResource::class;

    protected static ?string $title = 'Kategori - Ubah';

    protected function getFormActions(): array
    {
        return [
            Action::make('kembali')
                ->label('Kembali')
                ->color('gray')
                ->url($this->getResource()::getUrl('index')),

            $this->getSaveFormAction()->label('Simpan'),
        ];
    }

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}