<?php

namespace App\Filament\Resources\Flights\Pages;

use App\Filament\Resources\Flights\FlightResource;
use App\Models\Flight;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateFlight extends CreateRecord
{
    protected static string $resource = FlightResource::class;

    protected function afterCreate():  void{
        $flight = Flight::find($this->record->id);

        if ($flight) {
            $flight->generateSeats();
        }

        // $flight = generateSeats();
    }

}
