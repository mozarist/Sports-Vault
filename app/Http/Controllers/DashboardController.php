<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Form;

class DashboardController extends Controller
{
    /**
     * Display dashboard page.
     */
    public function index()
    {
        $product = Product::all();
        $form = Form::all();
        return view('dashboard', compact('product', 'form'));
    }
}
