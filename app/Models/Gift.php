<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gift extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'application_id', 'name'
    ];

    public function winner()
    {
        return $this->hasOne(GiveawayApplicant::class, 'id', 'application_id');
    }

    public function wish()
    {
        return $this->hasOne(Wish::class, 'id', 'application_id');
    }
}
