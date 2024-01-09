<?php

namespace App\Http\Controllers;


use App\Services\SimuladorService;
use Illuminate\Http\Request;

use Illuminate\Support\Str;


class HomeController extends Controller
{

    public function __construct(
        protected readonly SimuladorService $simuladorService,

    ) {
    }

    public function simulador()
    {
        return view('simulador');
    }

    public function simular(Request $request)
    {
        $data = $request->all();
        $this->simuladorService->simulaJogada($data);
        return view('simulador')->with('previewData', $data);
    }
}
