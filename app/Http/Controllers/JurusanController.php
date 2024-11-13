<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Jurusan::paginate(5);
        $kodeJurusan = Jurusan::createCode();
        $fakultas = Fakultas::all();
        // return response()->json($data);
        return view('page.jurusan.index', compact('kodeJurusan'))->with([
            'jurusan' => $data,
            'fakultas' => $fakultas,
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
            'kode_jurusan' => $request->input('kode_jurusan'),
            'jurusan' => $request->input('jurusan'),
            'kode_fakultas' => $request->input('kode_fakultas')
        ];

        Jurusan::create($data);
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Tersimpan'
        // ], 200);
        return back()->with('message_add', 'Data Ditambahkan');
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
            'kode_jurusan' => $request->input('kode_jurusan'),
            'jurusan' => $request->input('jurusan'),
            'kode_fakultas' => $request->input('kode_fakultas_edit')
        ];

        $datas = Jurusan::findOrFail($id);
        $datas->update($data);
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Tersimpan'
        // ], 200);
        return back()->with('message_update', 'Data Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Jurusan::findOrFail($id);
        $data->delete();
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terhapus'
        // ], 200);
        return back()->with('message_delete', 'Data Dihapus');
    }
}
