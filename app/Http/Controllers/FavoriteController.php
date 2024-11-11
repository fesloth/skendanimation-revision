<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', auth()->id())
            ->with(['content' => function ($query) {
                $query->withCount('favorites'); // Get the count of favorites for each content
            }])
            ->paginate(12);

        $content = Content::all();

        return view('home.favorites', [
            'favorites' => $favorites,
            'title' => 'Favorit',
            "content" => $content,
        ]);
    }

    public function store($contentId)
    {
        $content = Content::findOrFail($contentId);

        Favorite::create([
            'user_id' => auth()->id(),
            'content_id' => $content->id
        ]);

        return redirect()->back()->with('success', 'Content added to favorites!');
    }

    public function destroy($contentId)
    {
        $user = auth()->user();

        // temukan favorit berdasarkan user_id dan content_id
        $favorite = Favorite::where('user_id', $user->id)->where('content_id', $contentId)->first();

        if ($favorite) {
            $favorite->delete(); // hapus favorit
            return redirect()->back()->with('success', 'Konten berhasil dihapus dari favorit!');
        }

        return redirect()->back()->with('error', 'Konten tidak ditemukan dalam favorit.');
    }
}
