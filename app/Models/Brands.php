<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Brands extends Model
{
    protected $table = 'tblbrands';
    protected $primaryKey = 'brand_id';
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
