<?php

namespace App\Http\Livewire;

use App\Models\Gift;
use App\Models\Giveaway;
use App\Models\GiveawayApplicant;
use Livewire\Component;

class Draw extends Component
{
    public $gifts;
    public $applicants;
    public $winnerIds = array();
    public $finished = false;

    public function mount()
    {
        $this->gifts = Gift::all();
        $this->winnerIds = [0];
        // $this->applicants = GiveawayApplicant::authenticated();
    }

    public function render()
    {
        return view('livewire.draw', [
            'gifts' => $this->gifts,
            'finished' => $this->finished
        ]);
    }

    public function startedDraw()
    {
        foreach($this->gifts as $gift) {
            $winner = GiveawayApplicant::authenticated()->whereNotIn('id', $this->winnerIds)->inRandomOrder()->first();

            array_push($this->winnerIds, $winner->id);
            // $gift->update(['application_id' => null]);
            $gift->update(['application_id' => $winner->id]);
        }

        $this->gifts = null;
        $this->gifts = Gift::all();
        $this->finsihed = true;

        return redirect()->route('draw.index');
    }
}
