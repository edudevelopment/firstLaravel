<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'cpf',
        'email',
        'endereco',
        'logradouro',
        'cep',
        'bairro',
    ];

    public function getProdutoPesquisarIndex(string $search = '') {

        $cliente = $this->where(function($query) use ($search) {
            if ($search) {
                $query->where('cpf', $search);
                $query->orWhere('cpf', 'LIKE', "%{$search}%");
            }
        })->get();

        return $cliente;
    }
}
