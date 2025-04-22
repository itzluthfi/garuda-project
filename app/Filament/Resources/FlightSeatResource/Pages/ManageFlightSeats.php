<?php

namespace App\Filament\Resources\FlightSeatResource\Pages;

use App\Filament\Resources\FlightSeatResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageFlightSeats extends ManageRecords
{
    protected static string $resource = FlightSeatResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
