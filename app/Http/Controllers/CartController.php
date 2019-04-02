<?php

namespace App\Http\Controllers;

use App\Cart;

use App\CartProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Product;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            //gets the userId for the logined users
            $userId = Auth::user()->id;
            //get the data from the database
            $cartProducts = Cart::where('user_id', $userId)->with('products')->get()->toArray();
            //returns the user to the cart where they can see what they have bought
            return view('Cart.index')->with('cartProducts', $cartProducts[0]['products']);
        } else {
            //returns this view if the user is not logged in so that 
            dd("Else statement");
            return view('Cart.logOut');
        }
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
        if (Auth::check()) {
            //checks to see if the user already has a cart and if they dont then it creates the record
            $authorizedUser = Cart::firstOrCreate(['user_id' => Auth::user()->id]);
            $data = $request->all();
            // gets the the cart_id of the user
            $data['cart_id'] = $authorizedUser->id;
            // creates a cart product in the database if doesn't already exists and update it if it does
            CartProduct::updateOrCreate(['product_id' => $data['product_id'], 'cart_id' => $data['cart_id']], $data);
            // //returns the user to the main cart view
            return redirect()->route('cart.index');
        }
        //if the user is not login
        else {
            return redirect()->route('cart.index');
        }
        // dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cartItem = CartProduct::find($cart->id);
        $cartItem->delete();
        return redirect()->route('cart.idnex');
    }
}
