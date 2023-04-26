<?php

if (!function_exists('jsonResponse')) {
    function jsonResponse(string $message, array|null|object $data = null, int $status = 200)
    {
        $response = [
            'message' => $message
        ];

        if (!is_null($data)) {
            $response['data'] = $data;
        }

        return response()->json($response, $status);
    }
}

if (!function_exists('validationErrorResponse')) {
    function validationErrorResponse(array|null $errors, int $status = 400)
    {
        return response()->json([
            'message' => "La validación ha fallado.",
            'errors' => $errors
        ], $status);
    }
}

if (!function_exists('getStatusResponse')) {
    function getStatusResponse(int $status)
    {
        return $status == 0
            ? 422
            : $status;
    }
}