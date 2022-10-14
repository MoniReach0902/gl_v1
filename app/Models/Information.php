<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Information extends Model
{
    protected $table = ' tblinformation';
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
