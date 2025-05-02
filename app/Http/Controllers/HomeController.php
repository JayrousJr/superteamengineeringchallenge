<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index()
    {
        $selCount = Sale::count();
        $prodCount = Product::count();
        $userCount = User::count();
        return view('dashboard', compact('selCount', 'prodCount', 'userCount'));
    }
}