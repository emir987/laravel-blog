<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function showWelcomePage() {
        return view('home.welcome');
    }

    public function showParameterizedRoute($id, $title) {
        return 'This is '. $id . ' with title: ' . $title;
    }
}
