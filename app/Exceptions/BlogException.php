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
     * Additional details that are provided at the time the exception is thrown. Allows us to pass more meaningful data
     * when throwning an exception.
     * @var
     */
    private $debugInformation;

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
    public function __construct($message = "", $code = 0, Throwable $previous = null, $debugInformation = [])
    {

        $this->debugInformation = $debugInformation;

        $this->uuid = (request()->uuid) ?? null;

        parent::__construct($message, $code, $previous);
    }

    /**
     * Returns any debug information that was created at the time the exception was thrown.
     * @return array
     */
    public function getDebugInformation()
    {
        return $this->debugInformation;
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
