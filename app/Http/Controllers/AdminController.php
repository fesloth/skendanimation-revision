<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Favorite;
use App\Models\Report;
use App\Models\SearchHistory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function dashboard()
    {
        $users = User::paginate(5);
        $reportCount = Report::count();

        return view('admin.admin', [
            "title" => "Halaman Admin",
            "users" => $users,         // Menambahkan users langsung di array
            "reportCount" => $reportCount // Menambahkan reportCount juga
        ]);
    }

    public function searchUsers(Request $request)
    {
        $query = $request->input('query');

        // Search users by name
        $users = User::where('nama', 'LIKE', "%{$query}%")->get();

        // Prepare the results to include the report status
        $usersWithReports = $users->map(function ($user) {
            $user->has_report = \App\Models\Report::where('user_id', $user->id)->exists();
            return $user;
        });

        return response()->json(['users' => $usersWithReports]);
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.action.update', [
            "title" => "Edit Pengguna"
        ])->with(compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'status' => 'required|in:Admin,Guru,Murid,Lainnya',
        ]);

        $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('dashboard')->with('success', 'User deleted successfully');
        }

        return redirect()->route('dashboard')->with('error', 'User not found');
    }

    public function showReports($id)
    {
        $reports = Report::where('user_id', $id)->with(['content', 'user'])->get();

        return view('admin.action.reports', [
            'title' => 'Hasil Laporan',
            'reports' => $reports,
            'user_id' => $id // kirim ID pengguna ke view jika diperlukan
        ]);
    }

    public function create()
    {
        $reportCount = Report::count();

        return view('admin.create-user', [
            "title" => "Buat Akun",
            "reportCount" => $reportCount
        ]);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nis' => 'nullable|integer',
            'nama' => 'required|string|max:500',
            'email' => 'nullable|email|unique:users,email', // Email boleh kosong
            'password' => 'nullable|string|min:6',         // Password boleh kosong
            'status' => 'required|in:Admin,Guru,Murid,Lainnya',
        ], [
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah digunakan.',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);

        // Membuat user baru
        $user = User::create([
            'nis' => $validated['status'] === 'Murid' ? $validated['nis'] : null,
            'nama' => $validated['nama'],
            'email' => $validated['status'] !== 'Murid' ? $validated['email'] : null,   // Email Murid null
            'password' => $validated['status'] !== 'Murid' ? bcrypt($validated['password']) : null,  // Password Murid null
            'status' => $validated['status'],
        ]);

        // Dapatkan user_id dari id yang baru disimpan
        $user->user_id = $user->id;
        $user->save();

        // Flash pesan sukses dengan user_id
        Session::flash('success', 'User berhasil ditambahkan dengan ID: ' . $user->user_id);

        // Redirect ke halaman create user
        return redirect()->route('create-user');
    }

    public function UsersAnalistik()
    {
        // Menghitung jumlah laporan
        $reportCount = Report::count();

        // Mengambil pengguna yang paling banyak login
        $mostLogins = User::select('id', 'nama')
            ->withCount('logins') // Menghitung jumlah login
            ->orderBy('logins_count', 'desc')
            ->take(10) // Ambil 10 pengguna teratas
            ->get();

        // Mengambil pengguna yang paling aktif berdasarkan aktivitas (misal berdasarkan jumlah postingan)
        $mostActiveUsers = User::select('users.id', 'users.nama')
            ->leftJoin('contents', 'users.id', '=', 'contents.user_id')
            ->selectRaw('COUNT(contents.id) as total_posts')
            ->groupBy('users.id', 'users.nama')
            ->orderBy('total_posts', 'desc')
            ->take(10) // Ambil 10 pengguna teraktif
            ->get();

        // Mengambil pengguna yang paling lama terdaftar
        $oldestUsers = User::orderBy('created_at', 'asc')
            ->take(10) // Ambil 10 pengguna terlama
            ->get();

        // Mengambil pengguna yang paling banyak dilaporkan
        $mostReportedUsers = User::select('users.id', 'users.nama')
            ->leftJoin('reports', 'users.id', '=', 'reports.user_id') // Asumsi ada relasi antara users dan reports
            ->selectRaw('COUNT(reports.id) as total_reports')
            ->groupBy('users.id', 'users.nama')
            ->orderBy('total_reports', 'desc')
            ->take(10) // Ambil 10 pengguna terlapor
            ->get();

        // Mengambil data jumlah postingan per bulan untuk grafik
        $monthlyPosts = Content::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('total');

        return view('admin.analystic.user-analistik', [
            "title" => "Pengguna Analitik",
            "reportCount" => $reportCount,
            "mostLogins" => $mostLogins,
            "mostActiveUsers" => $mostActiveUsers,
            "oldestUsers" => $oldestUsers,
            "mostReportedUsers" => $mostReportedUsers,
            "monthlyPosts" => $monthlyPosts,
        ]);
    }

    public function FavAnalistik()
    {
        // Menghitung jumlah laporan
        $reportCount = Report::count();

        // Menghitung jumlah pengguna
        $totalUsers = User::count();

        // Menghitung jumlah konten (posting)
        $totalPosts = Content::count();

        $totalFavorites = Favorite::count();

        // Menghitung jumlah favorit dari semua konten berdasarkan pengguna
        $mostFavoritedUsers = User::select('users.id', 'users.nama')
            ->leftJoin('contents', 'users.id', '=', 'contents.user_id') // Gunakan leftJoin agar semua pengguna muncul
            ->leftJoin('favorites', 'contents.id', '=', 'favorites.content_id') // Join dengan tabel favorites
            ->selectRaw('COUNT(favorites.id) as total_favorites') // Hitung jumlah favorit berdasarkan id favorit
            ->groupBy('users.id', 'users.nama') // Kelompokkan berdasarkan pengguna
            ->orderBy('total_favorites', 'desc') // Urutkan berdasarkan jumlah favorit terbanyak
            ->take(10) // Ambil 10 pengguna teratas
            ->get();

        // Mengambil postingan dengan jumlah favorit terbanyak
        $mostFavoritedPosts = Content::withCount('favorites') // Menghitung jumlah favorit pada setiap konten
            ->orderBy('favorites_count', 'desc') // Mengurutkan dari yang terbanyak disukai
            ->take(10) // Ambil 10 postingan teratas
            ->get();

        return view('admin.analystic.fav-analistik', [
            "title" => "Favorit Analitik",
            "reportCount" => $reportCount,
            "totalUsers" => $totalUsers, // Tambahkan total pengguna
            "totalPosts" => $totalPosts, // Tambahkan total konten
            "totalFavorites" => $totalFavorites, // Tambahkan total favorit
            "mostFavoritedUsers" => $mostFavoritedUsers, // Mengirim data pengguna dengan favorit terbanyak ke view
            "mostFavoritedPosts" => $mostFavoritedPosts, // Mengirim data postingan dengan favorit terbanyak ke view
        ]);
    }
}
