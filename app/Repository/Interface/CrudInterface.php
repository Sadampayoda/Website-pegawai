<?php

namespace App\Repository\Interface;

use Illuminate\Database\Eloquent\Model;

interface CrudInterface {
    public function setModel(Model $model);
    public function all();

    public function find($id);

    public function where(array $data);

    public function create(array $data);

    public function update(array $data,int $id);

    public function delete(int $id);
}

