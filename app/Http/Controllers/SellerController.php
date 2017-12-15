<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seller;
use App\User;
use App\Product;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$user = \Auth::user();
        //return view('edit-profile', compact('user'));
        //$seller = Seller::with('user')->first();
        $user = \Auth::user();
        //$user_id = $user->id;
        // $sellers = Seller::where('user_id', '=', 2)
        //   ->take(1)
        //   ->get();

        $sellers = Seller::all();
        //dd(compact('sellers'));
        return view('sellers/sellers', compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Arrive here from POST on form submit.  Validate and save.


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $seller = Seller::find($id);
      $products = Product::where('user_id',$seller->user_id)->get();
      return view('sellers/seller', compact('seller','products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      // Open the form.  Note, we know the user id...
      $seller = Seller::find($id);
      //dd(compact('seller'));
      return view('sellers/edit-seller', compact('seller'));
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
        //return "Hello Seller update";
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
}
