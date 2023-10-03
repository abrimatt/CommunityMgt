<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Filament\Resources\ProjectResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProjectResource\RelationManagers;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('code')
                //     ->required()
                //     ->maxLength(10),
                Forms\Components\TextInput::make('title')
                    ->maxLength(50),
                Forms\Components\TextInput::make('description')
                    ->maxLength(100),
                Forms\Components\DatePicker::make('startedon'),
                Forms\Components\DatePicker::make('completedon'),
                Forms\Components\TextInput::make('budgetedcost'),
                Forms\Components\TextInput::make('executedcost'),
                Forms\Components\DatePicker::make('commisioneddate'),
                Forms\Components\TextInput::make('commisionedby')
                    ->maxLength(50),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('startedon')
                    ->date(),
                Tables\Columns\TextColumn::make('completedon')
                    ->date(),
                Tables\Columns\TextColumn::make('budgetedcost'),
                Tables\Columns\TextColumn::make('executedcost'),
                Tables\Columns\TextColumn::make('commisioneddate')
                    ->date(),
                Tables\Columns\TextColumn::make('commisionedby'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
