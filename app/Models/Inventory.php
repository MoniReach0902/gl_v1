<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Inventory extends Model
{
    protected $table = 'tblinventorys';
    protected $primaryKey = 'inventory_id  ';
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
