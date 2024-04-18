<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{

    public function addProduct(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);

            $data = $request->all();
            
            Product::create($data);

            return redirect()->back()->with('success', 'Product Added Successfully');
    }
}
