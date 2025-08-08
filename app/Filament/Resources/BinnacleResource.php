<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BinnacleResource\Pages;
use App\Filament\Resources\BinnacleResource\RelationManagers;
use App\Models\Binnacle;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BinnacleResource extends Resource
{
    protected static ?string $model = Binnacle::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $modelLabel = 'Bitácora';

    protected static ?string $pluralModelLabel = 'Bitácoras';

    protected static ?string $navigationLabel = 'Bitácoras';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('binnacle_type_id')
                ->relationship('binnacleType', 'name')
                ->label('Tipo de bitácora')
                ->searchable()
                ->preload()
                ->required(),
                TextInput::make('description')
                ->label('Descripción')
                ->nullable()
                ->maxLength(255),
                DateTimePicker::make('date_register')
                ->label('Fecha de registro')
                ->required()
                ->default(now()),
                Textarea::make('notes')
                ->label('Notas')
                ->nullable()
                ->maxLength(500),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('binnacleType.name')->label('Tipo'),
                TextColumn::make('user.name')->label('Usuario'),
                TextColumn::make('description')->label('Descripción'),
                TextColumn::make('notes')->label('Notas'),
                TextColumn::make('date_register')
                    ->dateTime('d/m/Y h:i a')
                    ->label('Fecha de registro')
                    ->sortable(),
            ])
            ->defaultSort('date_register', 'desc')
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
            'index' => Pages\ListBinnacles::route('/'),
            'create' => Pages\CreateBinnacle::route('/create'),
            'edit' => Pages\EditBinnacle::route('/{record}/edit'),
        ];
    }
}
