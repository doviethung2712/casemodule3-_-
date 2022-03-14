<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use App\Repositories\Impl\BaseInterface;

abstract class BaseRepositories implements BaseInterface
{
    public $table;

    public function __construct()
    {
        $this->table = $this->getTable();
    }

    public abstract function getTable();

    public function getAll()
    {
        return DB::table($this->table)->get();
    }
    public function getById($id)
    {
        return DB::table($this->table)->where('id', $id)->first();
    }
    public function deleteById($id)
    {
        return DB::table($this->table)->where('id', $id)->delete();
    }
    public function store($data)
    {
         DB::table($this->table)->insert($data);
    }
}