<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class todo extends Model
{
    protected $table = 'todos';

    protected $fillable = [
        'name',
    ];
}
