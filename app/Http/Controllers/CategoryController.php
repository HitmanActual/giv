<?php

namespace App\Http\Controllers;

use App\IRepository\ICategoryRepository;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    use ResponseTrait;

    private $categoryRepository;

    public function __construct(ICategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return $this->successResponse($this->categoryRepository->all(),Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'parent_id'=>'numeric',
            'order'=>'numeric',
            'name'=>'required|string|max:255',
            'slug'=>'unique:categories|string|max:255',
            'description'=>'string',
        ];


        $messages = [
            'slug.unique' => 'The slug must be unique',

        ];


        $validator = Validator::make($request->all(),$rules,$messages);
        $validated = $validator->validated();


        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), 409);
        }

        return $this->successResponse($this->categoryRepository->create($validated),Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
