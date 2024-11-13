<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\DetailPeminjaman;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Peminjaman::with(['detail', 'detail.buku'])->paginate('5');
        // $peminjaman = Peminjaman::with(['detail','detail.buku'])->get();
        // $dataDetail = DetailPeminjaman::all();
        // return response()->json([$peminjaman]);
        return view('page.peminjaman.index')->with([
            'peminjaman' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $buku = Buku::all();
        return view('page.peminjaman.create')->with([
            'user' => $user,
            'buku' => $buku,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $kodePeminjaman = date('YmdHis');
        $buku = $request->input('id_buku', []);
        $tgl_pengembalian = $request->input('tgl_pengembalian');
        foreach ($buku as $index => $b) {
            $dataa = [
                'kode_peminjaman' => $kodePeminjaman,
                'id_buku' => $b,
                'status' => "PINJAM",
                'denda' => 0,
                'tgl_pengembalian' => $tgl_pengembalian,
                'created_at' => now(),
                'updated_at' => now(),
            ];
            DetailPeminjaman::create($dataa);

            $datasBuku = Buku::where('id', $b)->first();
            $dataBuku = [
                'status' => 'PINJAM',
            ];
            $datasBuku->update($dataBuku);
        }
        $data = [
            'kode_peminjaman' => $kodePeminjaman,
            'id_user' => $request->input('id_user'),
            'jumlah_buku' => count($buku),
            'tgl_peminjaman' => $request->input('tgl_peminjaman'),
            'tgl_pengembalian' => $request->input('tgl_pengembalian'),
            'status' => 'PINJAM',
        ];

        Peminjaman::create($data);
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Tersimpan'
        // ], 200);
        return redirect()
            ->route('peminjaman.index')
            ->with('message', 'Data ditambahkan');
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
        $user = User::all();
        $buku = Buku::all();
        $peminjaman = Peminjaman::with(['detail', 'detail.buku'])->where('id', $id)->first();
        // dd($peminjaman);
        $kode_peminjaman = $peminjaman->kode_peminjaman;
        $detail = DetailPeminjaman::with(['buku'])->where('kode_peminjaman', $kode_peminjaman)->where('status', 'PINJAM')->get();
        // dd($detail);
        return view('page.peminjaman.update')->with([
            'user' => $user,
            'buku' => $buku,
            'peminjaman' => $peminjaman,
            'detail' => $detail,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dataEdit = Peminjaman::where('id', $id)->first();
        $jumlah = $dataEdit->jumlah_buku;
        $tgl_peminjaman = $dataEdit->tgl_peminjaman;
        $kodeEditPeminjaman = $dataEdit->kode_peminjaman;

        $kodePeminjaman = $request->input('kode_peminjaman');
        $tgl_peminjaman_edit = $request->input('tgl_peminjaman');
        $tgl_pengembalian = $request->input('tgl_pengembalian');
        if ($tgl_peminjaman == $tgl_peminjaman_edit) {
            $buku = $request->input('id_buku', []);
            foreach ($buku as $index => $b) {
                $dataa = [
                    'kode_peminjaman' => $kodePeminjaman,
                    'id_buku' => $b,
                    'status' => "PINJAM",
                    'denda' => 0,
                    'tgl_pengembalian' => $tgl_pengembalian,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
                DetailPeminjaman::create($dataa);

                $datasBuku = Buku::where('id', $b)->first();
                $dataBuku = [
                    'status' => 'PINJAM',
                ];
                $datasBuku->update($dataBuku);
            }
            $data = [
                'jumlah_buku' => $jumlah + count($buku),
                'tgl_peminjaman' => $request->input('tgl_peminjaman'),
                'tgl_pengembalian' => $request->input('tgl_pengembalian'),
            ];
        } else {
            $data = [
                'tgl_peminjaman' => $request->input('tgl_peminjaman'),
                'tgl_pengembalian' => $request->input('tgl_pengembalian'),
            ];

            $dataa = [
                'tgl_pengembalian' => $request->input('tgl_pengembalian'),
            ];

            $kodeEditPeminjaman = $request->input('kode_peminjaman');

            DetailPeminjaman::where('kode_peminjaman', $kodeEditPeminjaman)
                ->update($dataa);
        }
        $datas = Peminjaman::findOrFail($id);
        $datas->update($data);
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terupdate'
        // ], 200);
        return redirect()
            ->route('peminjaman.index')
            ->with('message', 'Data diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Find the main `Peminjaman` record
        $dataPeminjaman = Peminjaman::findOrFail($id);
        $kodePeminjaman = $dataPeminjaman->kode_peminjaman;

        // Find all `DetailPeminjaman` records that match the `kode_peminjaman`
        $dataDetailDelete = DetailPeminjaman::where('kode_peminjaman', $kodePeminjaman)->get();

        // Update the `status` of each `Buku` related to the `DetailPeminjaman` records
        foreach ($dataDetailDelete as $d) {
            Buku::where('id', $d->id_buku)->update(['status' => 'ADA']);
        }

        // Delete all `DetailPeminjaman` records that match the `kode_peminjaman`
        DetailPeminjaman::where('kode_peminjaman', $kodePeminjaman)->delete();

        // Finally, delete the main `Peminjaman` record
        $dataPeminjaman->delete();

        return back()->with('message_delete', 'Data Dihapus');
    }


    public function detailDelete(string $id)
    {
        $dataDetail = DetailPeminjaman::where('id', $id)->first();
        $kode_peminjaman = $dataDetail->kode_peminjaman;
        $id_buku = $dataDetail->id_buku;

        $datas = Peminjaman::where('kode_peminjaman', $kode_peminjaman)->first();
        $jumlah = $datas->jumlah_buku;

        $dataJumlah = [
            'jumlah_buku' => $jumlah - 1,
        ];
        $datas->update($dataJumlah);

        $datasBuku = Buku::where('id', $id_buku)->first();
        $dataBuku = [
            'status' => 'ADA',
        ];
        $datasBuku->update($dataBuku);

        $data = DetailPeminjaman::findOrFail($id);
        $data->delete();

        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terhapus'
        // ], 200);
        return back()->with('message_delete', 'Data Dihapus');
    }
}