<?php

namespace App\Http\Controllers\Products;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    public function singleproduct($id)
    {
        $product = Product::findOrFail($id);
        $checkingInList = 0;
        
        if (Auth::check()) {
            $checkingInList = Auth::user()
                ->borrowedProducts()
                ->where('product_id', $id)
                ->whereNull('returned_at')
                ->exists();
        }
        
        return view('products.product-single', compact('product', 'checkingInList'));
    }

    public function addtolist(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        try {
            $user->borrowProduct($product);
            $request->session()->flash('success', 'Book Borrowed Successfully');
        } catch (\Exception $e) {
            $request->session()->flash('error', $e->getMessage());
        }

        return redirect()->back();
    }

    public function list()
    {
        $list = Auth::user()
            ->borrowedProducts()
            ->whereNull('borrowed_products.returned_at')
            ->orderBy('borrowed_products.created_at', 'desc')
            ->get();

        return view('products.list', compact('list'));
    }

    public function returnProduct($id)
    {
        $product = Product::findOrFail($id);
        $user = Auth::user();

        try {
            $user->returnProduct($product);
            session()->flash('success', 'Book Returned Successfully');
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('list');
    }

    public function fulllist()
    {
        $fulllist = Product::orderBy('created_at', 'desc')->get();
        return view('products.fulllist', compact('fulllist'));
    }
}

