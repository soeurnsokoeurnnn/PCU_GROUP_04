<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function AddProduct() {
        return view('backend.add-product');
    }

    public function ListProduct() {
        return view('backend.list-product');
    }
}
