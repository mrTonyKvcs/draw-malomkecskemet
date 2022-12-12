<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiveawayApplicant extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'giveaway_id', 'receipt_number', 'name', 'email', 'age', 'city', 'accept_giveaway_rules', 'accept_gdpr', 'sign_up_for_newsletter', 'receipt_image_path'
    ];

    public function giveaway()
    {
        return $this->belongsTo(Giveaway::class);
    }

    public function gift()
    {
        return $this->belongsTo(Gift::class, 'application_id');
    }

    public function scopeAuthenticated($query)
    {
        return $query->where('authenticated', true);
    }
}
