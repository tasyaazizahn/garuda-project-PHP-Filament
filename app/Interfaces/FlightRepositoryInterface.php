<?php

namespace App\Interfaces;

interface FlightRepositoryInterface{
    public function getAllFlight($filter = null);
    public function getFlightByFlightNumber($flightNumber);
}