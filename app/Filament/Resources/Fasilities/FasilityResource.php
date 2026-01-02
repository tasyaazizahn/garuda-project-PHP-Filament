<?php

namespace App\Filament\Resources\Fasilities;

use App\Filament\Resources\Fasilities\Pages\CreateFasility;
use App\Filament\Resources\Fasilities\Pages\EditFasility;
use App\Filament\Resources\Fasilities\Pages\ListFasilities;
use App\Filament\Resources\Fasilities\Schemas\FasilityForm;
use App\Filament\Resources\Fasilities\Tables\FasilitiesTable;
use App\Models\Fasility;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FasilityResource extends Resource
{
    protected static ?string $model = Fasility::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;

    protected static ?string $recordTitleAttribute = 'Fasility';

    public static function form(Schema $schema): Schema
    {
        return FasilityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FasilitiesTable::configure($table);
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
            'index' => ListFasilities::route('/'),
            'create' => CreateFasility::route('/create'),
            'edit' => EditFasility::route('/{record}/edit'),
        ];
    }

    public static function getRecordRouteBindingEloquentQuery(): Builder
    {
        return parent::getRecordRouteBindingEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
