<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class Category extends Model
{
    protected $table = 'categories';
    protected function showCategories()
    {
        $user_id = Auth::user()->id;
    	$categories = DB::table($this->table)->where('user_id','=', $user_id)->get();
    return $categories;
    }
}
