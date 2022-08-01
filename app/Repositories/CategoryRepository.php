<?php

namespace App\Repositories;

use App\IRepository\ICategoryRepository;
use App\Models\Category;

class CategoryRepository implements ICategoryRepository
{

    public function all()
    {
        // TODO: Implement all() method.

        return Category::all();
    }

    public function create($attr)
    {
        // TODO: Implement create() method.

        return Category::create($attr);
    }
}
