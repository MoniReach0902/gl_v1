<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Slider extends Model
{
    protected $table = 'tbl_slider';
    protected $primaryKey = 'img_id';
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
