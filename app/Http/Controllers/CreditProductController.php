<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreditProduct;
use App\Models\Creditor;
use App\Models\Product;


class CreditProductController extends Controller
{
    public function creditProduct(Request $request, $id)
    {
            $creditProducts = CreditProduct::where('creditorID', $id)->with('credit', 'product')->get();
            $credit = Creditor::findOrFail($id);
            
            return view ('credit.viewCredit', compact('creditProducts', 'credit'));
    }

    public function addCreditProduct(Request $request)
    {
            $request->validate([
                'creditorID' => 'required|exists:creditor,id',
                'productID'=> 'required|exists:product,id',
                'quantity'=> 'required|numeric',
            ]);

            $product = Product::findOrFail($request->productID);
            $total = $product->price * $request->quantity;

            $data = $request->all();
            $data["total"] = $total;
            $data["created_by"] = \Auth::user()->name;

            $creditProduct = CreditProduct::create($data);

            if ($creditProduct) {
                // Update the balance of the corresponding creditor
                $creditor = Creditor::findOrFail($request->creditorID);
                $creditor->balance += $total;
                $creditor->save();
    
                return redirect()->back()->with('success', 'Credit Product Added Successfully');
            } else {
                return redirect()->back()->with('error', 'Failed');
            }
            // return redirect()->back()->with('success', 'Credit Product Added Successfully');
            // return response()->json(['message' => 'Credit Product Added Successfully']);
    }


}
