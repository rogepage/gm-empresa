<?php

namespace App\Services;

use App\Models\Parametro;


class ParametrosService
{
    public function __construct()
    {
    }


    public function get(): Parametro
    {
        return  Parametro::find(1);
    }
}
