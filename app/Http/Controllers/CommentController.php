<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\user;
use Illuminate\Validation\Rule;

class CommentController extends Controller
{
  
    function komen(Request $request, $id)
    {
        $validator = $request->validate([
            'ulasan' => 'required|string|max:255',
            'rating' => ['required', 'numeric', Rule::in([1, 2, 3, 4, 5])],
        ]);
    
        $ulasan = DB::table('ulasanbuku')->insert([
            'UserID' => auth()->user()->UserID,
            'BukuID' => $id,
            'Ulasan' => $request->ulasan,
            'Rating' => $request->rating,
        ]);
    
        return redirect()->back();
    }
}
