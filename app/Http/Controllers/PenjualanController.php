<?php


namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Request;

class PenjualanController extends Controller
{

    protected $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    function index()
    {
    }
}
