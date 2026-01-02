<?php
namespace App\Filament\Resources\Transactions\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class TransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Umum')
                    ->schema([
                        TextInput::make('code'),
                        Select::make('flight_id')
                            ->relationship('flight', 'flight_number'),
                        Select::make('flight_class_id')
                            ->relationship('class', 'class_type'),
                    ])->columnSpan(2),
                Section::make('Informasi Penumpang')
                    ->schema([
                        TextInput::make('number_of_passengers'),
                        TextInput::make('name'),
                        TextInput::make('email'),
                        TextInput::make('phone'),
                        Section::make('Daftar Penumpang')
                            ->schema([
                                Repeater::make('passenger')
                                    ->relationship('passengers')
                                    ->schema([
                                        TextInput::make('seat.name'),
                                        TextInput::make('name'),
                                        TextInput::make('date_of_birth'),
                                        textInput::make('nationality'),
                                    ])
                                    ->columns(2),
                            ]),
                    ])->columnSpan(2),
                Section::make('Informasi Penumpang')
                    ->schema([
                        TextInput::make('promo.code'),
                        TextInput::make('promo.dicount_type'),
                        TextInput::make('promo.discount'),
                        TextInput::make('payment_status'),
                        TextInput::make('subtotal'),
                        TextInput::make('grandtotal'),
                    ])->columnSpan(2),
                // TextInput::make('code')
                //     ->required(),
                // TextInput::make('flight_id')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('flight_class_id')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('name')
                //     ->required(),
                // TextInput::make('email')
                //     ->label('Email address')
                //     ->email()
                //     ->required(),
                // TextInput::make('phone')
                //     ->tel()
                //     ->required(),
                // TextInput::make('number_of_passengers')
                //     ->required()
                //     ->numeric(),
                // TextInput::make('promo_code_id')
                //     ->numeric(),
                // Select::make('payment_status')
                //     ->options(['paid' => 'Paid', 'pending' => 'Pending', 'failed' => 'Failed'])
                //     ->default('pending')
                //     ->required(),
                // TextInput::make('subtotal')
                //     ->numeric(),
                // TextInput::make('grandtotal')
                //     ->numeric(),
            ]);
    }
}
