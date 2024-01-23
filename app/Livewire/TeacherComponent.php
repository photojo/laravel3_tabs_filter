<?php

namespace App\Livewire;

use App\Models\Teacher;
use Livewire\Component;
use Filament\Tables\Table;
use Filament\Forms\Contracts\HasForms;
use Filament\Resources\Components\Tab;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use App\Traits\InteractWithTabsTrait;


class TeacherComponent extends Component implements HasForms, HasTable
{

    // use InteractWithTabsTrait;
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Teacher::query())
            ->columns([
                // ...
                TextColumn::make('name'),
                TextColumn::make('status'),
            ]);
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(('All')),


            'new' => Tab::make('new')
                ->icon('heroicon-m-user')
                ->badge(fn () => Teacher::where('status', 'new')->count())
            // ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'new'))


        ];
    }

    public function getCachedTabs(): array
    {
        return $this->getTabs();
    }

    public function getRenderHookScopes(): array
    {
        return [static::class];
    }
    public function render()
    {
        return view('livewire.teacher-component');
    }
}
