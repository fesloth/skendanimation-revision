<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        // Cari user dengan nama yang mengandung kata kunci
        $users = User::where('name', 'like', "%$query%")->pluck('id'); 

        // Cari konten yang diposting oleh user yang ditemukan
        $contents = Content::whereIn('user_id', $users)->get();

        return view('search', compact('contents', 'query'));
    }
}
