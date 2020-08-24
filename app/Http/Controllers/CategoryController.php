<?php

namespace App\Http\Controllers;

use App\models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use DB;
use Image;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('category.index', [
            'categories' => auth()->user()->allCategories()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
        $icon = $request->file('icon');
        $filename = time() . '.' . $icon->getClientOriginalExtension();
        Image::make($icon)->resize(300, 300)->save( public_path('/uploads/icons/' . $filename ) );
        $user_id = Auth::user()->id;
        $father_cat = $request->father_cat;
        $type = $request->type;
        $name = $request->name;
        $description = $request->description;
        $budget = $request->budget;
        $account_balance = $request->account_balance;

      //Creamos el array de las monedas
      $category = array('user_id' => $user_id, 
        'currency_id' => $currency_id,
        'name' => $name,
        'father_cat'=>$father_cat,
        'type'=>$type,
        'budget'=>$budget,
        'description' => $description,
        'initial_balance' => $initial_balance,
        'account_balance'=>$account_balance,
        'icon' => $filename);

      DB::table('categories')->insert($category);  
        return Redirect::back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        $category = Category::find($category->id)->update($request->all());
        return redirect('/cateogories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $category = Category::find($category->id);
        $category->delete();
        return Redirect::back();
    }
}
