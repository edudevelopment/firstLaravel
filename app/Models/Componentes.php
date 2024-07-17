<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;

    public function formatacaoMascaraDinheiroDecimal($valorParaFormatar) {
        $tamanho = strlen($valorParaFormatar);
        $dados = str_replace(',', ',', $valorParaFormatar);
        if ($tamanho <= 6) {
            $dados = str_replace(',', '.', $valorParaFormatar);
        } else {
            if ($tamanho >= 8 && $tamanho <= 10) {
                $retiraVirguraPorPonto = str_replace(',', '.', $valorParaFormatar);
                $separaPorIndice = explode('.', $retiraVirguraPorPonto);
                $dados = $separaPorIndice[0] . $separaPorIndice[1];
            }
        }

        return $dados;

    }
}
