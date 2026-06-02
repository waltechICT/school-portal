<?php

namespace App\Http\Controllers;
use App\Models\Gallery;
use App\Models\Sermon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $recentSermons = Sermon::orderBy('date', 'desc')->take(6)->get();
        $galleries = Gallery::latest()->take(6)->get();
        
        return view('index', compact('recentSermons', 'galleries')); 
    }
}