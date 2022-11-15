<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Despesa extends Model
{
    use HasFactory;

    protected $fillable = [
        'desp_descricao',
        'desp_data',
        'desp_usuario',
        'desp_valor'
    ];

    public function verificaData($request){

        $separaFormato = str_split($request->desp_data);
        foreach ($separaFormato as $row) {
            if($row == '/'){
                $date = Carbon::createFromFormat('d/m/Y H:i:s', $request->desp_data)->format('Y-m-d H:i:s');
                if ($date >=  date("Y-m-d H:i:s")) {
                    $retorno = 'Data inválida, só podem ser inseridas datas atuais.!';
                }
                $request->request->add(['desp_data' => $date]);
                break;
            }else{
                if ($request->desp_data >=  date("Y-m-d H:i:s")) {
                    $retorno = 'Data inválida, só podem ser inseridas datas atuais.!';
                }
            }
        }

        return $retorno;
    }

}
