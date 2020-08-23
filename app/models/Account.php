<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Currency;

class Account extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'accounts';
    protected $fillable = [
        'user_id', 'currency_id', 'name',
        'description', 'initial_balance','account_balance', 'icon',
    ];
    
    protected function verCuentas()

    {
        $usuario_id = Auth::user()->id;
        $cuentas = DB::table($this->table)->where('user_id','=', $usuario_id)->get();

    	return $cuentas;
    }

    public function currency()
    {
      return $this->belongsTo('App\Models\Currency');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
