<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DespesasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Despesa::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'desp_descricao' => 'required|max:191',
            'desp_data'      => 'required',
            'desp_usuario'   => 'required',
            'desp_valor'     => 'required'
        ]);

        $validaData = (new Despesa())->verificaData($request);
        $despesa = Despesa::create($request->all());

        if($despesa){
            return 'Despesa cadastrada com sucesso!';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Despesa::findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $despesa = Despesa::findOrFail($id);

        $despesaOld = $despesa->desp_descricao;

        $despesa->update($request->all());

        if($despesa){
            return "$despesaOld, atualizada.";
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $despesa = Despesa::destroy($id);
        if($despesa){
            return 'Despesa excluída com sucesso!';
        }
    }
}
