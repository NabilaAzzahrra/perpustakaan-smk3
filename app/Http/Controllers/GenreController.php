<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Genre::paginate(5);
        $kodeGenre = Genre::createCode();
        // return response()->json($data);
        return view('page.genre.index', compact('kodeGenre'))->with([
            'genre'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'kode_genre' => $request->input('kode_genre'),
            'genre' => $request->input('genre')
        ];

        Genre::create($data);
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Tersimpan'
        // ], 200);
        return back()->with('message_add','Data Ditambahkan');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'kode_genre' => $request->input('kode_genre'),
            'genre' => $request->input('genre')
        ];

        $datas = Genre::findOrFail($id);
        $datas->update($data);
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Tersimpan'
        // ], 200);
        return back()->with('message_update','Data Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Genre::findOrFail($id);
        $data->delete();
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terhapus'
        // ], 200);
        return back()->with('message_delete','Data Dihapus');
    }
}
