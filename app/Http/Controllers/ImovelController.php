<?php

namespace App\Http\Controllers;
 
use App\Model\Imovel;
use App\Model\Pessoa;
use Illuminate\Http\Request;
use App\Http\Resources\Imovel\ImovelResource;
use App\Exceptions\ImovelNotBelongsToPessoa;
use Auth;

class ImovelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pessoa $pessoa)
    {

        
        //return Imovel::all();

        //return $pessoa->imoveis;

        return ImovelResource::collection($pessoa->imoveis);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function show(Imovel $imovel)
    {
        //dd($imovel);

        //return $imovel; 

        //
        return new ImovelResource($imovel);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function edit(Imovel $imovel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imovel $imovel)
    {

        //
        $pessoa_id = $request->pessoa; 

        // Recebo os dados do imóvel conforme o parâmetro passado
        $dados = $imovel->find($request->imovei); 

        //return response()->json(new ImovelResource($dados));

        if((int)$pessoa_id !== $dados->pessoa_id){
        //if(Auth::id() !== $dados->pessoa_id){

            //
            throw new ImovelNotBelongsToPessoa; 

        }else{
            
            /*
            $imovel->update($request->all());

            return response([
                'data' => new ImovelResource($imovel)
            ],Response::HTTP_CREATED);
            */

            return response()->json('update with sucess');
        }
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Imovel  $imovel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imovel $imovel)
    {
        //
        $imovel->delete();

        //
        return response(null, Response::HTTP_NO_CONTENT);
    }

    /**
     * 
     */
    public function imovelUserCheck($imovel)
    {
        if(Auth::id() !== $imovel->pessoa_id){

            throw new ImovelNotBelongsToPessoa;   
        }
    }
}
