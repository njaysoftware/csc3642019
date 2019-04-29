<?php

namespace App\Http\Controllers;

use App\orders;
use App\OrderDetails;
use Illuminate\Http\Request;
use App\Cart;
use DateTime;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $states = [
        'Alabama - AL',
        'Alaska - AK',
        'Arizona - AZ',
        'Arkansas - AR',
        'California - CA',
        'Colorado - CO',
        'Connecticut - CT',
        'Delaware - DE',
        'District of Columbia - DC',
        'Florida - FL',
        'Georgia - GA',
        'Hawaii - HI',
        'Idaho - ID',
        'Illinois - IL',
        'Indiana - IN',
        'Iowa - IA',
        'Kansas - KS',
        'Kentucky - KY',
        'Louisiana - LA',
        'Maine - ME',
        'Montana - MT',
        'Nebraska - NE',
        'Nevada - NV',
        'New Hampshire - NH',
        'New Jersey - NJ',
        'New Mexico - NM',
        'New York - NY',
        'North Carolina - NC',
        'North Dakota - ND',
        'Ohio - OH',
        'Oklahoma - OK',
        'Oregon - OR',
        'Maryland - MD',
        'Massachusetts - MA',
        'Michigan - MI',
        'Minnesota - MN',
        'Mississippi - MS',
        'Missouri - MO',
        'Pennsylvania - PA',
        'Rhode Island - RI',
        'South Carolina - SC',
        'South Dakota - SD',
        'Tennessee - TN',
        'Texas - TX',
        'Utah - UT',
        'Vermont - VT',
        'Virginia - VA',
        'Washington - WA',
        'West Virginia - WV',
        'Wisconsin - WI',
        'Wyoming - WY'
    ];
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Checkout_orders.create')->with('states', $this->states);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /** TODO:
         * 1. create order record
         * 2. Get data about the cart
         * 3. create all the order details for the cart
         */
        //get the return data
        $data = $request->all();
        //creates the random timestap random order number for the user to create their order
        $data['order_number'] = $this->getOrderNumber();
        //this gets the current time for when the form is submitted
        $data['order_date'] = date("Y-m-d H:i:s");
        //creates an order record and returns the object and assigns the order variable to that object
        $order = orders::create($data);
        //gets all the cart products for the user
        $cartProducts = Cart::where('user_id', $order->customer_ID)->with('products')->get()->toArray();
        //foreach loop to create a new record in the database
        foreach ($cartProducts[0]['products'] as $cartProduct) {
            //create a new orderDetails Record instance
            $orderDetails = new OrderDetails;
            $orderDetails->order_ID = $order->id;
            $orderDetails->product_ID = $cartProduct['product_id'];
            $orderDetails->price = $cartProduct['details']['price'];
            $orderDetails->quantity = $cartProduct['quantity'];
            $orderDetails->save();
        }
        session()->put('shippingMethod', $data['shipping_method']);
        session()->put('orderNumber', $data['order_number']);
        return redirect()->route('orders.show', $order->id);
    }
    private function getOrderNumber() {
        $date = new DateTime();
        $orderNumber = strval($date->getTimestamp());
        for ($i=0; $i < 10; $i++) { 
            $rand = random_int(0, 9);
            $orderNumber = $orderNumber . $rand;
        }
        return $orderNumber;
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function show(orders $orders)
    {
        return view('Checkout_orders.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function edit(orders $orders)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, orders $orders)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\orders  $orders
     * @return \Illuminate\Http\Response
     */
    public function destroy(orders $orders)
    {
        //
    }
}
