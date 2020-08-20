<?php

namespace App\Http\Controllers;

use App\Product;
use App\CategoriaProducto;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Intervention\Image\Facades\Image;
use App\Http\Requests\ProductUpdateRequest;

class ProductController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth', ['except' => ['show', 'search']]);
        //$this->middleware('verified');
        $this->middleware('isAdmin', ['except' => ['show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request){
            $query = trim($request->get('search'));
            $products = Product::where('title', 'LIKE', '%'.$query.'%')->paginate(10);

            return view('products.index', compact('products', 'query'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Product $products)
    {
        $categories = CategoriaProducto::all();

        return view('products.create', compact('products', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
       /*  $data = $request->validate([
            'title' => 'required|min:6|max:140',
            'description' => 'required|max:2000',
            'price' => 'required|min:1',
            'stock' => 'required|min:0',
            'status' =>'required|in:available,unavailable',
            'image' => 'required|image',
            'category'=> 'required',
        ]); */

        //obtener ruta de la imagen
        $route_image = $request['image']->store('upload-products', 'public');

        //resize de la imagen
        $img = Image::make( public_path("storage/{$route_image}"))->fit(1000, 550);
        $img->save();

        //almacenar en la base de datos con modelo

        $products = Product::create([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'status' => $request['status'],
            'image' => $route_image,
            'categoria_id' => $request['category'],
        ]);

       /*  $products = Product::create($request->validated([
        'title' => $request['title'],
        'description' => $request['description'],
        'price' => $request['price'],
        'stock' => $request['stock'],
        'status' => $request['status'],
        'image' => $route_image,
        'categoria_id' => $request['category'],
        ])); */

        return redirect()->route('products.index', compact('products'))->withSuccess("The new product with id {$products->id} was created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::find($id);

        return view('products.show', compact('products'));
        //return $products;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::find($id);

        $categories = CategoriaProducto::all();

        return view('products.edit', compact('products', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, $id)
    {
       /*  $data = $request->validate([
            'title' => 'required|min:6|max:140',
            'description' => 'required|max:2000',
            'price' => 'required|min:1',
            'stock' => 'required|min:0',
            'status' =>'required|in:available,unavailable',
            'category'=> 'required',
        ]); */

         //Asignar los valores
         $products = Product::find($id);
         $products->title = $request['title'];
         $products->description = $request['description'];
         $products->price = $request['price'];
         $products->stock = $request['stock'];
         $products->status = $request['status'];
         $products->categoria_id = $request['category']; 

        //Si el usuario sube una nueva imagen
        if($request['image']) {
            //obtener ruta de la imagen
            $route_image = $request['image']->store('upload-products', 'public');

            //resize de la imagen
            $img = Image::make( public_path("storage/{$route_image}"))->fit(1000, 550);
            $img->save();

            $products->image = $route_image;

        } /* else {
            $route_image = [];
        } */
        
        /* $products->update($request->validated([
            'title' => $request['title'],
            'description' => $request['description'],
            'price' => $request['price'],
            'stock' => $request['stock'],
            'status' => $request['status'],
            'image' => $route_image,
            'categoria_id' => $request['category']
            ]
        )); */

        //dd($products);

        $products->save();
       
        return redirect()->route('products.index', compact('products'))->withSuccess("The new product with id {$products->id} was created");
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
    }

    /* this method is used for change the status of product in project
    (if product is enable o disable to show in inicio view) */

    /* public function changeStatusProducts($id)
    {
        $products = Product::find($id);
        
        if ($products->isEnable) {
            $check = false;
        }else {
            $check = true;
        }
        $products->isEnable = $check;
        
        $products->save();
        
        return redirect(route('products.index')); 

    } */

    /* this method is used to find out products with title same or
    similar at the search input in inicio view */

    public function search(Request $request)
    {
        //$busqueda = $request['buscar'];
        $search = $request->get('search');

        $products = Product::where('title', 'like', '%' . $search. '%')->paginate(1);

        $products->appends(['search' => $search]);

        return view('search.show', compact('products', 'search'));
    }
}
