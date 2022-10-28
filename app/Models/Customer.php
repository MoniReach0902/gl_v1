<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Customer extends Model
{
    protected $table = 'tblcustomers';
    protected $primaryKey = 'customer_id';
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
