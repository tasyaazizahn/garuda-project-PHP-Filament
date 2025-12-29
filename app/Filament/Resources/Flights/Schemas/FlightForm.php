<?php
namespace App\Filament\Resources\Flights\Schemas;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class FlightForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Flight Information')
                        ->schema([
                            TextInput::make('flight_number')
                                ->required()
                                ->unique(ignoreRecord: true),
                            Select::make('airline_id')
                                ->relationship('airline', 'name')
                                ->required(),
                        ]),
                    Step::make('Flight Segments')
                        ->schema([
                            Repeater::make('flight_segments')
                                ->relationship('segments')
                                ->schema([
                                    TextInput::make('sequence')
                                    ->numeric()
                                    ->required(),
                                    Select::make('airport_id')
                                    ->relationship('airport', 'name')
                                    ->required(),
                                    DateTimePicker::make('time')
                                    ->required(),
                                ])
                                ->collapsed(false)
                                ->minItems(1),
                        ]),
                    Step::make('Flight Class')
                        ->schema([
                            Repeater::make('flight_classes')
                                ->relationship('classes')
                                ->schema([
                                    Select::make('class_type')
                                    ->options([
                                        'bussiness' => 'Bussiness',
                                        'economy' => 'Economy',
                                    ])
                                    ->required(),
                                    TextInput::make('price')
                                    ->prefix('IDR')
                                    ->numeric()
                                    ->minValue(0)
                                    ->required(),
                                    TextInput::make('total_seat')
                                    ->numeric()
                                    ->minValue(1)
                                    ->label('Total Seats')
                                    ->required(),
                                    Select::make('facilities')
                                    ->relationship('facilities', 'name')
                                    ->multiple()
                                    ->required(),
                                ])
                                ->collapsed(false)
                                ->minItems(1),
                        ]),
                ])->columnSpan(2),
            ]);
    }
}
