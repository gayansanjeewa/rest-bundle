<?php

use Serrex\RestBunble\Response\Error;
use Serrex\RestBunble\Response\Success;

/**
 * Error json response
 * @param  string $code Errors interface constant variable
 * @param  integer $statusCode Stranded HTTP status code
 * @param  Array|array $errorMessages Custom error messages
 * @return Webdecor\Http\Error
 */
function error(array $errorMessages = [], $statusCode = 400)
{
    $instance = app(Error::class, [$errorMessages, $statusCode]);
    return $instance;
}

/**
 * Success Json response
 * @param  array $data response content
 * @param  String $message custom success massage if needed
 * @return Webdecor\Http\Success
 */
function success($data = [], $message = null)
{
    $instance = app(Success::class, [$data, $message]);
    return $instance;
}
