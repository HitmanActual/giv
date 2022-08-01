<?php

namespace App\Repositories;

use App\IRepository\ICategoryRepository;
use App\Models\Category;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;

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

    public function show($id)
    {
        // TODO: Implement show() method.
        return Category::findOrFail($id);
    }


    public function modify($id, $data)
    {
        // TODO: Implement modify() method.
        return $this->show($id)->update($data);
    }

    public function remove($id)
    {
        // TODO: Implement remove() method.
        return $this->show($id)->delete();
    }

}
