<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjecttaskResource\Pages;
use App\Filament\Resources\ProjecttaskResource\RelationManagers;
use App\Models\Project;
use App\Models\Projecttask;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProjecttaskResource extends Resource
{
    protected static ?string $model = Projecttask::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('code')
                //     ->hidden()
                //     ->maxLength(10),
                Forms\Components\Select::make('project_code')
                    ->options(Project::all()->pluck('title', 'code'))
                    ->searchable()
                    ->required(),
                    // ->maxLength(10),
                Forms\Components\TextInput::make('title')
                    ->maxLength(50),
                Forms\Components\TextInput::make('description')
                    ->maxLength(100),
                Forms\Components\DatePicker::make('startdate'),
                Forms\Components\DatePicker::make('enddate'),
                Forms\Components\TextInput::make('status')
                    ->maxLength(1),
                Forms\Components\TextInput::make('estimatedcost'),
                Forms\Components\TextInput::make('executedcost'),
                Forms\Components\TextInput::make('successstat')
                    ->maxLength(1),
                // Forms\Components\TextInput::make('created_by')
                //     ->maxLength(10),
                // Forms\Components\TextInput::make('updated_by')
                //     ->maxLength(10),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('code'),
                Tables\Columns\TextColumn::make('project.title'),
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('startdate')
                    ->date(),
                Tables\Columns\TextColumn::make('enddate')
                    ->date(),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('estimatedcost'),
                Tables\Columns\TextColumn::make('executedcost'),
                Tables\Columns\TextColumn::make('successstat'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('created_by'),
                Tables\Columns\TextColumn::make('updated_by'),
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
            'index' => Pages\ListProjecttasks::route('/'),
            'create' => Pages\CreateProjecttask::route('/create'),
            'edit' => Pages\EditProjecttask::route('/{record}/edit'),
        ];
    }
}
