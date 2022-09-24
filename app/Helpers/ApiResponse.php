<?php

namespace App\Helpers;

trait ApiResponse
{
    protected function res($statusCode, $message, $results)
    {
        $res = array(
            'statusCode'    => $statusCode,
            'message'       => $message,
            'results'       => $results
        );
        return $res;
    }
}