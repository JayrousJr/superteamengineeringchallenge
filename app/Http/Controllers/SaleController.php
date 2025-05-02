<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Http\Requests\StoreSaleRequest;
use App\Http\Requests\UpdateSaleRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sales = Sale::where('created_at', '>=', now()->subDays(7))
            ->latest()
            ->get();
        return view('/pages/sales/list', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::where("quantity", ">", 0)->get();
        return view('/pages/sales/create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSaleRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = [
                "user_id" => Auth::id(),
            ] + $request->validated();

            Sale::create($data);

            // Update the product's stock
            $product = Product::find($request->product_id);
            $product->quantity -= $request->quantity;
            $product->save();
            DB::commit();
            return redirect()->route('sales.index')->with('success', 'Sale created successfully.');
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('sales.index')->with('error', 'Error creating sale: ' . $th->getMessage());
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSaleRequest $request, Sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sale $sale)
    {
        //
    }
}