<?php

namespace App\Http\Controllers;

use App\Contracts\CategoryContract;
use App\Exceptions\BlogException;
use Exception;
use Illuminate\Http\Request;

/**
 * Class ApiController
 * @package App\Http\Controllers
 */
class ApiController extends Controller {


    /**
     * @var
     */
    protected $service;

    protected $status;

    public function __construct()
    {
        $this->response = [
            'status' => 'SUCCESS',
            'data'   => []
        ];
    }

    /**
     * Provides a singular method for providing meaningful API responses when an error occurs.
     * @param Exception $e
     */
    protected function handleError(Exception $e)
    {

        // Womp womp. Something went wrong. Lets set the status and message accordingly.
        $this->response['status'] = 'FAILED';
        $this->response['message'] = $e->getMessage();

        /*
            If the exception thrown in an instance of BlogException, we have some additional data that we can pass
            back to the front end, assuming that APP_DEBUG is set to TRUE in the .env file.
        */
        if ($e instanceof BlogException && env('APP_DEBUG',false)) {
            $this->response['debug'] = [
                'uuid' => $e->getUuid(),
                'information' => $e->getDebugInformation()
            ];
        }

        // If we passed an explicit code into the exception, let's pass that onto the front end as the HTTP status code.
        $code = ($e->getCode() !== 0) ? $e->getCode() : 500;
        return response($this->response)->setStatusCode($code);
    }

}
