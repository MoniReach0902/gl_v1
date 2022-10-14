<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Colors extends Model
{
    protected $table = 'tblcolors';
    protected $primaryKey = 'color_id';
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
