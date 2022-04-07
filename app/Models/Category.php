<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];



    /*Anger vad som ska stå i uri'n*/
    public function getRouteKeyName()
    {
        return 'name';
    }

}
