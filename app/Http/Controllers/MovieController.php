<?php
// app/Http/Controllers/MovieController.php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        // Tìm kiếm phim với tên gần đúng
        $movies = Movie::with('genre')
            ->where('title', 'LIKE', "%{$search}%")
            ->paginate(10);
    
        return view('movies.index', compact('movies', 'search'));
    }
    public function create()
    {
        $genres = Genre::all();
        return view('movies.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'poster' => 'nullable|url|max:255',
            'intro' => 'required|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
        ]);

        Movie::create($request->all());
        return redirect()->route('movies.index')->with('success', 'thêm Phim mới thành công');
    }

    public function show($id)
    {
        $movie = Movie::with('genre')->findOrFail($id);
        return view('movies.show', compact('movie'));
    }

    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        $genres = Genre::all();
        return view('movies.edit', compact('movie', 'genres'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:255',
            'poster' => 'nullable|url|max:255',
            'intro' => 'required|max:255',
            'release_date' => 'required|date',
            'genre_id' => 'required|exists:genres,id',
        ]);
        /*
        $movie->title = $request->input('title');
        $movie->intro = $request->input('intro');
        $movie->release_date = $request->input('release_date');
        $movie->genre_id = $request->input('genre_id');

        // Xử lý ảnh
        if ($request->hasFile('poster')) {
            // Xóa ảnh cũ nếu có
            if ($movie->poster) {
                Storage::disk('public')->delete($movie->poster);
            }

            // Tải lên ảnh mới
            $image = $request->file('poster');
            $imagePath = $image->store('movies', 'public');
            $movie->poster = $imagePath;
        }

        $movie->save();
        */
        $movie = Movie::findOrFail($id);
        $movie->update($request->all());
        return redirect()->route('movies.index')->with('success', 'Sửa thông tin Phim thành công');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Xóa Phim thành công');
    }
}
