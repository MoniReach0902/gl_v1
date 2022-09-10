<?php

/*
* 1. Create the functions file : App\Functions\GlobalFunctions.php
* 2. Create a ServiceProvider: php artisan make:provider GlobalFunctionsServiceProvider
* 3. Open the new file App\Providers\GlobalFunctionsServiceProvider.php and edit the register method
    public function register()
    {
        require_once base_path().'/app/Functions/GlobalFunctions.php';
    }

* 4. Register your provider into App\Config\App.php wihtin the providers
* 5. Run some artisan's commands: php artisan clear-compiled, php artisan config:cache
*/

function df_lang()
{
    $app_lang = config('me.app.bankend_lang');
    $cr_lang = app()->getLocale();
    return $app_lang[$cr_lang];
    //return app()->getLocale();
    //return ['kh', 'Khmer', 'ខ្មែរ', 'kh.gif'];
    //return ['en','English','English','en.gif'];
}
// 

function url_builder($routename, $path, $qstring = [], $mix = false)
{
    if (is_string($path)) {
        return $path;
    }

    $c = count($path);
    $url = array_merge($path, array_filter($qstring));
    if ($mix)
        return route($routename . $c, $url);
    else
        return route($routename, $url);
}

function nav_checkactive($subject = [], $args = [], $extra_css = "active")
{
    /*Navegation check Active*/
    $routeinfo = $args['routeinfo'];
    $active_obj = $routeinfo['obj'] . '-' . $routeinfo['act'];
    return in_array($active_obj, $subject) || in_array($routeinfo['obj'], $subject) ? $extra_css : '';
}


function is_axios()
{

    return request()->input('action_handler_mode') && request()->input('action_handler_mode') == 'axios';
}

function save_type_route($savetype, $obj_info, $id = '', $other_type = [], $qstring = [])
{
    $arr_savetype = [
        "save" => "index",
        "new" => "create",
        "apply" => 'edit'
    ];
    $arr_savetype = array_merge($arr_savetype, $other_type);
    $action = empty($arr_savetype[$savetype]) ? 'index' : $arr_savetype[$savetype];
    $routing = url_builder(
        $obj_info['routing'],
        [$obj_info['name'], $action, $id],
        $qstring
    );

    return $routing;
}

function where_not_topadmin()
{
    return "(permission_id<>1)";
}

function where_not_trush($table = '')
{
    return "(" . $table . "trash<>'yes' OR " . $table . "trash IS NULL)";
}

function check_user_permission($controller, $act, $protectme, $userinfo)
{
    if ($protectme == null || $userinfo['permission_id'] == 1) {
        return true;
    }
    $controller =  strtolower($controller);
    $act = strtolower($act);
    $gonext = true;
    $levelsetting = ($userinfo['permission_setting']) ? $userinfo['permission_setting'] : [];
    $cover_method = [];
    $cover_object = [];
    $object = $protectme['object'];
    $method = $protectme['method'];
    foreach ($method as $main => $sub) {
        foreach ($sub['cover'] as $cover)
            $cover_method[$cover] = $main;
    }
    if (array_key_exists($act, $cover_method)) {
        foreach ($object as $item) {
            $trytoaccess = $item . '-' . $cover_method[$act];
            if (in_array($trytoaccess, $levelsetting)) {
                $gonext = true;
                break;
            } else {
                $gonext = false;
            }
        }
    }
    return $gonext;
}


function recordInfo($current, $perpage, $total, $lastpage = 0)
{
    #use for Pagination, it will inform other info of pagination#
    $from = ($current == 1) ? ($total == 0) ? 0 : 1 : (($current - 1) * $perpage) + 1;

    $to = ($current == 1) ? $perpage  : ($current * $perpage);
    if ($to > $total) $to = $total;
    return ['from' => $from, 'to' => $to, 'total' => $total, 'perpage' => $perpage, 'lastpage' => $lastpage];
}

function addColumn($sTable, $sColumn)
{
    // use Schema;
    // use Illuminate\Database\Schema\Blueprint;
    // use Illuminate\Support\Facades\DB;

    \Schema::table($sTable, function (Illuminate\Database\Schema\Blueprint $table) use ($sTable, $sColumn, &$fluent) {
        if (!\Schema::hasColumn($sTable, $sColumn)) {
            if ($sColumn == '_attachments') {
                $fluent = $table->text($sColumn)->collate('utf8_general_ci')->nullable();
            } else {
                $fluent = $table->string($sColumn)->collate('utf8_general_ci')->nullable();
            }
        }
    });

    return response()->json($fluent);
}

function addColumnDouble($sTable, $sColumn)
{
    // use Schema;
    // use Illuminate\Database\Schema\Blueprint;
    // use Illuminate\Support\Facades\DB;

    \Schema::table($sTable, function (Illuminate\Database\Schema\Blueprint $table) use ($sTable, $sColumn, &$fluent) {
        if (!\Schema::hasColumn($sTable, $sColumn)) {
            $fluent = $table->double($sColumn)->nullable();
        }
    });

    //return response()->json($fluent);
}

