<?php

namespace App\Http\Controllers;

use App\Model\Pessoa;
use Illuminate\Http\Request;

use App\Http\Resources\Pessoa\PessoaResource; 
use App\Http\Resources\Pessoa\PessoaCollection; 

use App\Http\Requests\PessoaRequest; 
use Symfony\Component\HttpFoundation\Response;

use App\Repositories\PessoaRepository;

class PessoaController extends Controller
{

    protected $pessoa;

    public function __construct(PessoaRepository $pessoa)
    {
        /**
         * Permite que os metódos index e show sejam acessados 
         * sem que haja a necessidade da autenticação. 
         */
        $this->middleware('auth:api')->except('index', 'show');
        
        /**
         * 
         */
        //$this->middleware('auth:api');

        $this->pessoa = $pessoa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return PessoaCollection::collection($this->pessoa->getAll(10, true));
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
    public function store(PessoaRequest $request)
    {
        
        //
        $objPessoa = new Pessoa;

        $objPessoa->nome           = $request->nome; 

        $objPessoa->dataNascimento = $request->dataNascimento; 
        
        $objPessoa->sexo           = $request->sexo; 
        
        $objPessoa->email          = $request->email; 
        
        $objPessoa->telefone       = $request->telefone; 
        
        $objPessoa->desativado     = $request->desativado; 
        
        $objPessoa->save();

        //return $request->all();
        
        //return response()->json('ok');

        return response([
            'data' => new PessoaResource($objPessoa)
        ],Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function show(Pessoa $pessoa)
    {
        //
        return new PessoaResource($this->pessoa->get($pessoa->id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        
        //
        /*
        return response()->json([
             'name' => 'Abigail',
             'state' => 'CA'
        ]);
        */

        //return $pessoa; 

        $pessoa->update($request->all());

        return response([
            'data' => new PessoaResource($pessoa)
        ],Response::HTTP_CREATED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Pessoa  $pessoa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pessoa $pessoa)
    {
        //
        $pessoa->delete();
        
        //
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
