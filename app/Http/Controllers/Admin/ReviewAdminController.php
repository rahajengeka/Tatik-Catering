<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;

class ReviewAdminController extends Controller
{
    public function index()
    {
        $reviews = Review::latest()->paginate(5);
        return view('admin.review', compact('reviews'));
    }

    // tombol tampilkan / sembunyikan
    public function toggle(Review $review)
    {
        $review->update([
            'is_visible' => !$review->is_visible
        ]);

        return back()->with(
            'success',
            'Status review berhasil diperbarui.'
        );
    }

    // hapus permanen
    public function destroy(Review $review)
    {
        $review->delete();

        return back()->with(
            'success',
            'Review berhasil dihapus.'
        );
    }
}
