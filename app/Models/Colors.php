<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Colors extends Model
{
    protected $table = 'tblcolors';
    protected $primaryKey = 'tblcolors';
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
