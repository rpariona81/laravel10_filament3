<?php

namespace App\Filament\Admin\Resources\RoleMenuResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Closure;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Str;
use Filament\Forms\Components\Select;

class RolesRelationManager extends RelationManager
{
    protected static string $relationship = 'roles';

    //protected static ?string $recordTitleAttribute = 'rolename';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('roles.rolename')
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
                Tables\Actions\AttachAction::make(),
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
