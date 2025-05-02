<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class PrintingController extends Controller
{
    public function stock()
    {
        try {
            $products = Product::all();
            $pdf = Pdf::loadView('export.stock', compact('products'));
            return $pdf->download('stock.pdf');

        } catch (\Throwable $th) {
            return redirect()->route('sales.index')->with('error', 'Could not print.');
        }
    }

    public function sale($sale)
    {
        try {
            $sale = Sale::findOrFail($sale);
            $pdf = Pdf::loadView('export.sale', compact('sale'));
            return $pdf->download("Sale-$sale->id.pdf");

        } catch (\Throwable $th) {
            return redirect()->route('sales.index')->with('error', 'Could not print.' . $th->getMessage());
        }
    }
}