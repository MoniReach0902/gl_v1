<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Newevent extends Model
{
    protected $table = 'tblnew_event';
    protected $primaryKey = 'newevent_id';
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
