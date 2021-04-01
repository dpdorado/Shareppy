<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(5);              
        return view('products.index', compact('products'));                
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $rules = [            
            'name'=>'required',
            'description'=>'required',     
            'price'=>'required|integer',
            'imagen'=>'required'
        ];
        $customMessages = [
            //'required' => 'Cuidado!! el campo :attribute no se puede dejar vacío',
            'id.unique'=> 'ya existe un cliente resgistrado con este número de cedula.',
            //'name.required' => 'Cuidado!! el campo del nombre no se admite vacío',
        ];
        $validatedData = $request->validate($rules, $customMessages);

        $image = $request->file('imagen');
        $image->move('uploads', $image->getClientOriginalName());
       
        $product = new Product([            
            'name' => $request->get('name'),
            'description' => $request->get('description'),            
            'price' => $request->get('price'),            
        ]);
        $product->img_path = $image->getClientOriginalName();
        $product->save();

        //archivo
        
        return redirect('/products')->with('success', 'El cliente '.$request->get('id').' ha sido registrado!');
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
        $product = Product::find($id);
        return view('products.edit', compact('product'));
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
        $request->validate([
            'id' => 'exists:products,id',
            'name'=>'required',
            'description'=>'required',     
            'price'=>'required|integer',
            'imagen'=>'required'
        ]);        
        $image = $request->file('imagen');
        $image->move('uploads', $image->getClientOriginalName());

        $product = Product::find($id);
        $product->name =  $request->get('name');
        $product->description = $request->get('description');
        $product->price = $request->get('price');
        $product->img_path = $image->getClientOriginalName();
        $product->save();

        return redirect('/products')->with('success', 'Información del producto '.$id.' actualizada!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect('/products')->with('success', 'El producto '.$id.' ha sido eliminado!');
    }
}
