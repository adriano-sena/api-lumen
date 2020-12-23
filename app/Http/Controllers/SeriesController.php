<?php

namespace App\Http\Controllers;
use App\Serie;
use App\Episodio;


class SeriesController extends BaseController
{
    public function __construct()
    {
        $this->classe = Serie::class;
    }

    public function episodios (int $id)
    {
        $episodios = Episodio::query()->
            where('serie_id', $id)->
            get();

        return $episodios;
    }
}


