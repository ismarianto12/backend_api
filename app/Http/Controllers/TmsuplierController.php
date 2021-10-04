<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Tmsuplier;
use Illuminate\Http\Request;

class TmsuplierController extends Controller
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index(Tmsuplier $tmsuplier)
    {
        $data = $tmsuplier::get();
        return response()->json($data);
    }
    public function store(Tmsuplier $tmsuplier)
    {
        try {
            //code...
            $this->validate($this->request, [
                'kode' => 'required',
                'nama' => 'required',
                'alamat' => 'required',
                'npwp' => 'required',
                'status_aktif' => 'required'
            ]);
            $r = new Tmsuplier;
            $r->kode = $this->request->kode;
            $r->nama = $this->request->nama;
            $r->alamat = $this->request->alamat;
            $r->npwp = $this->request->npwp;
            $r->status_aktif = $this->request->status_aktif;
            $r->save();
            return response()->json([
                'status' => 'ok',
                'msg' => 'data berhasil di tambahkan'
            ]);
        } catch (Tmsuplier $tmsuplier) {
            return response()->json([
                'status' => 'ok',
                'msg' => 'data gagal di tambahkan'
            ]);
        }
    }
    public function update(Tmsuplier $tmsuplier, $id)
    {
        try {
            //code...
            Tmsuplier::where('id', $id)->update([
                'kode' => $this->request->kode,
                'nama' => $this->request->nama,
                'alamat' => $this->request->alamat,
                'npwp' => $this->request->npwp,
                'status_aktif' => $this->request->status_aktif
            ]);
            return response()->json([
                'status' => 'ok',
                'msg' => 'data berhasil di tambahkan'
            ]);
        } catch (\Tmsuplier $tmsuplier) {
            return response()->json([
                'status' => 'ok',
                'msg' => 'data berhasil di tambahkan'
            ]);
        }
    }
    public function show(Tmsuplier $tmsuplier, $id)
    {
        $data = Tmsuplier::where('id', $id)->first();
        return response()->json($data);
    }
    public function delete(Tmsuplier $tmsuplier, $id)
    {
        // dd($id);
        Tmsuplier::where('id', $id)->delete();
        return response()->json([
            'status' => 'ok',
            'msg' => 'data berhasil di hapus'
        ]);
    }
}
