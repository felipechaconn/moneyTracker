<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
class Category extends Model
{
    protected $table = 'categories';

    protected function showCategories()
    {
            $user_id = Auth::user()->id;
    	    $categories = DB::table($this->table)->where('user_id','=', $user_id)->get();
        return $categories;
    }

    protected function categories()
    {
    	    $categories = DB::table('category')->get();
        return $categories;
    }
    public function transactions() {
        return $this->hasMany('App\Models\Transaction');
    }
}
