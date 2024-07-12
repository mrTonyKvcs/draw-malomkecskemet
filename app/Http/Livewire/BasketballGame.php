<?php

namespace App\Http\Livewire;

use App\Models\BasketballGame as ModelsBasketballGame;
use Carbon\Carbon;
use Livewire\Component;

class BasketballGame extends Component
{
    public $players;
    public $name;
    public $email;
    public $points;
    public $filter = 'all';
    public $filters = ['2024-07-15', '2024-07-16', '2024-07-17', '2024-07-18', '2024-07-19'];
    public $showMessage = false;
    public $isFilterOpen = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'points' => 'required|integer|min:0',
    ];

    public function mount()
    {
        $this->loadPlayers();
    }

    public function submit()
    {
        $this->validate();

        ModelsBasketballGame::create([
            'name' => $this->name,
            'email' => $this->email,
            'points' => $this->points,
        ]);

        session()->flash('message', 'Jelentkező sikeresen hozzáadva!');
        $this->showMessage = true;

        $this->dispatchBrowserEvent('hide-message');

        $this->reset(['name', 'email', 'points']);

        $this->loadPlayers();
    }

    public function updatedFilter()
    {
        $this->loadPlayers();
    }

    public function loadPlayers()
    {
        if ($this->filter === 'all') {
            $this->players = ModelsBasketballGame::orderBy('points', 'desc')->get();
        } else {
            $date = Carbon::createFromFormat('Y-m-d', $this->filter);
            $this->players = ModelsBasketballGame::whereDate('created_at', $date)->orderBy('points', 'desc')->get();
        }
    }

    public function toggleFilter()
    {
        $this->isFilterOpen = !$this->isFilterOpen;
    }

    public function closeFilter()
    {
        $this->isFilterOpen = false;
    }

    public function render()
    {
        return view('livewire.basketball-game', [
            'players' => $this->players,
        ]);
    }
}

