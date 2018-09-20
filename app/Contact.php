<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'conus_id';

    protected $fillable = [
        'conus_status',
    ];

}
