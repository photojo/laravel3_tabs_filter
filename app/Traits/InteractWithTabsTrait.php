<?php
namespace App\Filament\Traits\Filament;

use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

trait InteractWithTabsTrait
{

use Tables\Concerns\InteractsWithTable {
    makeTable as makeBaseTable;
}

protected function makeTable(): Table
{
    return $this->makeBaseTable()
        ->query(fn (): Builder => $this->getTableQuery())
        ->modifyQueryUsing($this->modifyQueryWithActiveTab(...));
}
}
