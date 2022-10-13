<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Order extends Model
{
    protected $table = 'tblorders';
    protected $primaryKey = 'order_id  ';
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
