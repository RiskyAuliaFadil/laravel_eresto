<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        return response()->json(Checkout::with('product')->get(), 200);
    }

    public function store(Request $request)
    {
        $checkout = Checkout::create($request->all());
        return response()->json($checkout, 201);
    }

    public function show($id)
    {
        $checkout = Checkout::with('product')->find($id);
        if (!$checkout) {
            return response()->json(['message' => 'Checkout not found'], 404);
        }
        return response()->json($checkout, 200);
    }

    public function update(Request $request, $id)
    {
        $checkout = Checkout::find($id);
        if (!$checkout) {
            return response()->json(['message' => 'Checkout not found'], 404);
        }
        $checkout->update($request->all());
        return response()->json($checkout, 200);
    }

    public function destroy($id)
    {
        $checkout = Checkout::find($id);
        if (!$checkout) {
            return response()->json(['message' => 'Checkout not found'], 404);
        }
        $checkout->delete();
        return response()->json(['message' => 'Checkout deleted successfully'], 200);
    }
}
