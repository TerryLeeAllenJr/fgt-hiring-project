<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function validate(array $data = [], array $rules = [] )
    {
        $validator = Validator::make($data,$rules);

        if ($validator->fails()) {
            throw new ApiException('Validation error.',412,null,$validator->errors());
        }
    }
}
