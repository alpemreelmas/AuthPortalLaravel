<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientResource\Pages;
use App\Filament\Resources\ClientResource\RelationManagers;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class ClientResource extends Resource
{
    protected static ?string $model = \Laravel\Passport\Client::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
                Tables\Columns\TextColumn::make('provider')->default("-"),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('View Information')
                    ->icon("heroicon-o-document-magnifying-glass")
                    ->color('info')
                    ->infolist([
                        TextEntry::make('name'),
                        TextEntry::make('provider')->default("-"),
                        TextEntry::make('secret'),
                        TextEntry::make('redirect'),
                        TextEntry::make('personal_access_client')->getStateUsing(function ($record) {
                            return (bool) $record->personal_access_client ? "Yes" : "No";
                        }),
                        TextEntry::make('password_client')->getStateUsing(function ($record) {
                            return (bool) $record->password_client ? "Yes" : "No";
                        }),
                        TextEntry::make('revoked')->getStateUsing(function ($record) {
                            return (bool) $record->revoked ? "Yes" : "No";
                        }),
                    ])->modalSubmitAction('')
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClient::route('/create'),
            'edit' => Pages\EditClient::route('/{record}/edit'),
        ];
    }
}
