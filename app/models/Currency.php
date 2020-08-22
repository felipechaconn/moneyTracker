<?php

namespace App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    //
    const CREATED_AT = 'creation_date';
    protected $table = 'currencies';
    protected $primaryKey = 'currency_id';

    protected $fillable = [
        'user_id', 'symbol',
        'description', 'rate',
    ];

    protected function checkCurrency() {
        $userId = Auth::user()->id;
        $currencies = DB::table($table)->where('user_id','=', $userId)->get();

        return $currencies;
    }
}
