<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FlightSeatResource\Pages;
use App\Filament\Resources\FlightSeatResource\RelationManagers;
use App\Models\FlightSeat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FlightSeatResource extends Resource
{
    protected static ?string $model = FlightSeat::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('flight_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('row')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('column')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('class_type')
                    ->required(),
                Forms\Components\Toggle::make('is_available')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('flight_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('row')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('column')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('class_type'),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageFlightSeats::route('/'),
        ];
    }
}