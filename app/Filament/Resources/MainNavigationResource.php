<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MainNavigationResource\Pages;
use App\Filament\Resources\MainNavigationResource\RelationManagers;
use App\Models\MainNavigation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MainNavigationResource extends Resource
{
    protected static ?string $model = MainNavigation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    // protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationGroup = 'Website';

    protected static ?string $navigationLabel = 'Веб үндсэн цэс';

    protected static ?int $navigationSort = 2;


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')->label('Цэсний нэр')->required(),
                Forms\Components\TextInput::make('url')->label('Url')->required(),
                Forms\Components\TextInput::make('sort_order')->label('Харагдах дараалал')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Цэсний нэр')
                    ->searchable()
                    ->toggleable()->sortable(),
                Tables\Columns\TextColumn::make('url')->sortable(),
                Tables\Columns\TextColumn::make('Харагдах дараалал')->sortable(),
            ])->defaultSort('sort_order')
            ->filters([
                Tables\Filters\Filter::make('title')
                    ->query(fn(Builder $query): Builder => $query->whereNotNull('title')),

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])->reorderable('sort_order');
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
            'index' => Pages\ListMainNavigations::route('/'),
        ];
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
