<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;
use  Illuminate\Http\Request;
use App\Models\Tmbarang;
use Carbon\Carbon;

class TmbarangController extends Controller
{
    protected $request;

    public function __construct(Request $request)
    {

        $this->request = $request;
    }

    function index(Tmbarang $tmbarang)
    {
        $data = $tmbarang::get();
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    function store(Tmbarang $tmbarang)
    {
        // print('ada'.$this->request->nama);
        // die;
        $this->validate($this->request, [
            'kode' => 'required|unique:tmbarang,kode',
            'nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'suplier_id' => 'required',
            'stok' => 'required',
            'user_id' => 'required'
        ]);

        try {
            //code...
            $f = new $tmbarang;
            $f->kode = $this->request->kode;
            $f->nama = $this->request->nama;
            $f->harga_beli = $this->request->harga_beli;
            $f->harga_jual = $this->request->harga_jual;
            $f->kategori_id = $this->request->kategori_id;
            $f->suplier_id = $this->request->suplier_id;
            $f->stok = $this->request->stok;
            $f->date_created = Carbon::now();
            $f->user_id = $this->request->user_id;

            $f->save();

            return response()->json([
                'status' => 'ok',
                'msg' => 'data has been added'
            ]);
        } catch (\Tmbarang $tmbarang) {
            //throw $th;
            return response()->json([
                'status' => 'ok',
                'msg' => 'data fail added'
            ]);
        }
    }

    function update(Tmbarang $tmbarang, $id)
    {
        $this->validate($this->request, [
            'kode' => 'required',
            'nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'suplier_id' => 'required',
            'stok' => 'required',
            'user_id' => 'required',
        ]);

        try {
            //code...

            Tmbarang::where('id', $id)
                ->update([
                    'kode' => $this->request->kode,
                    'nama' => $this->request->nama,
                    'harga_beli' => $this->request->harga_beli,
                    'harga_jual' => $this->request->harga_jual,
                    'kategori_id' => $this->request->kategori_id,
                    'suplier_id' => $this->request->suplier_id,
                    'stok' => $this->request->stok,
                    'date_created' => Carbon::now(),
                    'user_id' => $this->request->user_id,

                ]);
            return response()->json([
                'status' => 'ok',
                'msg' => 'data hasben update'
            ]);
        } catch (Tmbarang $tmbarang) {
            //throw $th;
            return response()->json([
                'status' => 'fail',
                'msg' => 'data fail update'
            ]);
        }
    }

    function delete(Tmbarang $tmbarang)
    {
        $id = $this->request->id;
        $data = $tmbarang::findOrFail($id);
        $data->delete();
        return response()->json([
            'status' => 'ok',
            'msg' => 'data hasbeen deleted'
        ]);
    }
}
