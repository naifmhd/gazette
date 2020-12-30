<?php

namespace Naifmhd\Gazette\Exceptions;

use Exception;

class GazetteTokenInvalidException extends Exception
{
    public function __construct($message = 'Access Token generated is invalid. Please try regenerating the token.')
    {
        parent::__construct($message);
    }
}
