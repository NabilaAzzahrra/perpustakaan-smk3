<?php

namespace App\Http\Controllers;

use App\Models\Sumber;
use Illuminate\Http\Request;

class SumberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Sumber::paginate(5);
        $kodeSumber = Sumber::createCode();
        // return response()->json($data);
        return view('page.sumber.index', compact('kodeSumber'))->with([
            'sumber'=>$data,
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
            'kode_sumber' => $request->input('kode_sumber'),
            'sumber' => $request->input('sumber')
        ];

        Sumber::create($data);
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
            'kode_sumber' => $request->input('kode_sumber'),
            'sumber' => $request->input('sumber')
        ];

        $datas = Sumber::findOrFail($id);
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
        $data = Sumber::findOrFail($id);
        $data->delete();
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terhapus'
        // ], 200);
        return back()->with('message_delete','Data Dihapus');
    }
}
