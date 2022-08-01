<?php

namespace App\IRepository;

interface ICategoryRepository
{

    public function all();

    public function create($sttr);

    public function show($id);

    public function modify($id,$data);

    public function remove($id);
}
