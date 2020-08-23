<?php

namespace App\Http\Controllers;
use DB;
use App\Currency;
use Illuminate\Support\Facades\Auth;
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
        return view('currency.index', [
            'currencies' => auth()->user()->allCurrencies()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('currency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $currencies = Currency::checkCurrency();
        //Agregar la moneda a mysql
      $usuario_id = Auth::user()->id;
      $name = $request->name;
      $simbolo = $request->symbol;
      $descripcion = $request->description;
      $tasa = $request->rate;
      //Creamos el array de las monedas
      $currencies = array('user_id' => $usuario_id, 
        'name' => $name,  
        'symbol' => $simbolo,
        'description' => $descripcion,
        'rate' => $tasa);
       
      $id = DB::table('currencies')->insertGetId($currencies);
        
        return Redirect::back();
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
        return view('currency.edit', compact('currency'));
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
        $currencies = Currency::find($currency->id)->update($request->all());
        return redirect('/currencies');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        
        $currencies = Currency::find($currency->id);
        $currencies->delete();
        return Redirect::back();
    }
}
