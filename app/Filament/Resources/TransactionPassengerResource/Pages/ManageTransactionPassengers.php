<?php

namespace App\Filament\Resources\TransactionPassengerResource\Pages;

use App\Filament\Resources\TransactionPassengerResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageTransactionPassengers extends ManageRecords
{
    protected static string $resource = TransactionPassengerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
