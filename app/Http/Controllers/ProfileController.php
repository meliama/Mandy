<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Seller;
use App\Category;
use App\Product;

class ProfileController extends Controller
{
  public function show()
  {

   $user = \Auth::user();
   $sellers = Seller::where('user_id', $user->id)->get();

   $products = Product::where('user_id', $user->id)->get();

   if (count($sellers) > 0) {
     $seller = $sellers[0];
     $vendedor = true;
   }
   else {
     // No estás vendedor
     $vendedor = false;
   }
   //$user->image = storage_path()."\app\public\\".$user->image;
   if ($user->image == null) {
     $user->image = 'img_profile/default.jpg';
   }

   return view('profile', compact('user', 'seller', 'vendedor', 'products'));
  }

  public function verEditProfile(User $user)
  {

    $user = User::find(\Auth::user()->id);
    $categories = Category::all();
    // Are you a Seller? Estás Vendedor?
    //$seller = $user->seller;
    $sellers = Seller::where('user_id', $user->id)->get();
    if ($user->image == null) {
      $user->image = 'img_profile/default.jpg';
    }

    if (count($sellers) > 0) {
      $seller = $sellers[0];
      $vendedor = true;
    }
    else {
      // No estás vendedor
      $vendedor = false;
      $seller = new Seller();  // si necesitamos...
    }

    return view('/edit-profile', compact('user','vendedor', 'seller', 'categories'));
  }

  public function editPerfil(Request $request, User $user){

    //dd($request);
    $this->validate($request, [
    'name'=>'required|alpha|min:2',
    'surname'=>'required|alpha|min:2',
    //'username'=>'required|min:1|unique:users',
    'username'=>'required|min:1'
  ],
  [
    'name.required'=>'Completá tu nombre',
    'name.alpha'=>'El campo solo debe contener letras',
    'name.min'=>'El nombre debe contener mínimo 2 caracteres',

    'surname.required'=>'Completá tu apellido',
    'surname.alpha'=>'El campo solo debe contener letras',
    'surname.min'=>'El apellido debe contener mínimo 2 caracteres',

    'username.required'=>'Completá tu nombre de usuario',
    'username.min'=>'El nombre de usuario debe contener mínimo 2 caracter',
    // 'username.unique'=>'Ya hay una cuenta asociada a este nombre de usuario',

  ]);

    $user = User::find(\Auth::user()->id);

    // Are you a Seller? Estás Vendedor?
    $sellers = Seller::where('user_id', $user->id)->get();
    if ($user->image == null) {
      $user->image = 'img_profile/default.png';
    }

    if (count($sellers) > 0) {
      //dd($seller);
      $seller = $sellers[0];
      $vendedor = true;
    }
    else {
      // No estás vendedor
      $vendedor = false;
    }

    $user->update($request->all());  // update es más fuerte que fill()

    // Si no era seller antes, y he llenado los campos de vendedor, haz insert
    if (!isset($seller->id) && $request->input('description') != null) {
      // create
      $sellerInsert = new Seller();
      $sellerInsert->location='default';
      $sellerInsert->user_id = $user->id;

      if ($request->input('description') != null) {
        $sellerInsert->description = ($request->input('description'));
      }
      if ($request->input('category_id') != null) {
        $sellerInsert->category_id = ($request->input('category_id'));
      }
      if ($request->input('services') != null) {
        if ($request->input('services') == "on") {
          $sellerInsert->services = 1;
        }
      }
      else {
        $sellerInsert->services = false;
      }
      $sellerInsert->save();
      $seller = $sellerInsert;
    }
    elseif (isset($seller->id)) {
      // Update
      if ($request->input('description') != null) {
        $seller->description = ($request->input('description'));
      }
      if ($request->input('category_id') != null) {
        $seller->category_id = ($request->input('category_id'));
      }
      if ($request->input('services') != null) {
        if ($request->input('services') == "on") {
          $seller->services = 1;
        }
        else {
          $seller->services = ($request->input('services'));
        }
      }
      else {
        $seller->services = false;
      }
      $seller->save();
    }

    $filename = $this->save_imgProfile($request);
    // Si no hay image nuevo, no sobre escriba con null
    if ($request->file('img_profile') != '') {
      $user->image = $filename;
   }
    $user->save();
    $products = Product::where('user_id', $user->id)->get();
    return view('profile', compact('user', 'seller', 'vendedor', 'products'));

	}
  public function imgProfile(Request $request)

    {   //save img
        $user = \Auth::user();
        $file = $request->file('img_profile');
        $name = $user->username.".".$file->extension();
        $folder ='images';
        $path = $file->storePubliclyAs($folder, $name);

    }


  public function save_imgProfile (Request $request)
    {
                 $user = \Auth::user();

                  if ($request->file('img_profile')) {
                    //$user = $request->user();
                    // Necesito el archivo en una variable esta vez
                    $file = $request->file("img_profile");
                    // Armo un nombre único para este archivo
                    $name = $user->id.".".$file->extension();
                    $folder = "img_profile";
                    $path = $request->img_profile->storePubliclyAs($folder, $name);

                    return($path);
                }

}

}
