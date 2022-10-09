<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Example extends Model
{
    protected $table = 'example';
    protected $primaryKey = 'exmaple_id  ';
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
