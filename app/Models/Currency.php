<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Currency extends Model
{
    protected $table = 'tblcurrencys';
    protected $primaryKey = 'curency_id';
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
