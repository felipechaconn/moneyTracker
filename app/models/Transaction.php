<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Account;
use App\Models\Category;
use Carbon\Carbon;


class Transaction extends Model
{
    //
    protected $table = 'transaction';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'account_accredit','account_debit', 'category_id','date',
        'type', 'detail', 'amount',
    ];

    protected function checkTransfers()
    {
    $userId = Auth::user()->id;
    $transfer = DB::table($this->table)
    ->where('user_id', '=',  $userId)
    ->where('type', '=', 'Transfers')
    ->get();

    	return $transfer;
    }

    protected function checkIncomes()
    {
        $userId = Auth::user()->id;
        $Income = DB::table($this->table)
            ->where('user_id', '=',  $userId)
            ->where('type', '=', 'Incomes')
            ->get();

        return $Income;
    }

    protected function checkSpends()
    {
        $userId = Auth::user()->id;
        $checkSpends = DB::table($this->table)
        ->where('user_id', '=',  $userId)
        ->where('type', '=', 'Spends')
        ->get();

        return $checkSpends;
    }

    public function accounts()
    {
        //return $this->belongsTo(User::class);
        return $this->belongsTo('App\Models\accounts');
    }
    public function categories()
    {
      return $this->belongsTo('App\Models\Category');
    }

    protected function queryTransaction($date_ini,$date_end)
    {
        return DB::table($this->table)->whereBetween('date', [$date_ini,  $date_end])->get();
    }
    protected function monthTransaction($date)
    {
        return DB::table($this->table)->whereMonth('date', '=', $date)
        ->get();
    }
    protected function yearTransaction($date)
    {
        return DB::table($this->table)->whereYear('fecha', '=', $date)
        ->get();
    }
    protected function lastMonthTransaction()
    {
        return DB::table($this->table)->where('date', '>=', Carbon::now()->subMonth())->get();
    }
    protected function lastYearTransaction()
    {
        return DB::table($this->table)->where('date', '>=', Carbon::now()->subYear())->get();
    }   
}
