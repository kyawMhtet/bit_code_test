<?php

namespace App\Http\Controllers;

use App\Models\Tbl_book;
use App\Models\Publisher;
use Illuminate\Support\Str;
use App\Models\ContentOwner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function booksApi()
    {
        $books = Tbl_book::with('contentOwner', 'publisher')->get();

        if ($books->isEmpty()) {
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
        return response()->json($books);
    }


    public function index()
    {
        //

        // $books = Tbl_book::leftJoin('content_owners', 'tbl_books.co_id', '=', 'content_owners.idx')
        //     ->leftJoin('publishers', 'tbl_books.publisher_id', '=', 'publishers.idx')
        //     ->select('tbl_books.*', 'content_owners.name as content_owner_name', 'publishers.name as publisher_name')
        //     ->get();
        $books = Tbl_book::with('contentOwner', 'publisher')->get();
        // dd($books);
        return view('book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $content_owners = ContentOwner::all();
        $publishers = Publisher::all();
        return view('book.create', compact('content_owners', 'publishers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // return $request->all();

        $file = $request->file('cover_photo');
        $fileName = uniqid() . $file->getClientOriginalName();
        $file->storeAs('public', $fileName);


        Tbl_book::create([
            'book_uniq_idx' => uniqid() . Str::slug($request->name),
            'bookname' => $request->name,
            'co_id' => $request->co_id,
            'publisher_id' => $request->publisher_id,
            'cover_photo' => $fileName,
            'created_timetick' => DB::raw('current_timestamp')
        ]);

        return redirect()->route('book.index')->with('success', 'Book stored!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $content_owners = ContentOwner::all();
        $publishers = Publisher::all();

        $book = Tbl_book::where('idx', $id)->first();
        // return $book;
        return view('book.edit', compact('content_owners', 'publishers', 'book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        // return $id;

        $book = Tbl_book::where('idx', $id)->first();
        // return $book;
        if (!$book) {
            return redirect()->back()->with('error', 'Book Not Found');
        }

        $file = $request->file('cover_photo');
        if ($file) {
            $fileName = uniqid() . $file->getClientOriginalName();
            $file->storeAs('public', $fileName);
            Storage::delete('public/' . $book->cover_photo);
        } else {
            $fileName = $book->cover_photo;
        }

        $book->update([
            'book_uniq_idx' => uniqid() . Str::slug($request->name),
            'bookname' => $request->name,
            'co_id' => $request->co_id,
            'publisher_id' => $request->publisher_id,
            'cover_photo' => $fileName,
            'created_timetick' => DB::raw('current_timestamp')
        ]);

        return redirect()->route('book.index')->with('success', 'Book Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $book = Tbl_book::where('idx', $id)->first();

        if (!$book) {
            return redirect()->back()->with('error', 'Book Not Found');
        }

        $book->delete();
        return redirect()->back()->with('success', 'Book Deleted');
    }




    // validation check
    private function validation($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required',
            ''
        ], [
            'name.required' => 'Name required.',

        ]);
    }
}
