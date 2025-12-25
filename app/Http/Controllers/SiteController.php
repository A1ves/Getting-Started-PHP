<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class SiteController extends Controller
{
    public function index(): View
    {
        $name = 'Ayron';
        $functions = [
            'Dev',
            'Analista',
            'Suporte'
        ];

        return view('home', [
            'name' => $name,
            'functions' => $functions
        ]);
    }
}
