<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function showAboutPage() {

        $services = [
            'Databases',
            'Advance Databases',
            'Discrete Mathematics',
            'Software Engineering',
            'Compilers'
        ];

        return view('about.about', compact('services'));
    }
    
}
