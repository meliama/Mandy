<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Product;
use App\Category;
use App\Image;
use App\Seller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(9);
        return view('products.index', compact('products'));
    }
    public function index2()
    {
        //$products = Product::paginate(4);
        return view('products/index2', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = new Product();
        $categories = Category::all();
        $images = $product->image;
        return view('products.create', compact('product', 'categories', 'images'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product($request->all());
        $images = $product->image;
        $user = \Auth::user();
        $product->user_id = $user->id;

        $product->save();

        $filename = $this->save_imgProduct($request, $product);

        $user->image = $filename;

        return view('products/fotoform', compact('id','product','images'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $images = $product->image;
        // dd($product);
        // dd($images);
        return view('products.show', compact('product', 'images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
      $categories = Category::all();
      $images = $product->image;

      return view('products.edit', compact('product', 'categories', 'images'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, Product $product)
    {
      $user = \Auth::user();
      $product->fill($request->all());
      $product->user_id = $user->id;
      $product->save();

      return redirect()->route('profile', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('profile');
    }


    public function save_imgProduct (Request $request, Product $product)
        {
            if ($request->file('img_product')) {
              // Necesito el archivo en una variable esta vez
              $file = $request->file("img_product");
              // Armo un nombre único para este archivo
              // Usa time acá para asegurar archivos diferente
              $fecha = time();
              $name = $product->id."_".$fecha.".".$file->extension();
              $folder = "img_products";
              $path = $request->img_product->storePubliclyAs($folder, $name);

              //$image = new \App\Image(['src' =>'prod-'.$product->id.'/'.$name.'.'.$ext]);
              $image = Image::create(['src' =>$path,
                                      'product_id' => $product->id ]);
              $image->save();
              return($path);
          }

           return redirect('home');
        }

    public function editFotos($id) {
          $product = Product::find($id);
          $images = $product->image;

       return view('products/fotoform', compact('product', 'images'));
    }
    public function addFotos($id, Request $request) {

       $product = Product::find($id);
       $filename = $this->save_imgProduct ($request, $product);
       $images = $product->image;
       return view('products/fotoform', compact('product', 'images'));
    }

    public function deleteFotos($image_id)
    {
        $image = Image::find($image_id);
        // necesitamos producto antes de borrar para saber el retorno
        $product = Product::find($image->product_id);
        $image->delete();

        $id = $product->id;  // evita confuso de id. quiero product id, no image id
        $images = $product->image;
        return view('products/fotoform', compact('product', 'images'));

    }

    public function searchProduct(Request $request) {

      $param = isset($request['search']) ? $request['search'] : null  ;
      $products = Product::where('name', 'LIKE', '%'.$param.'%')
              ->orWhere('description', 'LIKE', '%'.$param.'%')
              ->get();

      return view('products/index2', compact('products'));
    }
}
