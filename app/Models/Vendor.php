<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Vendor extends Model
{
    protected $table = 'tblvendors';
    protected $primaryKey = 'vendor_id';
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
