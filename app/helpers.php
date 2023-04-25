<?php

if (!function_exists('jsonResponse')) {
    function jsonResponse(string $message, $data = null, int $status = 200)
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