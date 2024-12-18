<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store()
    {
        return redirect()->route('contact.create')->with('message', 'Tu mensaje ha sido recibido. Te contestaremos lo antes posible.');
    }
}
