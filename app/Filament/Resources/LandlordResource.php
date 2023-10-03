<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Landlord;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\LandlordResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\LandlordResource\RelationManagers;

class LandlordResource extends Resource
{
    protected static ?string $model = Landlord::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('code')->required(),
                Forms\Components\TextInput::make('firstname')->required(),
                Forms\Components\TextInput::make('middlename'),
                Forms\Components\TextInput::make('lastname')->required(),
                Forms\Components\Select::make('gender')
                    ->options([
                        'M' => 'Male',
                        'F' => 'Female',
                        'O' => 'Others',
                    ]),
                // Forms\Components\TextInput::make('gender'),
                Forms\Components\TextInput::make('stateoforigin'),
                Forms\Components\TextInput::make('nationality'),
                Forms\Components\TextInput::make('email'),
                Forms\Components\TextInput::make('mobile'),
                Forms\Components\TextInput::make('phone'),
                Forms\Components\TextInput::make('phone2'),
                Forms\Components\TextInput::make('occupation'),
                Forms\Components\TextInput::make('occupationLocation'),
                Forms\Components\TextInput::make('created_at'),
                Forms\Components\TextInput::make('updated_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('firstname'),
                Tables\Columns\TextColumn::make('middlename'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('mobile'),
                Tables\Columns\TextColumn::make('occupation'),
                Tables\Columns\TextColumn::make('created_at')
                ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListLandlords::route('/'),
            'create' => Pages\CreateLandlord::route('/create'),
            'edit' => Pages\EditLandlord::route('/{record}/edit'),
        ];
    }

    public function getTableRecordKey(Model $record): string
    {
        return uniqid();
    }
}
