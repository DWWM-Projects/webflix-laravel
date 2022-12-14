<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Models\Category;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        // Verif de dev back parano
        abort_if(! in_array(request('order_by', 'title'), ['title', 'released_at']), 404);

        request()->validate([
            'order_by' => 'in:title,released_at',
        ]);
        

        return view('movies.index', [
            'movies' => Movie::with('category')
                ->when(request('filter.categories'), function ($query) {
                    $query->whereIn('category_id', request('filter.categories'));
                })
                ->orderBy(request('order_by', 'title'))
                ->paginate(9)->withQueryString(),
            'categories' => Category::all(),
        ]);
    }

    public function create()
    {
        return view('movies.create', [
            'categories' => Category::all(),
            'actors' => Actor::all(),
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
            'actor_ids' => 'nullable|exists:actors,id'
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('cover');
        }

        $validated['user_id'] = $request->user()->id;

        // $movie = new Movie();
        // $movie->title = $request->title;
        // $movie->synopsis = $request->synopsis;
        // $movie->duration = $request->duration;
        // $movie->youtube = $request->youtube;
        // $movie->released_at = $request->released_at;
        // $movie->category_id = $request->category_id;
        // $movie->save();

        // On doit inclure le champs actor_ids du tableau $validated
        // $movie = Movie::create(collect($validated)->except('actor_ids')->all());
        $movie = $request->user()->movies()->create(collect($validated)->except('actor_ids')->all());
        $movie->actors()->attach($validated['actor_ids']);

        return redirect()->route('movies');
    }

    public function edit(Movie $movie)
    {
        return view('movies.edit', [
            'movie' => $movie,
            'categories' => Category::all(),
            'actors' => Actor::all(),
        ]);
    }

    public function update(Movie $movie, Request $request)
    {
        $this->authorize('update', $movie);
        // if ($movie->user_id === request()->user()->id) {
        //     abort(403);
        // }

        $movieName = $movie->title;

        $validated = $request->validate([
            'title' => 'required|min:2',
            'synopsis' => 'required|min:10',
            'duration' => 'required|integer|min:0',
            'youtube' => 'nullable',
            'released_at' => 'nullable|date',
            'cover' => 'nullable|image|max:2048',
            'category_id' => 'nullable|exists:categories,id',
            'actor_ids' => 'nullable|exists:actors,id'
        ]);

        if ($request->hasFile('cover')) {
            $validated['cover'] = '/storage/'.$request->file('cover')->store('cover');
        }

        $movie->update(collect($validated)->except('actor_ids')->all());
        // S'assurer qu'on ?? pas de doublons avec le sync()
        $movie->actors()->sync($validated['actor_ids']);

        return redirect()->route('movies')->with('status', 'Le film '.$movieName.' a ??t?? modifi?? en '.$movie->title);
    }

    public function show(Movie $movie)
    {
        return view('movies.show', [
            // 'movie' => Movie::findOrFail($id),
            'movie' => $movie,
        ]);
    }

    public function destroy(Movie $movie)
    {
        $this->authorize('delete', $movie);

        $movie->delete();

        return redirect()->route('movies')->with('status', 'Le film '.$movie->title.' a ??t?? supprim??.');
    }
}
