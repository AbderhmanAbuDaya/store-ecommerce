<?php


namespace App\Repositories;


class Repository implements \App\Http\Interfaces\RepositoryInterface
{
protected $model;
    public function __construct($model)
    {
        $this->model=$model;
    }

    public function all()
    {
        return $this->model->pajenate(PAGENIATE_COUNT);
    }

    public function create(array $data)
    {
    return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        $record=$this->model->find($id);
        return $record->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }


    public function getModel(){
        return $this->model;
    }
    public function setModel($mode){

        $this->model=$mode;
    }

    public function with($relation){
        return $this->model->with($relation);
    }
}
