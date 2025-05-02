<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $selCount = Sale::count();
        $prodCount = Product::count();
        return view('dashboard', compact('selCount', 'prodCount'));
    }
}