<?php
namespace App\Repositories;

abstract class AbstractRepository {


    protected $model;

    function __construct()
    {
        $this->model = $this->resolveModel();
    }

    protected function resolveModel(){
        return app($this->model);
    }

    public function all(){
        return $this->model->all();
    }

    public function show( $id ){
        return $this->model->find($id);
    }

}
