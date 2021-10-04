<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tmkategori;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

class TmkategoriController extends Controller
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }
    function index(Tmkategori $tmkategori)
    {
        $data = Tmkategori::get();
        return response()->json($data);
    }

    function create(Tmkategori $tmkategori)
    {
        $this->validate($this->request, [   
            'kode' => 'required|unique:tmkategori,kode',
            'nama' => 'required'
        ]);

        try {
            //code...
            $f = new Tmkategori;
            $f->kode = $this->request->kode;
            $f->nama = $this->request->nama;
            // $f->date_created = Carbon::now()->format('Y-m-d');
            $f->user_id = 1;

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


    function show(Tmkategori $tmkategori, $id)
    {
        $data = Tmkategori::find($id);
        return response()->json($data);
    }

    function update(Tmkategori $tmkategori, $id)
    {
    }

    function delete(Tmkategori $tmkategori, $id)
    {
    }
}
