<?php

namespace App\Http\Controllers;

use App\IRepository\ICategoryRepository;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Photo;
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


        return $this->successResponse($this->categoryRepository->all(), Response::HTTP_OK);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\StoreCategoryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request)
    {
        //


        $category = Category::create([

            'parent_id' => $request->parent_id,
            'order' => $request->order,
            'name' => $request->name,
            'slug' => $request->slug,
            'description' => $request->description,
        ]);



        $photos = explode(",",$request->get('photos'));
        foreach($photos as $photo){

            Photo::create([
                'imageable_id'=>$category->id,
                'imageable_type'=>'App\Models\Category',
                'filename'=>$photo
            ]);
        }


        return $this->successResponse([$category,$photos], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return $this->successResponse($this->categoryRepository->show($id), Response::HTTP_OK);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\UpdateCategoryRequest $request
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update($id,UpdateCategoryRequest $request)
    {


        return $this->successResponse($this->categoryRepository->modify($id,$request->all(), Response::HTTP_OK));


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Category $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        //
        return $this->successResponse($this->categoryRepository->remove($category), Response::HTTP_OK);
    }
}
