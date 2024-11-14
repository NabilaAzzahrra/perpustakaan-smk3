<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('page.laporan.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $status = $request->input('status');
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');
        if ($status == "PINJAM") {
            $peminjaman = Peminjaman::where('status', $status)
                ->whereBetween('tgl_peminjaman', [$dari, $sampai])
                ->paginate(5);
        } else {
            $peminjaman = Peminjaman::where('status', $status)
                ->whereBetween('tgl_pengembalian', [$dari, $sampai])
                ->paginate(5);
        }
        return view('page.laporan.show')->with([
            'peminjaman' => $peminjaman
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $status = $request->input('status');
        $dari = $request->input('dari');
        $sampai = $request->input('sampai');
        if ($status == "PINJAM") {
            $peminjaman = Peminjaman::where('status', $status)
                ->whereBetween('tgl_peminjaman', [$dari, $sampai])
                ->paginate(5);
        } else {
            $peminjaman = Peminjaman::where('status', $status)
                ->whereBetween('tgl_pengembalian', [$dari, $sampai])
                ->paginate(5);
        }
        return view('page.laporan.print')->with([
            'peminjaman' => $peminjaman
        ]);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function print(Request $request)
    {
        // dd('iniii');
    }
}
