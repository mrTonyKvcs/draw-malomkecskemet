<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Giveaway extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'slug', 'name'
    ];

    protected $dates = [
        'started_at', 'expired_at'
    ];

    /**
     * undocumented function
     *
     * @return void
     */
    public function applicants()
    {
        return $this->hasMany(GiveawayApplicant::class, 'giveaway_id');
    }
}
