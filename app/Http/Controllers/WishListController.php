<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $products = User::findOrFail($id)->wishList()->paginate(20);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('products.index');
        }

        return view('products.index', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Product::findOrFail($request->get('product_id'));

            auth()->user()->toggleWishList($product);
        } catch (ModelNotFoundException $exception) {
            return redirect()->route('products.index');
        }

        return redirect()->back();
    }
}
