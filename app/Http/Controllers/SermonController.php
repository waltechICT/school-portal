<?php

namespace App\Http\Controllers;

use App\Models\Sermon;
use Illuminate\Http\Request;
class SermonController extends Controller
{
   public function index(Request $request)
    {
        
        $query = Sermon::query();

        
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

       
        if ($request->filled('speaker')) {
            $query->where('speaker', $request->speaker);
        }

       
        $sermons = $query->orderBy('date', 'desc')->paginate(10);

        
        $speakers = Sermon::whereNotNull('speaker')
                          ->where('speaker', '!=', '')
                          ->distinct()
                          ->pluck('speaker');

        return view('sermons.index', compact('sermons', 'speakers'));
    }
    public function show(Sermon $sermon)
    {
        
         if ($sermon->is_enabled == 0) {
            abort();
         }
    

        
        $relatedSermons = Sermon::where('id', '!=', $sermon->id)
                              ->orderBy('date', 'desc')
                              ->take(4)
                              ->get();

        
        return view('sermons.show', compact('sermon', 'relatedSermons'));
    }
}