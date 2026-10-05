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

            if ($request->expectsJson() || $request->ajax()) {
                return response()->json([
                    'status'  => 'error',
                    'message' => "Terlalu cepat mengirim ulasan. Coba lagi dalam {$seconds} detik."
                ], 429);
            }

            return back()->with(
                'error',
                "Terlalu cepat mengirim ulasan. Coba lagi dalam {$seconds} detik."
            );
        }

        $validated = $request->validate([
            'nama'   => 'required|string|max:100',
            'rating' => 'required|integer|between:1,5',
            'pesan'  => 'required|string|max:1000',
        ]);

        Review::create([
            'nama_pelanggan' => $validated['nama'],
            'bintang'        => $validated['rating'],
            'komentar'       => $validated['pesan'],
            'is_visible'     => false, // ❗ default hidden
        ]);

        RateLimiter::hit($key, 60);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'status'  => 'success',
                'message' => 'Terima kasih! Review kamu akan tampil setelah disetujui admin.'
            ]);
        }

        return back()->with(
            'success',
            'Terima kasih! Review kamu akan tampil setelah disetujui admin.'
        );
    }
}
