<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Post;
use App\Models\UserReading;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $genres = Genre::all();
        return view('feed', compact('posts', 'genres'));
    }
    public function storeStatus(Request $request)
    {
        $validated = $request->validate([
            'book_title' => 'required|string|max:255',
            'genre' => 'nullable|string|max:255',
            'custom_genre' => 'nullable|string|max:255',
            'status' => 'required|in:lendo,pausado,terminado',
        ]);

        $genre = $validated['genre'] === 'outro'
            ? $validated['custom_genre']
            : $validated['genre'];

        UserReading::create([
            'user_id' => Auth::id(),
            'book_title' => $validated['book_title'],
            'genre' => $genre,
            'status' => $validated['status'],
        ]);

        return redirect()->route('feed');
    }
    public function updateStatus(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:lendo,pausado,concluido',
        ]);

        $user = Auth::user();
        $reading = $user->userReadings()->findOrFail($id);
        $reading->update(['status' => $validated['status']]);

        return redirect()->route('feed');
    }
}
