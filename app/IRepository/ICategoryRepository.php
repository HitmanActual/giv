<?php

namespace App\IRepository;

interface ICategoryRepository
{

    public function all();

    public function create($sttr);
}
