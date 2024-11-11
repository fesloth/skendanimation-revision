<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showLapor()
    {
        // Menghitung jumlah laporan
        $reportCount = Report::count();

        return view('admin.laporan', [
            'title' => 'Laporan',
            'reports' => Report::all(),
            'reportCount' => $reportCount, // Mengirim jumlah laporan ke view
        ]);
    }

    public function create($contentId)
    {
        $content = Content::findOrFail($contentId);
        return view('home.report.report', [
            'title' => 'Laporkan',
            'content' => $content
        ]);
    }

    public function store(Request $request, $contentId)
    {
        $request->validate([
            'reason' => 'required|in:NSFW,Penghinaan,Konten Sensitif,Plagiarisme,Others',
            'description' => 'nullable|string|max:500',
        ]);

        Report::create([
            'content_id' => $contentId,
            'user_id' => auth()->id(),
            'reason' => $request->reason,
            'description' => $request->description,
        ]);

        return redirect()->route('content.show', $contentId)->with('success', 'Laporan berhasil dikirim.');
    }
}
