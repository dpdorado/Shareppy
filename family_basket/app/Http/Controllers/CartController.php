<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts = Cart::paginate(5);              
        return view('carts.index', compact('carts'));         
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
        $product = Product::find($request->producto_id);        
        $cart = new Cart([            
            'id' => $product->id, 
            'name' => $product->name, 
            'price' => $product->price, 
            'count' => 1
            //array("urlfoto"=>$product->img_path)           
        ]);
        $cart->save();
        //return back()->with('success',"$product->name ¡se ha agregado con éxito al carrito!");
        return redirect('/products_list')->with('success',"$product->name ¡se ha agregado con éxito al carrito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        
        return redirect('/carts')->with('success',"Producto eliminado con éxito de su carrito.");            
    }

    public function clear(){        
        Cart::clear();
        //return back()->with('success',"The shopping cart has successfully beed added to the shopping cart!");
        return redirect('/carts')->with('success',"The shopping cart has successfully beed added to the shopping cart!");
    }
}