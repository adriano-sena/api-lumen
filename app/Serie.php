<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    public $fillable = ['nome'];
    protected $perPage = 3; //define qtd de itens por pag por default
    protected $appends = ['links']; //adiciona um atributo ao modelo


    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute(): array{

        return [
            'self' => '/api/series/'.$this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }

}
