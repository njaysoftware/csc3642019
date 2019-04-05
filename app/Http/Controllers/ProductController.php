<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\productRequest;
use Carbon\Carbon;
use Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //gets the data from the database
        $products = Product::get()->toArray();
        $data = array('products' => $products, 'user' => auth()->user());
        //returns the index view with all the data and products already popluted
        return view('Products.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(productRequest $request)
    {
        //gets the data from the form
        $data = $request->all();
        //this line adds the data added by default
        $data['date_added'] = Carbon::now('America/New_York');
        //creates the row in the product table for the data that has been validated already
        $product = Product::create($data);
        //calls the method to get the picture that the user uploads
        $this->storePicture($request, $product);
        //sends the user back to the product.index page after they have submitted the quiz
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(productRequest $request, Product $product)
    {
        //
        $data = $request->all();
        $product = Product::find($data['id']);
        $product->update($data);

        return view('products.show')->with('product', $product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    private function storePicture($request, $product)
    {
        if ($request->hasFile('picture') && $request->file('product')->isValid()) {

            $orginalImage = $request->file('picture');

            $image = Image::make($orginalImage)->encode('jpg', 75);
            $filename = 'product_' . $product->id . '.jpg';
            if (Storage::disk('web')->exists($filename)) {
                Storage::delete($filename);
            }
            Storage::disk('web')->put($filename, $image->getEncoded());
        }
    }
    public function destroy(Product $product)
    {
        $prod = Product::find($product->id);
        $prod->delete();
        return redirect()->route('products.index');
    }
}
