<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class City extends Model
{
    use HasFactory,
        HasRunwayResource;

    public function state()
    {
        return $this->belongsTo( State::class );
    }
}
