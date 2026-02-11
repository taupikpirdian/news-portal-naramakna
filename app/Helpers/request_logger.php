<?php

if (!function_exists('log_request')) {
    /**
     * Log incoming request dengan format JSON untuk integrasi Grafana
     *
     * @param \Illuminate\Http\Request $request
     * @param string $level
     * @param array $customData
     * @return void
     */
    function log_request($request = null, $level = 'info', array $customData = [])
    {
        $request = $request ?? request();
        $logger = app(\App\Services\RequestLogService::class, ['request' => $request]);

        if (!empty($customData)) {
            $logger->setCustomData($customData);
        }

        $logger->log($level);
    }
}

if (!function_exists('log_request_with_response')) {
    /**
     * Log request dengan response data
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed $response
     * @param float|null $duration
     * @param string $level
     * @return void
     */
    function log_request_with_response($request, $response, $duration = null, $level = 'info')
    {
        $logger = app(\App\Services\RequestLogService::class, ['request' => $request]);
        $logger->setResponseData($response, $duration);
        $logger->log($level);
    }
}

if (!function_exists('log_request_error')) {
    /**
     * Log request dengan error exception
     *
     * @param \Illuminate\Http\Request $request
     * @param \Throwable $exception
     * @param string $level
     * @return void
     */
    function log_request_error($request, \Throwable $exception, $level = 'error')
    {
        $logger = app(\App\Services\RequestLogService::class, ['request' => $request]);
        $logger->setError($exception);
        $logger->log($level);
    }
}

if (!function_exists('log_custom')) {
    /**
     * Log custom event dengan format JSON
     *
     * @param string $message
     * @param array $data
     * @param string $level
     * @return void
     */
    function log_custom($message, array $data = [], $level = 'info')
    {
        $logData = array_merge([
            'timestamp' => now()->toIso8601String(),
            'message' => $message,
            'user_id' => auth()->check() ? auth()->id() : null,
            'user_email' => auth()->check() && auth()->user() ? auth()->user()->email : null,
            'ip' => request()->ip(),
            'level' => $level,
        ], $data);

        // Write directly to file for clean JSON output
        $logPath = storage_path('logs/request-' . now()->format('Y-m-d') . '.log');
        $json = json_encode($logData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        file_put_contents($logPath, $json . "\n", FILE_APPEND | LOCK_EX);
    }
}
