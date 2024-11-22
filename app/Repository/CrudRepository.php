<?php

namespace App\Repository;

use App\Repository\Interface\CrudInterface;
use Illuminate\Database\Eloquent\Model;

class CrudRepository implements CrudInterface
{

    private Model $model;

    public function setModel(Model $model)
    {
        $this->model = new $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function where(array $data)
    {
        $query = $this->model;
        foreach ($data as $key => $value) {
            $query->where($key, $value);
        }

        return $query->get();
    }

    public function create(array $data)
    {
        return ($this->model->create($data))
        ? [
            'type' =>'success',
            'message' => 'Data berhasil dihapuskan'
          ]
        : [
            'type' =>'failed',
            'message' => 'Data gagal dihapuskan'
          ];

    }

    public function update(array $data, int $id)
    {
        return ($this->model->where('id', $id)->update($data))
        ? [
            'type' =>'success',
            'message' => 'Data berhasil dihapuskan'
          ]
        : [
            'type' =>'failed',
            'message' => 'Data gagal dihapuskan'
          ];
    }

    public function delete(int $id)
    {
        return ($this->model->where('id', $id)->delete())
            ? [
                'type' =>'success',
                'message' => 'Data berhasil dihapuskan'
              ]
            : [
                'type' =>'failed',
                'message' => 'Data gagal dihapuskan'
              ];
    }
}
