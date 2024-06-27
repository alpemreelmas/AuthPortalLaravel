<?php

namespace App\Filament\Resources\UsersResource\Pages;

use App\Filament\Core\CreateRecordAndRedirectToIndex;
use App\Filament\Resources\UsersResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateUsers extends CreateRecordAndRedirectToIndex
{
    protected static string $resource = UsersResource::class;
}
