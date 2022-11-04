<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Producttype extends Model
{
    protected $table = 'tblproduct_type';
    protected $primaryKey = 'producttype_id';
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
