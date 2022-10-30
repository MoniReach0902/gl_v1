<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Equipment extends Model
{
    protected $table = 'tblequipments';
    protected $primaryKey = 'equipment_id';
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
