<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        if (Auth::user()->role->name == 'User') {
            return view('product.card', ['products' => $products]);
        } else {
            return view('dashboard');
        }
    }

}
