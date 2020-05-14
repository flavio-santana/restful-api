<?php

namespace App\Http\Controllers;
 
use App\Model\Imovel;
use App\Model\Pessoa;
use Illuminate\Http\Request;
use App\Http\Requests\ImovelRequest; 
use App\Http\Resources\Imovel\ImovelResource; 
use App\Exceptions\ImovelNotBelongsToPessoa;
use Auth;
use Symfony\Component\HttpFoundation\Response;

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
    public function store(ImovelRequest $request, Pessoa $pessoa)
    {
        //
        $imovel = new Imovel($request->all());

        //
        $pessoa->imoveis()->save($imovel);

        //
        return response([
            'data' => new ImovelResource($imovel)
        ],Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Imovel  $imovei
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa, Imovel $imovei)
    {
        
        //dd($imovel);

        //return $imovei; 

        //
        return new ImovelResource($imovei);
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
     * @param  \App\Model\Imovel  $imovei
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa, Imovel $imovei)
    {

        //return $pessoa; 
        //return $imovei; 


        $imovei->update($request->all());

        return response([
            'data' => new ImovelResource($imovei)
        ],Response::HTTP_CREATED);
        
        //
        //$pessoa_id = $request->pessoa; 

        // Recebo os dados do imóvel conforme o parâmetro passado
        //$dados = $imovel->find($request->imovei); 

        //return response()->json(new ImovelResource($dados));

        /*
        if((int)$pessoa_id !== $dados->pessoa_id){
        //if(Auth::id() !== $dados->pessoa_id){

            //
            throw new ImovelNotBelongsToPessoa; 

        }else{
            
            
            $imovel->update($request->all());

            return response([
                'data' => new ImovelResource($imovel)
            ],Response::HTTP_CREATED);
            

            return response()->json('update with sucess');
        }
        */
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Imovel  $imovei
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa, Imovel $imovei)
    {

        //return $imovei;

        //
        $imovei->delete();

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
