<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        return view('movies.index', [
            'movies' => Movie::with('category')->paginate(9),
        ]);
    }

    public function create()
    {
        return view('movies.create', [
            'categories' => Category::all(),
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:0',
            'youtube' => 'nullable',
            'released_at' => 'nullable|date',
            'cover' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',

        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('cover');
        }

        // $movie = new Movie();
        // $movie->title = $request->title;
        // $movie->synopsis = $request->synopsis;
        // $movie->duration = $request->duration;
        // $movie->youtube = $request->youtube;
        // $movie->released_at = $request->released_at;
        // $movie->category_id = $request->category_id;
        // $movie->save();

        Movie::create($validated);

        return redirect()->route('movies');
    }

    public function show(Movie $movie)
    {
        return view('movies.show', [
            // 'movie' => Movie::findOrFail($id),
            'movie' => $movie,
        ]);
    }
}
