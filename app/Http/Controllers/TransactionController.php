<?php

namespace App\Http\Controllers;

use App\models\Transaction;
use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Currency;
use App\Models\Category;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class TransactionController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            //Mostrar solamente los transactions
            $transactions = Transaction::checkTransfers();
            $accounts = Account::checkAccounts();
            return view('transaction.index', compact('accounts','transactions'));
    }


    public function showIncomes()
    {       
      //Mostrar solamente los ingresos
        $incomes = Transaction::checkIncomes();
        $accounts = Account::checkAccounts();
        return view('incomes.index', compact('accounts','incomes'));
    } 
    public function checkSpends()
    {       
      //Mostrar solamente los ingresos
        $spends = Transaction::checkSpends();
        $accounts = Account::checkAccounts();
        return view('spends.index', compact('accounts','spends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $trans = Transaction::find($transaction->id);
       
        return view('transaction.show')->with('trans',compact('transaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
         //Cargar los datos del translado    
       $transaction = Transaction::find($transaction->id);
       $json = json_encode($transaction);

       //Cargar las cuentas
       $accounts = Account::checkAccounts();
       $categories = Category::showCategories();
    
    return view('transaction.edit', compact('transaction','accounts','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
        $trans = Transaction::find($trans->id)->update($request->all());
        return redirect('/transactions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
        $trans = Transaction::find($transaction->id);
        $trans->delete();
        return Redirect::back();
    }
}
