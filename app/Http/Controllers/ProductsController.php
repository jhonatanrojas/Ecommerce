<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Http\Resources\ProductsCollection;

class ProductsController extends Controller
{


        public function __construct(){
            $this->middleware('auth',['except'=>['index','show']]);

        }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

   
        //
        $products = Product::paginate(15);

      if($request->wantsJson()){

               //return $products->toJson();

               return new ProductsCollection( $products);
              
        }

        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $product = new Product;
        return view('products.create',["product"=> $product ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->all());
        //
        $option = [
        'title'        =>  $request->title,
        'description'  =>  $request->description,
        'price'        =>  $request->price

        ];

        if(Product::create($option)){

        return redirect('/productos');

        }else{
            return redirect('products.create');
        }
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
        $product=Product::find($id);
        
        return view("products.show",["product"=>$product]);
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

        return view("products.edit",["product"=>$product]);
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
        $product = Product::find($id);
        $product->title= $request->title;
        $product->price= $request->price;
        $product->description= $request->description;
        if(  $product->save()){
            return redirect('/');

        }else{

            return view("products.edit",["product"=>$product]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
        $product = Product::destroy($id);
        return redirect('/productos');
    }
}
