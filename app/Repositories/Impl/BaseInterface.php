<?php

namespace App\Repositories\Impl;

interface BaseInterface
{
    public function getAll();
    public function getById($id);
    public function store($data);
    public function deleteById($id);
}
