<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class BookController extends Controller
{
    public function index(){
        $books = DB::table('books')->get();// panigate
        return view('admin.book.index', compact('books'));
    }
   

    public function destroy($id){
        $book = DB::table('books')->where('id', $id)->first();
        DB::table('books')->where('id', $id)->delete();
        return redirect()->route('books.index')->with('success', 'Sách đã được xóa thành công!');   
    }
    public function destroyAll()
    {
        DB::table('books')->delete();

        return redirect()->route('books.index')->with('success', 'Tất cả sách đã được xóa thành công!');
    }
    public function create()
    {
        $categories = DB::table('categories')->get();
        return view('admin.book.add', compact('categories'));
    }
    public function store(Request $request)
    {
        // Validate incoming request
        // $request->validate([
        //     'title' => 'required|string',
        //     'author' => 'required|string',
        //     'publisher' => 'required|string',
        //     'publication' => 'required|integer',
        //     'price' => 'required|numeric',
        //     'quantity' => 'required|integer',
        //     'category_id' => 'required|integer',
        // ]);

        // Insert into database using Query Builder
        DB::table('books')->insert([
            'title' => $request->title,
            'thumbnail' => $request->thumbnail,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'publication' => $request->publication,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        return redirect()->route('books.index')
                        ->with('success', 'Sách đã được thêm thành công.');
    }
    public function edit($id)
    {
        $book = DB::table('books')->where('id', $id)->first();
        return view('admin.book.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        DB::table('books')->where('id', $id)->update([
            'title' => $request->input('title'),
            'thumbnail' => $request->input('thumbnail'),
            'author' => $request->input('author'),
            'publisher' => $request->input('publisher'),
            'publication' => $request->input('publication'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
        ]);

        return redirect()->route('books.index')->with('success', 'Book updated successfully');
    }

}
