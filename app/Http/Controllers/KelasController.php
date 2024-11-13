<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Kelas::paginate(5);
        $kodeKelas = Kelas::createCode();
        $jurusan = Jurusan::all();
        // return response()->json($data);
        return view('page.kelas.index', compact('kodeKelas'))->with([
            'kelas'=>$data,
            'jurusan'=>$jurusan,
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
            'kode_kelas' => $request->input('kode_kelas'),
            'kelas' => $request->input('kelas'),
            'kode_jurusan' => $request->input('kode_jurusan')
        ];

        Kelas::create($data);
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
            'kode_kelas' => $request->input('kode_kelas'),
            'kelas' => $request->input('kelas'),
            'kode_jurusan' => $request->input('kode_jurusan_edit')
        ];

        $datas = Kelas::findOrFail($id);
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
        $data = Kelas::findOrFail($id);
        $data->delete();
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terhapus'
        // ], 200);
        return back()->with('message_delete','Data Dihapus');
    }
}
