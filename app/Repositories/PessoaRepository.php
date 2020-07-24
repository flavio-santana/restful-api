<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

use App\Model\Pessoa;

class PessoaRepository extends BaseRepository
{
    //protected $model;

	public function __construct(Pessoa $model)
	{
		$this->model = $model;
	}

	public function getAll($take = 0, $paginate = false)
	{
        if ($paginate === true ) 
            return $this->getPaginate(3);
        else 
            return Pessoa::all();
	}    

    /**
     * Get's a pessoa by it's ID
     *
     * @param int
     * @return collection
     */
    public function get($pessoa_id)
    {
        return Pessoa::find($pessoa_id);
    }

    /**
     * Get's all posts.
     *
     * @return mixed
     */
    public function all()
    {
        return Pessoa::all();
    }

    /**
     * Deletes a pessoa.
     *
     * @param int
     */
    public function delete($pessoa_id)
    {
        Pessoa::destroy($pessoa_id);
    }

    /**
     * Updates a pessoa.
     *
     * @param int
     * @param array
     */
    public function update($pessoa_id, array $data)
    {
        Pessoa::find($pessoa_id)->update($data);
    }
}
