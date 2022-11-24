<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use Illuminate\Http\Request;
use Eloquent;
use Illuminate\Http\Response;

class ProductController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
         return $this->sendResponse(Product::all(), "All products fetched");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $inputs = $request->all();
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        return $this->sendResponse(Product::create($inputs),"Product created.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        if (is_null($product)){
            return $this->sendError('Product does not exist.');
        }
        return $this->sendResponse($product,"Product Fetched.");
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
        $inputs = $request->all();
        if (empty($inputs)){
            return $this->sendError("No data received.");
        }
        $productUpdated = tap(Product::findOrFail($id))->update($request->all());
        return $this->sendResponse($productUpdated,"Product updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return $this->sendResponse([],"Product deleted.");
    }
}
