<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Category extends Model
{
    protected $table = 'tblcategories';
    protected $primaryKey = 'categorie_id';
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
