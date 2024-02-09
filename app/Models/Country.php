<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class Country extends Model
{
    use HasFactory,
        HasRunwayResource;

    // public function states()
    // {
    //     return $this->hasMany( State::class );
    // }
}
