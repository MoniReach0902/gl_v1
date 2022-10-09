<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Events extends Model
{
    protected $table = ' tblnew_events';
    protected $primaryKey = 'newevent_id ';
    public $timestamps = false;
    /*protected $fillable = array(
        'name',
        'artist',
        'price'
    );*/

    public function scopeGettable()
    {
        return $this->table;
    }
}
