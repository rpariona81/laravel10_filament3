<?php

namespace App\Filament\Admin\Resources\RegionResource\RelationManagers;

use App\Models\Region;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;

class RegionRelationManager extends RelationManager
{
    protected static string $relationship = 'region';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('region.region')
                    ->label('Regiones')
                    ->options(Region::all()->pluck('region', 'id'))
                    ->searchable()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('region')
            ->columns([
                Tables\Columns\TextColumn::make('region'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
