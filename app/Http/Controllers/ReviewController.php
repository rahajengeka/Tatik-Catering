<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class ReviewController extends Controller
{
    public function kirim(Request $request)
    {
        // Anti spam: 3x submit / 1 menit / IP
        $key = 'review_'.$request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);

            return back()->with(
                'error',
                "Terlalu cepat mengirim ulasan. Coba lagi dalam {$seconds} detik."
            );
        }

        $request->validate([
            'nama'   => 'required|string|max:100',
            'rating' => 'required|integer|between:1,5',
            'pesan'  => 'required|string|max:1000',
        ]);

        Review::create([
            'nama_pelanggan' => $request->nama,
            'bintang'        => $request->rating,
            'komentar'       => $request->pesan,
            'is_visible'     => false, // ❗ default hidden
        ]);

        RateLimiter::hit($key, 60);

        return back()->with(
            'success',
            'Terima kasih! Review kamu akan tampil setelah disetujui admin.'
        );
    }
}
