<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
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
        return view('products.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:6',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required|image',
            'tags'=> 'required',
        ]);

        //obtener ruta de la imagen
        $route_image = $request['image']->store('upload-products', 'public');

        //resize de la imagen
        $img = Image::make( public_path("storage/{$route_image}"))->fit(1000, 550);
        $img->save();

        //almacenar en la base de datos con modelo

        $products = Product::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'stock' => $data['stock'],
            'image' => $route_image,
            'tags' => $data['tags'],
        ]);

        //return $products;
        //return view('products.index' , compact('products'));
        //return redirect()->action('ProductController@index');
        return redirect()->route('products.index', compact('products'));
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

        return view('products.edit', compact('products'));
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
        $data = $request->validate([
            'title' => 'required|min:6',
            'description' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'tags'=> 'required',
        ]);

         //Asignar los valores
         $products = Product::find($id);
         $products->title = $data['title'];
         $products->description = $data['description'];
         $products->price = $data['price'];
         $products->stock = $data['stock'];
         $products->tags = $data['tags'];

        //Si el usuario sube una nueva imagen
        if(request('image')) {
            //obtener ruta de la imagen
            $route_image = $request['image']->store('upload-products', 'public');

            //resize de la imagen
            $img = Image::make( public_path("storage/{$route_image}"))->fit(1000, 550);
            $img->save();

            //Asignar al Objeto
            $products->image = $route_image;
        }

        $products->save();
       
        return redirect()->route('products.index');
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

    public function changeStatusProducts($id)
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

    }
}
