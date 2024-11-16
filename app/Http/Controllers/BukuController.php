<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use App\Models\Fakultas;
use App\Models\Genre;
use App\Models\Penerbit;
use App\Models\Sumber;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Buku::paginate(5);
        $kodeBuku = Buku::createCode();
        $penerbit = Penerbit::all();
        $genre = Genre::all();
        $fakultas = Fakultas::all();
        $sumber = Sumber::all();
        // return response()->json($data);
        return view('page.buku.index', compact('kodeBuku'))->with([
            'buku' => $data,
            'penerbit' => $penerbit,
            'genre' => $genre,
            'fakultas' => $fakultas,
            'sumber' => $sumber,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = Buku::paginate(5);
        $kodeBuku = Buku::createCode();
        $penerbit = Penerbit::all();
        $genre = Genre::all();
        $fakultas = Fakultas::all();
        $sumber = Sumber::all();
        // return response()->json($data);
        return view('page.buku.create', compact('kodeBuku'))->with([
            'buku' => $data,
            'penerbit' => $penerbit,
            'genre' => $genre,
            'fakultas' => $fakultas,
            'sumber' => $sumber,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $ebook = $request->input('judul');
            $kode = date('YmdHis');

            if ($request->hasFile('ebook') || $request->hasFile('cover')) {
                // dd('berhasil');
                $ebookFile = $request->file('ebook');
                $ebookFileName = $kode . '-' . $ebook . '.' . $ebookFile->extension();
                $ebookFilePath = $ebookFile->move(public_path('ebook'), $ebookFileName);
                $ebookFilePath = $ebookFileName;

                $coverFile = $request->file('cover');
                $coverFileName = $kode . '-' . $ebook . '.' . $coverFile->extension();
                $coverFilePath = $coverFile->move(public_path('cover'), $coverFileName);
                $coverFilePath = $coverFileName;
            } else {
                // dd('ga berhasl');
                return redirect()->back()->with('error', 'E-Book tidak ditemukan');
            }
            $data = [
                'kode_buku' => $request->input('kode_buku'),
                'pengarang' => $request->input('pengarang'),
                'judul' => $request->input('judul'),
                'kode_penerbit' => $request->input('kode_penerbit'),
                'kode_genre' => $request->input('kode_genre'),
                'tahun_terbit' => $request->input('tahun_terbit'),
                'sinopsis' => $request->input('sinopsis'),
                'halaman' => $request->input('halaman'),
                'ebook' => $ebookFilePath,
                'kode_fakultas' => $request->input('kode_fakultas'),
                'status' => $request->input('status'),
                'kode_sumber' => $request->input('kode_sumber'),
                'cover' => $coverFilePath,
            ];
            // dd($data);

            Buku::create($data);
            // return response([
            //     'status' => 'Success',
            //     'message' => 'Data Tersimpan'
            // ], 200);
            return redirect()
                ->route('buku.index')
                ->with('message', 'Data ditambahkan');
        } catch (\Exception $e) {
            // dd('ini lah');
            return redirect()->back()->with('error', 'Error: ' . $e->getMessage());
        }
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
        $data = Buku::where('id', $id)->first();
        $penerbit = Penerbit::all();
        $genre = Genre::all();
        $fakultas = Fakultas::all();
        $sumber = Sumber::all();
        return view('page.buku.update')->with([
            'buku' => $data,
            'penerbit' => $penerbit,
            'genre' => $genre,
            'fakultas' => $fakultas,
            'sumber' => $sumber,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Cari record Buku berdasarkan id
        $buku = Buku::find($id);

        if (!$buku) {
            return redirect()->back()->with('error', 'Data tidak ditemukan.');
        }

        // Validasi input
        $request->validate([
            'pengarang' => 'required|string|max:255',
            'judul' => 'required|string|max:255',
            'kode_penerbit' => 'required|string|max:50',
            'kode_genre' => 'required|string|max:50',
            'tahun_terbit' => 'required|integer',
            'sinopsis' => 'nullable|string',
            'halaman' => 'required|integer',
            'kode_fakultas' => 'required|string|max:50',
            'status' => 'required|string|max:50',
            'kode_sumber' => 'required|string|max:50',
            'ebook' => 'nullable|file|mimes:pdf|max:2048',
            'cover' => 'nullable|file|mimes:jpeg,jpg,png|max:2048',
        ]);

        // Simpan data dari request
        $buku->pengarang = $request->input('pengarang');
        $buku->judul = $request->input('judul');
        $buku->kode_penerbit = $request->input('kode_penerbit');
        $buku->kode_genre = $request->input('kode_genre');
        $buku->tahun_terbit = $request->input('tahun_terbit');
        $buku->sinopsis = $request->input('sinopsis');
        $buku->halaman = $request->input('halaman');
        $buku->kode_fakultas = $request->input('kode_fakultas');
        $buku->status = $request->input('status');
        $buku->kode_sumber = $request->input('kode_sumber');

        // Simpan nama file lama untuk referensi
        $oldEbook = $buku->ebook;
        $oldCover = $buku->cover;

        // Generate nama unik untuk file baru
        $timestamp = date('YmdHis');
        $judulFormatted = preg_replace('/\s+/', '_', $buku->judul);

        // Penanganan file ebook
        if ($request->hasFile('ebook')) {
            // Hapus file lama jika ada
            if ($oldEbook && file_exists(public_path('ebook/' . $oldEbook))) {
                unlink(public_path('ebook/' . $oldEbook));
            }

            $file = $request->file('ebook');
            $filename = "{$timestamp}-{$judulFormatted}.{$file->getClientOriginalExtension()}";
            $file->move(public_path('ebook'), $filename);

            $buku->ebook = $filename;
        }

        // Penanganan file cover
        if ($request->hasFile('cover')) {
            // Hapus file lama jika ada
            if ($oldCover && file_exists(public_path('cover/' . $oldCover))) {
                unlink(public_path('cover/' . $oldCover));
            }

            $fileCover = $request->file('cover');
            $filenameCover = "{$timestamp}-{$judulFormatted}.{$fileCover->getClientOriginalExtension()}";
            $fileCover->move(public_path('cover'), $filenameCover);

            $buku->cover = $filenameCover;
        }

        // Simpan perubahan ke database
        $buku->save();

        // Redirect dengan pesan sukses
        return redirect()
            ->route('buku.index')
            ->with('message', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Buku::findOrFail($id);
        if ($data->ebook && file_exists(public_path('ebook/' . $data->ebook))) {
            unlink(public_path('ebook/' . $data->ebook));
        }
        $data->delete();
        // return response([
        //     'status' => 'Success',
        //     'message' => 'Data Terhapus'
        // ], 200);
        return back()->with('message_delete', 'Data Dihapus');
    }

    public function getBuku($id)
    {
        $buku = Buku::where('id', $id)->first();

        return response()->json(['buku' => $buku]);
    }
}
