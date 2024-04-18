<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Creditor;
use App\Models\Product;
use App\Models\CreditProduct;

class CreditorController extends Controller
{
    public function creditors()
    {
            $creditors = Creditor::all();
            $products = Product::all();

            return view ('dashboard', compact('creditors', 'products'));
    }
    
    public function addCreditor(Request $request)
    {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $data = $request->all();
            
            Creditor::create($data);

            return redirect()->back()->with('success', 'Creditor Added Successfully');
    }
}
