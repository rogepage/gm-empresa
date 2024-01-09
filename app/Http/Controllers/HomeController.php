<?php

namespace App\Http\Controllers;


use App\Services\SimuladorService;
use Illuminate\Http\Request;

use Illuminate\Support\Str;
use stdClass;

class HomeController extends Controller
{

    public function __construct(
        protected readonly SimuladorService $simuladorService,

    ) {
    }

    public function simulador()
    {
        return view('simulador')->with('form', [])->with('simulador', false);
    }

    public function simular(Request $request)
    {
        $data = $request->all();
        $simulador = $this->simuladorService->simulaJogada($data);
        return view('simulador')->with('form', $data)->with('simulador', $simulador);
    }
}
