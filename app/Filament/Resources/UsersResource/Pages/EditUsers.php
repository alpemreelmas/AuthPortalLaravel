<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Core\EditRecordAndRedirectToIndex;
use App\Filament\Resources\UsersResource;
use Filament\Actions;
use Filament\Forms\Form;
use Filament\Resources\Pages\EditRecord;

class EditUsers extends EditRecordAndRedirectToIndex
{
    protected static string $resource = UsersResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
