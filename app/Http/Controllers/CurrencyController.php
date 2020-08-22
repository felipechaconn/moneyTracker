<?php

namespace App\Http\Controllers;
use DB;
use App\models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;

class CurrencyController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $currencies = Currency::checkCurrency();
        //Agregar la moneda a mysql
      $usuario_id = Auth::user()->id;
      $simbolo = Input::get('symbol');
      $descripcion = Input::get('description');
      $tasa = Input::get('rate');
      //Creamos el array de las monedas
      $currencies = array('user_id' => $user_id, 
        'symbol' => $simbolo,
        'description' => $descripcion,
        'rate' => $tasa);
       
      $id = DB::table('currencies')->insertGetId($currencies);
        
        return Redirect::back();
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
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('nombreDelView')->with($currencies,compact('currencies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $currencies = Currency::find($id);
        $currencies->delete();
        return Redirect::back();
    }
}
