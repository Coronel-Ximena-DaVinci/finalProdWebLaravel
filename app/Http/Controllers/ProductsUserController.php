<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductsUserController extends Controller
{
    public function index(Request $request){
        
        $productos = Product::query();


        if ($request->name) {
            $productos->where('name', 'like', '%' .  $request->name . '%');
        }

        $request->session()->flashInput($request->all());
        return view('catalogo', [
            'productos' => $productos->paginate(5),
        ]);
        
    }
    public function search(){
       
    }
    public function show(){
        
    }
}   