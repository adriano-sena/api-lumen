<?php


namespace App\Http\Controllers;
use App\Episodio;

/**
 * Class EpisodiosController
 * @package App\Http\Controllers
 *
 * Esta classe estende a base controller que possui todos os métodos padrão do REST,
 * Precisa apenas definir a qual recurso se refere no método construtor
 */
class EpisodiosController extends BaseController
{
    public function __construct()
    {
        $this->classe = Episodio::class;
    }
}
