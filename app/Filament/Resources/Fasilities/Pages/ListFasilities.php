<?php

namespace App\Filament\Resources\Fasilities\Pages;

use App\Filament\Resources\Fasilities\FasilityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFasilities extends ListRecords
{
    protected static string $resource = FasilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
