<?php

namespace App\Http\Controllers;

use App\Entry;
use App\Contracts\EntryContract;
use Exception;
use Illuminate\Http\Request;

class EntriesController extends ApiController
{

    public function __construct(EntryContract $service)
    {
        // Inject the service.
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

            // Using the injected service to create the category.
            $this->response['data'] = $this->service->getEntries($request->all());

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
            $this->validate($request->all(),Entry::$postValidationParameters);

            // Using the injected service to create the entry.
            $this->response['data'] = $this->service->createEntry($request->all());

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

            // Using the injected service to return the entry data.
            $this->response['data'] = $this->service->getEntry($id,$request->all());

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
    public function update(Request $request, int $id)
    {

        try {

            // Let's check to be sure that the actual data being written to the database is sanitary.
            $this->validate($request->all(),Entry::$putValidationParameters);

            // Using the injected service to update the entry.
            $this->response['data'] = $this->service->updateEntry($id,$request->all());

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

            // Using the injected service to update the entry.
            $this->response['data'] = $this->service->deleteEntry($id);

            // Sweet! It worked... now let's send the response back and get on with it.
            return response($this->response);

        } catch (Exception $e) {
            return $this->handleError($e);
        }
    }
}
