<?php

namespace App\Http\Livewire;

use App\Models\Gift;
use App\Models\GiveawayApplicant;
use Livewire\Component;

class GiftPackageDraw extends Component
{
    public $gifts;
    public $applicants;
    public $winnerIds = array();
    public $winnerEmails = array();
    public $secondaryWinnerEmails = array();
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
    }

    public function render()
    {
        return view('livewire.gift-group-draw', [
            'gifts' => $this->gifts,
            'finished' => $this->finished
        ]);
    }

    public function startedDraw()
    {
        foreach ($this->gifts as $gift) {
            $winner = GiveawayApplicant::authenticated()
                ->where('giveaway_name', trim(preg_replace('/\s+/', ' ', $gift->name)))
                ->whereNotIn('email', $this->winnerEmails)
                ->inRandomOrder()
                ->first();

            array_push($this->winnerEmails, $winner?->email);
            $gift->update(['application_id' => $winner?->id]);

            $count = GiveawayApplicant::authenticated()
                ->where('giveaway_name', trim(preg_replace('/\s+/', ' ', $gift->name)))
                ->whereNotIn('email', $this->winnerEmails)
                ->count();

            if ($count > 0) {
                $secondaryWinner = GiveawayApplicant::authenticated()
                    ->where('giveaway_name', trim(preg_replace('/\s+/', ' ', $gift->name)))
                    ->whereNotIn('email', $this->winnerEmails)
                    ->whereNotIn('email', $this->secondaryWinnerEmails)
                    // ->inRandomOrder()
                    ->first();

                array_push($this->secondaryWinnerEmails, $secondaryWinner?->email);
                $gift->update(['secondary_application_id' => $secondaryWinner?->id]);
            }
        }

        $this->gifts = null;
        $this->gifts = Gift::all();
        $this->finished = true;

        return redirect()->route('draw.GiftPackage.index');
    }
}
