<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;



class UserPermission extends Model
{
	protected $table = 'users_permission';
	protected $primaryKey = 'permission_id';
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

    public function scopeGetpermission($query, $level_id)
    {
        if(empty($level_id)) return [];
        $level = DB::table("users_permission")
        ->where('permission_id', '=', $level_id)
        ->where('level_status', '=', 'yes')
        ->where('trash', '<>', 'yes')
         ->get();
         if($level->isEmpty()) return false;
         else return $level[0];

    }


}
