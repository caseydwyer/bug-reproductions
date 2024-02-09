<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use StatamicRadPack\Runway\Traits\HasRunwayResource;

class State extends Model
{
    use HasFactory,
        HasRunwayResource;

    public function cities()
    {
        return $this->hasMany( City::class );
    }

    public function country()
    {
        return $this->belongsTo( Country::class );
    }
}
