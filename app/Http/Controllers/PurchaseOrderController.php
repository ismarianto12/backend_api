<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
// use  Illuminate\Http\Request;
use App\Heplpers\App_par;
use App\Models\TmpurchaseOrder; 
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public $request;

    public function construct(Request $request)
    {
        $this->request = $request;
    }
    public function index()
    {
        $totalr = TmpurchaseOrder::get();
        $perpage = isset($this->request->perpage) ? $this->request->perpage : 0;
        $start = isset($this->request->start) ? $this->request->start : 0;
        $rdata = TmpurchaseOrder::select('*')
            ->join('tmbarang', 'tmbarang.id', 'tmpurchaseorder.tmbarang_id')
            ->join('tmsuplier', 'tmsuplier.id', 'tmpurchaseorder.tmbarang_id')
            ->get();

        $data = [
            'total' => $totalr,
            'perpage' => $perpage,
            'data' => $rdata,
            'start' => $start
        ];
        return response()->json($data);
    }


    public function store()
    {
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
            $r = new TmpurchaseOrder();
            $r->keterangan = $this->requet->keterangan;
            $r->tmbarang_id = $this->requet->tmbarang_id;
            $r->tmsuplier_id = $this->requet->tmsuplier_id;
            $r->harga = $this->requet->harga;
            $r->user_id = $this->requet->user_id;
            $r->save();
            return response()->json(App_par::rn()->success_message('Data Purcharse Order berashil'));
        } catch (TmpurchaseOrder $th) {
            return response()->json(App_par::rn()->error_message('Data gagl di simpan'));
        }
    }

    public function update($id)
    {
        $this->request->validation([
            'keterangan' => 'required',
            'tmbarang_id' => 'required',
            'tmsuplier_id' => 'required',
            'harga' => 'required',
            'user_id' => 'required'
        ]);
        try {
            $r = new TmpurchaseOrder();
            $r->keterangan = $this->requet->keterangan;
            $r->tmbarang_id = $this->requet->tmbarang_id;
            $r->tmsuplier_id = $this->requet->tmsuplier_id;
            $r->harga = $this->requet->harga;
            $r->user_id = $this->requet->user_id;
            $r->find($id)->save();
            return response()->json(App_par::rn()->success_message('Data Purcharse Order berashil'));
        } catch (TmpurchaseOrder $th) {
            return response()->json(App_par::rn()->error_message('Data gagl di simpan'));
        }
    }

    public function delete($id)
    {
        try {
            $r = new TmpurchaseOrder();
            $r->find($id)->delete();
            return response()->json(App_par::rn()->success_message('Data Purcharse Data Berhasil di hapus. '));
        } catch (TmpurchaseOrder $th) {
            return response()->json(App_par::rn()->error_message('Data gagl di di hapus'));
        }
    }
}
