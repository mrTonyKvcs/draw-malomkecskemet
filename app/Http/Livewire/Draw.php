<?php

namespace App\Http\Livewire;

use App\Models\Gift;
use App\Models\Giveaway;
use App\Models\GiveawayApplicant;
use App\Models\Wish;
use Livewire\Component;

class Draw extends Component
{
    public $gifts;
    public $applicants;
    public $winnerIds = array();
    public $winnerEmails = array();
    public $finished = false;

    public function mount()
    {
        $this->gifts = Gift::all();
        $this->winnerIds = [0];
        $this->winnerEmails = [];
        $allApplicantIdsNotNull = $this->gifts->every(function ($gift) {
            return $gift->application_id !== null;
        });
        if ($allApplicantIdsNotNull) {
            $this->finished = true;
        }
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
            $winner = GiveawayApplicant::authenticated()->whereNotIn('email', $this->winnerEmails)->inRandomOrder()->first();

            array_push($this->winnerEmails, $winner->email);
            // array_push($this->winnerIds, $winner->id);
            // $gift->update(['application_id' => null]);
            $gift->update(['application_id' => $winner->id]);
        }

        $this->gifts = null;
        $this->gifts = Gift::all();
        $this->finished = true;

        return redirect()->route('draw.index');
    }

    public function startedWishesDraw()
    {
        $randomWishes = Wish::where('is_validated', true)->inRandomOrder()->take(50)->get();

        foreach($randomWishes as $wish) {
            Gift::create([
                'application_id' => $wish->id,
                'name' => $wish->content
            ]);
        }

        $this->finished = true;

        return redirect()->route('draw.index');
    }
}
