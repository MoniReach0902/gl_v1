<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Media extends Model
{
    protected $table = 'tbl_media';
    protected $primaryKey = 'media_id';
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