function calScore(array $scores)
{
    $score = 0;
    $percentage = 0;
    $count = count($scores);
    for ($i = 0; $i < $count; $i++) {
        if ($scores[$i] > -1) {
            $score += (int)$scores[$i];
        }
    }
    return [
        'score' => $score,
        'percentage' => $score,
    ];
}

// function getTableColumns($table)
// {
//     return \DB::getSchemaBuilder()->getColumnListing($table);

//     // OR

//     return \Schema::getColumnListing($table);
// }

// function getJsonColumn($jsonfield, $attibute)
// {
//     return "JSON_UNQUOTE(JSON_EXTRACT(" . $jsonfield . ", '$." . $attibute . "'))";
// }

// function month_in_khmer($index)
// {

//     $mont = ["", "មករា", "កុម្ភៈ", "មីនា", "មេសា", "ឧសភា", "មិថុនា", "កក្កដា", "សីហា", "កញ្ញា", "តុលា", "វិច្ឆិកា", "ធ្នូ"];

//     $index = (int)$index;
//     $index = ($index < 1) ? 0 : $index;
//     $index = ($index > 12) ? 0 : $index;
//     return $mont[$index];

//     function num_in_khmer($num_en)
//     {

//         $length = strlen($num_en);

//         $num_en = str_split($num_en);

//         $num_kh = ["០", "១", "២", "៣", "៤", "៥", "៦", "៧", "៨", "៩"];
//         $new_str = '';
//         for ($i = 0; $i < $length; $i++) {
//             $index = $num_en[$i];
//             $index = (int)$index;
//             if ($index >= 0 && $index <= 9) {
//                 $new_str .= $num_kh[$index];
//             }
//         }
//     };

//     return response()->json($fluent);
// }

function getTableColumns($table)
{
    return \DB::getSchemaBuilder()->getColumnListing($table);

    // OR

    return \Schema::getColumnListing($table);
}

function getJsonColumn($jsonfield, $attibute)
{
    return "JSON_UNQUOTE(JSON_EXTRACT(" . $jsonfield . ", '$." . $attibute . "'))";
}

function month_in_khmer($index)
{
    $mont = [
        "", "មករា", "កុម្ភៈ", "មីនា",
        "មេសា", "ឧសភា", "មិថុនា", "កក្កដា", "សីហា",
        "កញ្ញា", "តុលា", "វិច្ឆិកា", "ធ្នូ"
    ];
    $index = (int)$index;
    $index = ($index < 1) ? 0 : $index;
    $index = ($index > 12) ? 0 : $index;
    return $mont[$index];
}
function num_in_khmer($num_en)
{
    // dd(df_lang());
    if (df_lang()[0] == 'en') {
        return $num_en;
    }
    $length = strlen($num_en);
    // dd($length);
    $num_kh = ["០", "១", "២", "៣", "៤", "៥", "៦", "៧", "៨", "៩"];
    $num_en = str_split($num_en);
    $new_str = '';
    for ($i = 0; $i < $length; $i++) {
        $index = $num_en[$i];
        if (is_numeric($index)) {
            $index = (int)$index;
            if ($index >= 0 && $index <= 9) {
                $new_str .= $num_kh[$index];
            }
        } else {
            $new_str .= $index;
        }
    }

    return $new_str;
}
function filterCondition1($tablename, $parterns, $userinfo)
{

    $permission_id = $userinfo['permission_id'];
    $conditions = [];
    if ($permission_id > 1) {
        // dd($userinfo);

        $tablename = empty($tablename) ? $tablename : $tablename . '.';
        foreach ($parterns as $field) {
            $condition = "";
            $field_chk = $field;
            if ($field == 'province') {
                $field_chk = 'province_id';
            }
            if ($field == 'district') {
                $field_chk = 'district_id';
            }
            if ($field == 'commune') {
                $field_chk = 'commune_id';
            }
            if (!empty($userinfo[$field_chk])) {
                $condition = $tablename . $field . ' in (' . $userinfo[$field_chk] . ')';
                array_push($conditions, $condition);
            }
        }

        return  '(' . implode(' and ', $conditions) . ')';




        //$condition = $filterValue . ' in (' . $userinfo[$value] . ')';
    } else {
        return '1=1';
    }
}
function langConfig($request)
{
    if ($request->exists('lang')) {
        $lang = $request->query('lang');
        session(['lang' => $lang]);
    } elseif (null == session('lang')) {
        session(['lang' => 'en']);
    }
    $lang = session('lang');
    \App::setLocale($lang);
}

function replaceString($str)
{
    return preg_replace("/\([^)]+\)/", "", $str ?? '');
}
function mathScore($setting)
{
    return $setting;
}
