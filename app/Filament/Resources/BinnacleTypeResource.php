<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BinnacleTypeResource\Pages;
use App\Filament\Resources\BinnacleTypeResource\RelationManagers;
use App\Models\BinnacleType;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BinnacleTypeResource extends Resource
{
    protected static ?string $model = BinnacleType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Tipo de Bitácora';

    protected static ?string $pluralModelLabel = 'Tipos de Bitácora';

    protected static ?string $navigationLabel = 'Tipos de Bitácora';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->email()
                    ->unique(BinnacleType::class, 'name', ignoreRecord: true)
                    ->maxLength(255)
                    ->label('Nombre'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id'),
                TextColumn::make('name')->label('Nombre'),
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
            'index' => Pages\ListBinnacleTypes::route('/'),
            'create' => Pages\CreateBinnacleType::route('/create'),
            'edit' => Pages\EditBinnacleType::route('/{record}/edit'),
        ];
    }
}
