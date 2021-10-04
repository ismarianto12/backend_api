<?php

namespace App\Http\Controllers;

use App\Models\Tmlogin;
use Laravel\Lumen\Routing\Controller as BaseController;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class UserController extends BaseController
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    function index(Tmlogin $tmlogin)
    {
        $data = $tmlogin::get();
        return response()->json([
            'status' => 'ok',
            'responseMsg' => 'berhasil fetch data',
            'data' => $data
        ]);
    }

    function store(Tmlogin $tmlogin)
    {

        $this->validate(
            $this->request,
            [
                'username' => 'required',
                'password' => 'required',
                'nama' => 'required',
                'email' => 'required',

            ]
        );

        try {
            //code...
            $r =  new $tmlogin;
            $r->username =  $this->request->username;
            $r->password =  app('hash')->make($this->request->password);
            $r->nama =  $this->request->nama;
            $r->email =   $this->request->email;
            $r->date_created = Carbon::now();
            $r->save();
            return response()->json([
                'status' => 'ok',
                'msg' => 'data inserted',
            ]);
        } catch (Tmlogin $tmlogin) {
            //throw $th;
            return response()->json([
                'status' => 'fail',
                'msg' => 'data fail inserted',
            ]);
        }
    }

    function update(Tmlogin $tmlogin, $id)
    {
        $this->validate(
            $this->request,
            [
                'username' => 'required|unique:tmlogin,username',
                'password' => 'required',
                'nama' => 'required',
                'email' => 'required',

            ]
        );

        try {
            //code...
            $r =  new $tmlogin;
            $r->username =  $this->request->username;
            $r->password =  app('hash')->make($this->request->password);
            $r->nama =  $this->request->nama;
            $r->email =   $this->request->email;
            $r->find($id)->update();
            return response()->json([
                'status' => 'ok',
                'msg' => 'data hasben update',
            ]);
        } catch (Tmlogin $tmlogin) {
            //throw $th;
            return response()->json([
                'status' => 'fail',
                'msg' => 'data fail update',
            ]);
        }
    }

    function delete(Tmlogin $tmlogin)
    {
        $data = $tmlogin::findOrFail($this->request->id);
        $data->delete();
        return response()->json([
            'status' => 'success',
            'msg' => 'data has been deleted'
        ]);
    }
}
