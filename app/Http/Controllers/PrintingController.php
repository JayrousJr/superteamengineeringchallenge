<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PrintingController extends Controller
{
    public function stock()
    {
        try {
            $products = Product::all();
            $pdf = Pdf::loadView('exports.stock', compact('products'));
            return $pdf->download('stock.pdf');

        } catch (\Throwable $th) {
            return redirect()->route('sales.index')->with('error', 'Could not print.');
        }
    }

    public function sale($sale)
    {
        try {
            $sale = Sale::findOrFail($sale);
            $pdf = Pdf::loadView('exports.sale', compact('sale'));
            return $pdf->download("Sale-$sale->id.pdf");

        } catch (\Throwable $th) {
            return redirect()->route('sales.index')->with('error', 'Could not print.' . $th->getMessage());
        }
    }

    public function exportCSV()
    {
        try {
            $fileName = 'sales_export' . now()->format('Y_m_d_H_i') . '.csv';
            $sales = Sale::all();

            $headers = [
                'Content-Type' => 'text/csv',
                'Content-Disposition' => "attachment; filename=\"$fileName\"",
            ];

            $callback = function () use ($sales) {
                $handle = fopen('php://output', 'w');

                fputcsv($handle, ['ID', 'PRoduct Name', 'Seller', 'Quantity', 'Amount', 'Created At']);

                foreach ($sales as $sale) {
                    fputcsv($handle, [
                        $sale->id,
                        $sale->product->name,
                        $sale->user->name,
                        $sale->quantity,
                        $sale->amount,
                        $sale->created_at->format('Y-m-d H:i'),
                    ]);
                }

                fclose($handle);
            };

            return response()->stream($callback, Response::HTTP_OK, $headers);
        } catch (\Throwable $th) {
            return redirect()->route('sales.index')->with('error', 'Could not export sales.' . $th->getMessage());
        }

    }

}