<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Content;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;
use App\Models\SearchHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $users = User::all();
        $userContents = Content::all();

        return view('home.home', [
            "title" => "Home",
            "user" => $user,
            "userContents" => $userContents,
            "users" => $users
        ]);
    }

    public function location()
    {
        return view('home.location');
    }

    public function blog()
    {
        // Cek apakah pengguna sudah login
        $user = auth()->user();

        // Ambil konten yang ada
        $userContents = Content::paginate(12);

        // Jika pengguna login, ambil data favoritnya. Jika tidak, inisialisasi sebagai koleksi kosong.
        $favorites = $user ? Favorite::where('user_id', $user->id)->pluck('content_id') : collect();

        return view('home.blog', [
            "title" => "Blog",
            "userContents" => $userContents,
            "user" => $user,
            "favorites" => $favorites,
        ]);
    }

    public function logout(Request $request)
    {
        $user = auth()->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function user($id = null)
    {
        // Jika id tidak diberikan, ambil profil pengguna yang sedang login
        $user = $id ? User::findOrFail($id) : auth()->user();

        $instagramLink = $user->instagram;
        $youtubeLink = $user->youtube;
        $discordID = $user->discord;

        $userContents = $user->contents;

        return view('home.profile', [
            "title" => "Profile Setting",
            "user" => $user,
            "youtubeLink" => $youtubeLink,
            "discordID" => $discordID,
            "userContents" => $userContents,
        ])->with(compact('user', 'instagramLink', 'youtubeLink', 'discordID', 'userContents'));
    }


    public function user_setting()
    {
        $user = auth()->user();
        $instagramLink = $user->instagram;

        return view('home.action.usersetting', [
            "title" => "Edit Profile",
            "user" => $user,
            "instagramLink" => $instagramLink,
        ])->with(compact('user', 'instagramLink'));
    }


    public function create()
    {
        $user = auth()->user();

        return view('home.action.create', [
            "title" => "Tambah Profile",
            "user" => $user,
        ])->with(compact('user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'bio' => 'nullable|string',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'bio' => $request->input('bio'),
        ];

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_image'] = $profilePicturePath;
        }

        $user->update($data);

        return redirect('/profile')->with('success', 'Profile created successfully!');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required|string',
            'bio' => 'nullable|string',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'bio' => $request->input('bio'),
            'instagram' => $request->input('instagram'),
            'discord' => $request->input('discord'),
            'youtube' => $request->input('youtube'),
        ];

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_image'] = $profilePicturePath;
        }

        $user->update($data);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    public function deleteProfileImage()
    {
        $user = auth()->user();

        if ($user->profile_image) {
            // Hapus gambar dari storage
            if (Storage::disk('public')->exists($user->profile_image)) {
                Storage::disk('public')->delete($user->profile_image);
            }

            // Update profile_image menjadi null
            $user->profile_image = null;
            $user->save();
        }

        return redirect()->back()->with('success', 'Gambar profil berhasil dihapus.');
    }

    public function createContent()
    {
        return view('home.produk.konten', [
            "title" => "Tambah Konten"
        ]);
    }

    public function storeContent(Request $request)
    {
        // Validasi data yang diunggah oleh pengguna
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:Art,Animation,Gift,Commision,YCH,3D', // Validasi untuk type ENUM
        ]);

        // Simpan konten yang diunggah ke dalam database
        $content = new Content();

        // Simpan gambar dan ambil path-nya
        $imagePath = $request->file('image')->store('content_images');

        // Simpan data konten ke dalam database
        $content->image = $imagePath;
        $content->title = $request->input('title');
        $content->content = $request->input('content');
        $content->type = $request->input('type');
        $content->user_id = auth()->user()->id;
        $content->save();

        // Redirect kembali ke halaman profil pengguna dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Konten berhasil ditambahkan!');
    }

    public function editContent($id)
    {
        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('home')->with('error', 'Content not found.');
        }

        return view('home.action.edit-content', [
            'title' => 'Edit Konten',
            'content' => $content,
        ]);
    }

    public function updateContent(Request $request, $id)
    {
        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('home')->with('error', 'Content not found.');
        }

        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'type' => 'required|in:Art,Animation,Gift,Commision,YCH,3D',
        ]);

        $data = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'type' => $request->input('type'),
        ];

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($content->image) {
                Storage::delete($content->image);
            }

            // Simpan gambar baru
            $imagePath = $request->file('image')->store('content_images');
            $data['image'] = $imagePath;
        }

        $content->update($data);

        return redirect()->route('profile')->with('success', 'Content updated successfully!');
    }

    public function destroyContent($id)
    {
        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('home')->with('error', 'Content not found.');
        }

        // Hapus gambar terkait jika ada
        if ($content->image) {
            Storage::delete($content->image);
        }

        $content->delete();

        return redirect()->route('profile')->with('success', 'Content deleted successfully!');
    }

    public function destroyContents($id)
    {
        $content = Content::find($id);

        if (!$content) {
            return redirect()->route('home')->with('error', 'Content not found.');
        }

        // Hapus gambar terkait jika ada
        if ($content->image) {
            Storage::delete($content->image);
        }

        $content->delete();

        return redirect()->route('blog')->with('success', 'Content deleted successfully!');
    }

    public function filteredContent(Request $request)
    {
          // Ambil nilai query dari input pencarian
          $query = $request->input('query');

          // Ambil nilai tipe dari input dropdown
          $type = $request->input('type');
          $favorites = Favorite::where('user_id', auth()->id())->pluck('content_id');
  
          // Query untuk mengambil konten pengguna berdasarkan filter yang diberikan
          $userContents = Content::query()
              ->when($type && $type !== 'All', function ($queryBuilder) use ($type) {
                  // Filter konten berdasarkan tipe, kecuali jika tipe "All" dipilih
                  return $queryBuilder->where('type', $type);
              })
              ->when($query, function ($queryBuilder) use ($query) {
                  // Filter konten berdasarkan nama pengguna atau konten jika ada query pencarian
                  return $queryBuilder->whereHas('user', function ($userQuery) use ($query) {
                      $userQuery->where('nama', 'like', "%{$query}%");
                  })->orWhere('content', 'like', "%{$query}%");
              })
              ->with('user')
              ->paginate(10);
  
          // Handle no results message
          $noResultsMessage = '';
          if ($userContents->isEmpty()) {
              if ($type && $type !== 'All') {
                  $noResultsMessage = "Tidak ada hasil yang ditemukan untuk tipe \"$type\".";
              } elseif ($query) {
                  $noResultsMessage = "Tidak ada hasil yang ditemukan untuk \"$query\".";
              } else {
                  $noResultsMessage = "Tidak ada hasil yang ditemukan.";
              }
          }
  
          return view('home.blog', [
              "title" => "Home",
              "userContents" => $userContents,
              "query" => $query,
              "type" => $type,
              'favorites' => $favorites,
              "noResultsMessage" => $noResultsMessage,
          ]);
      }

    public function showContent($id)
    {
        // Fetch content along with user and favorites count
        $content = Content::with(['user'])->withCount('favorites')->find($id);
    
        if (!$content) {
            return redirect()->route('home')->with('error', 'Content not found.');
        }
    
        return view('home.content-detail', [
            "title" => "Rincian",
            'content' => $content,
            // The count of favorites is now available as favorites_count
        ]);
    }    
}
