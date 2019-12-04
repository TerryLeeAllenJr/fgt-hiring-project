<?php

namespace App\Http\Controllers;

use App\Category;
use Exception;
use Illuminate\Http\Request;
use App\Contracts\CategoryContract;

/**
 * Class CategoryController
 * @package App\Http\Controllers
 */
class CategoryController extends ApiController
{

    /**
     * @var CategoryContract
     */
    private $service;

    /**
     * CategoryController constructor.
     * @param CategoryContract $service
     */
    public function __construct(CategoryContract $service)
    {
        $this->service = $service;

        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            // Using the injected service to get a list of categories.
            $this->response['data'] = $this->service->getCategories($request->all());

            // Sweet! It worked... now let's send the response back and get on with it.
            return response($this->response);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            // Let's check to be sure that the actual data being written to the database is sanitary.
            $this->validate($request->all(),Category::$postValidationParameters);

            // Using the injected service to create the category.
            $this->response['data'] = $this->service->createCategory($request->all());

            // Sweet! It worked... now let's send the response back and get on with it.
            return response($this->response);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, int $id)
    {
        try {

            // Using the injected service to get the category.
            $this->response['data'] = $this->service->getCategory($id,$request->all());

            // Sweet! It worked... now let's send the response back and get on with it.
            return response($this->response);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {

            // Let's check to be sure that the actual data being written to the database is sanitary.
            $this->validate($request->all(),Category::$putValidationParameters);

            // Using the injected service to create the category.
            $this->response['data'] = $this->service->updateCategory($id,$request->all());

            // Sweet! It worked... now let's send the response back and get on with it.
            return response($this->response);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            // Using the injected service to delete the category.
            $this->response['data'] = $this->service->deleteCategory($id);

            // Sweet! It worked... now let's send the response back and get on with it.
            return response($this->response);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }
}
