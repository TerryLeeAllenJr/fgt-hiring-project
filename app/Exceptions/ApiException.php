<?php

namespace App\Exceptions;

use Throwable;

/**
 * Class ApiException
 * @package App\Exceptions
 */
class ApiException extends BlogException
{

    /**
     * ApiException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null, $debugInformation = [])
    {
        parent::__construct($message, $code, $previous,$debugInformation);
    }
}
