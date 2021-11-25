<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgendaModel extends Model
{
    protected $table = 'agenda';
    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'theater',
        'date',
        'time_start',
        'time_end',
        'time_zone',
        'location',
        'event_type',
        'publish',
        //'source_file_1',
        //'source_file_2',
    ];
}
