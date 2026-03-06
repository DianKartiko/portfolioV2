<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function resume()
    {
        return view('pages.resume'); // Folder resources/views/pages/resume.blade.php
    }

    public function gallery()
    {
        return view('pages.gallery');
    }

    public function blogs()
    {
        return view('pages.blogs');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
