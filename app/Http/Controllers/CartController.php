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
            //check to see that the array is not empty and that their are an actual cart in the database
            if(!empty($cartProducts)){                
                //returns the user to the cart where they can see what they have bought
                $this->calculateCartValues($cartProducts[0]['products']);    
                return view('Cart.index')->with('cartProducts', $cartProducts[0]['products']);
            }
            else {
                return view('Cart.nocart');
            }
        } 
        else {
            //returns this view if the user is not logged in so that the user can see
            return view('Cart.logOut');
        }
    }

    //method to calculate the total for the cart()
    private function calculateCartValues($cartProducts)
    {
        setlocale(LC_MONETARY, 'en_US');
        $total = 0;
        foreach ($cartProducts as $cartProduct) {

            $total = $total + ($cartProduct['quantity'] * $cartProduct['details']['price']);
        }
        session()->put('CartTotal', money_format( '%i' ,$total));
        session()->put('TaxTotal', money_format( '%i' ,($total * .06)));
        session()->put('Total', money_format( '%i' ,($total * 1.06)));
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
        dd("this is the show method");
    }

    /**
     * Show the form for editing the specified resource.
     
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
    public function update(Request $request, CartProduct $cart)
    {
        // action = 0 means that the increase button was used to submit the form
        // action = 1 means the the decrease button was used to submit the form
        $action = intval($request->all()['action']);
        if ($action == 0) {
            $this->increaseOrDecrease(1, $cart->id);
        } else {
            $this->increaseOrDecrease(-1, $cart->id);
        }
        return redirect()->route('cart.index');
        /**
         * TODO:
         * 1. Make everything look pleasent so that we can make it look presentable
         * 2. Work on picture uploads so that we can actually use them       
         * 3. Make session timeouts more elegant then the currently area
         */
    }
    //function to increase or decrease the quantity of the cart item
    private function increaseOrDecrease($val, $cartId)
    {
        $itemInCart = CartProduct::find($cartId);
        $itemInCart->quantity = $itemInCart->quantity + $val;
        $itemInCart->save();
        if ($itemInCart->quantity <= 0) {
            $itemInCart->delete();
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartProduct $cart)
    {
        //this works so leave it as is
        $cartItem = CartProduct::find($cart->id);
        $cartItem->delete();
        return redirect()->route('cart.index');
    }
}
