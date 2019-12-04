<?php

namespace App\Exceptions;

use Exception;
use Throwable;

/**
 * Class BlogException
 * @package App\Exceptions
 */
class BlogException extends Exception {

    /**
     * The unique UUID provided by the RequestUUID global middleware. Used for tracking and bug reporting.
     * @var
     */
    private $uuid;

    /**
     * BlogException constructor.
     * @param string $message
     * @param int $code
     * @param Throwable|null $previous
     */
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $this->uuid = (request()->uuid) ?? null;

        parent::__construct($this->uuid . ': '.$message, $code, $previous);
    }

    /**
     * Returns the request UUID that triggered the exception.
     * @return mixed|null
     */
    public function getUuid()
    {
        return $this->uuid;
    }

}
