<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\InstitutoResource\Pages;
use App\Filament\Admin\Resources\InstitutoResource\RelationManagers;
use App\Models\Instituto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

use Closure;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Set;
use Illuminate\Support\Str;

use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\Select;

class InstitutoResource extends Resource
{
    protected static ?string $model = Instituto::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('region_id')
                    ->label('Region')
                    ->relationship('region', 'region')->preload(),
                TextInput::make('cod_mod')->required(),
                TextInput::make('cen_edu')->required(),
                TextInput::make('instituto')->required(),
                TextInput::make('es_licenciado'),
                TextInput::make('es_idex'),
                TextInput::make('rm_licenciamiento'),
                TextInput::make('dareacenso'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('region.region'),
                TextColumn::make('cod_mod'),
                TextColumn::make('instituto'),
                TextColumn::make('es_licenciado'),
                TextColumn::make('es_idex')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListInstitutos::route('/'),
            'create' => Pages\CreateInstituto::route('/create'),
            'edit' => Pages\EditInstituto::route('/{record}/edit'),
        ];
    }
}
