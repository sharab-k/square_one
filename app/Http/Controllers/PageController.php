<?php

namespace App\Http\Controllers;

use App\Support\GraphicsGallery;

class PageController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function services() {
        return view('services');
    }

    public function ourwork(GraphicsGallery $gallery) {
        return view('ourwork', [
            'graphics' => $gallery->items(),
            'graphicCategories' => $gallery->categories(),
        ]);
    }

    public function pricing() {
        return view('pricing');
    }

    public function whyus() {
        return view('whyus');
    }
}
