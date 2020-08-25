<?php

namespace App\models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\models\Account;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'avatar', 'password',
    ];

    protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function allCurrencies(){
        return Currency::get()->where('user_id', $this->id);
    }

    public function allAccounts(){
        return Account::get()->where('user_id', $this->id);
    }

    public function allCategories(){
        return Category::get()->where('user_id', $this->id);
    }

    public function allIncomes(){
        $transactions = Transaction::get()->where('user_id', $this->id);
        $totalIncomes = $this->accountsTotal();
        foreach ($transactions as $income) {
            if ($income->type === 'income') {
                $totalIncomes += $income->amount;
            }
        }
        return $totalIncomes;
    }

    public function accountsTotal(){
        $accounts = $this->allAccounts();
        $total = 0;
        foreach ($accounts as $account) {
            $total += $account->initial_balance;
        }
        return $total;
    }
    
    public function currencies(){
        return $this->hasMany(Currency::class);
    }

    public function accounts(){
        return $this->hasMany(Account::class);
    }

    public function categories(){
        return $this->hasMany(Category::class);
    }
}
