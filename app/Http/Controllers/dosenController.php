<?php

namespace App\Http\Controllers;

use App\Models\dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class dosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $katakunci = $request->katakunci;
        $jumlahbaris = 4;
        if (strlen($katakunci)) {
            $data = dosen::where('nip', 'like', "%$katakunci%")
                ->orWhere('nama', 'like', "%$katakunci%")
                ->orWhere('matkul', 'like', "%$katakunci%")
                ->paginate($jumlahbaris);
        } else {
            $data = dosen::orderBy('nip', 'desc')->paginate($jumlahbaris);
        }
        return view('dosen.index')->with('data', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dosen.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Session::flash('nip', $request->nip);
        Session::flash('nama', $request->nama);
        Session::flash('matkul', $request->matkul);
        Session::flash('alamat', $request->alamat);
        Session::flash('foto', $request->foto);

        $request->validate([
            'nip' => 'required|numeric|unique:dosen,nip',
            'nama' => 'required',
            'matkul' => 'required',
            'alamat'=>'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ], [
            'nip.required' => 'NIM wajib diisi',
            'nip.numeric' => 'NIM wajib dalam angka',
            'nip.unique' => 'NIM yang diisikan sudah ada dalam database',
            'nama.required' => 'Nama wajib diisi',
            'matkul.required' => 'matkul wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'foto.required' => 'Foto wajib diisi'

        ]);
             //upload image
            $foto = $request->file('foto');
            $foto->storeAs('public/dosen', $foto->hashName());
             $data = [
            'nip' => $request->nip,
            'nama' => $request->nama,
            'matkul' => $request->matkul,
            'alamat' => $request->alamat,
            'foto'     => $foto->hashName(),

        ];
        dosen::create($data);
        return redirect()->to('dosen')->with('success', 'Berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = dosen::where('nip', $id)->first();
        return view('dosen.edit')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $request->validate([
            'nama' => 'required',
            'matkul' => 'required',
            'alamat'=>'required',
            'foto'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            
        ], [
            'nip.required' => 'NIM wajib diisi',
            'nip.numeric' => 'NIM wajib dalam angka',
            'nip.unique' => 'NIM yang diisikan sudah ada dalam database',
            'nama.required' => 'Nama wajib diisi',
            'matkul.required' => 'matkul wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'foto.required' => 'Foto wajib diisi'

        ]);
            $foto = $request->file('foto');
            $foto->storeAs('public/dosen', $foto->hashName());
             $data = [
            'nama' => $request->nama,
            'matkul' => $request->matkul,
            'alamat' => $request->alamat,
            'foto'     => $foto->hashName(),

        ];
        dosen::where('nip', $id)->update($data);
        return redirect()->to('dosen')->with('success', 'Berhasil melakukan update data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dosen::where('nip', $id)->delete();
        return redirect()->to('dosen')->with('success', 'Berhasil melakukan delete data');
    }
}
