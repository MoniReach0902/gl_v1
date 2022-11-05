<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Bankcorporate extends Model
{
    protected $table = 'tblbank_corporate';
    protected $primaryKey = 'bank_id';
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
