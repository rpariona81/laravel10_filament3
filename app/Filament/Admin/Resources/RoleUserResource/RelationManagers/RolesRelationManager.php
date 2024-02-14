<?php

namespace App\Filament\Admin\Resources\RoleUserResource\RelationManagers;

use App\Models\Role;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Filament\Forms\Components\Select;


class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'role';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('role.rolename')
                    ->label('Roles')
                    ->options(Role::all()->pluck('rolename', 'id'))
                    ->searchable()
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('rolename')
            ->columns([
                Tables\Columns\TextColumn::make('rolename'),
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
