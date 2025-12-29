<?php

namespace App\Filament\Resources\Fasilities\Pages;

use App\Filament\Resources\Fasilities\FasilityResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ForceDeleteAction;
use Filament\Actions\RestoreAction;
use Filament\Resources\Pages\EditRecord;

class EditFasility extends EditRecord
{
    protected static string $resource = FasilityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }
}
