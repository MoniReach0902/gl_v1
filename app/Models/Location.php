<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class Location extends Model
{
	protected $table = 'tbl_location';
	protected $primaryKey = 'location_id';
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

    public function scopeGetlocation($query, $dflang, $where = [['trash','<>','yes'], ['parent_id', '=', 0]], $except=[0])
    {
        return DB::table($this->table)
        ->select(DB::raw("$this->primaryKey as id, JSON_UNQUOTE(JSON_EXTRACT(title,'$.".$dflang."')) as title"))
        ->where($where)
        ->whereNotIn('location_id', $except)
        ->orderBy('ordering')
        ->orderBy($this->primaryKey);

    }


}
