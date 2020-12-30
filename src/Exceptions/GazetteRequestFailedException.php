<?php

namespace Naifmhd\Gazette\Exceptions;

use Exception;

class GazetteRequestFailedException extends Exception
{
    public function __construct($message = 'Gazette service requests failed. Please make sure gazette service is reachable.')
    {
        parent::__construct($message);
    }
}
