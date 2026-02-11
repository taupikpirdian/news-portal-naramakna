<?php

namespace App\Services;

use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;

class RequestLogService
{
    protected array $logData = [];

    public function __construct(Request $request)
    {
        $this->logData = [
            'timestamp' => now()->toIso8601String(),
            'request_id' => $request->header('X-Request-ID') ?? (string) str()->uuid(),
            'method' => $request->method(),
            'url' => $request->fullUrl(),
            'ip' => $this->getClientIp($request),
            'user_agent' => $request->userAgent(),
            'user_id' => auth()->check() ? auth()->id() : null,
            'user_email' => auth()->check() && auth()->user() ? auth()->user()->email : null,
            'headers' => $this->sanitizeHeaders($request->headers->all()),
            'body' => $this->sanitizeBody($request->all()),
            'query_params' => $request->query->all(),
        ];
    }

    public function setResponseData($response, $duration = null): self
    {
        $this->logData['response'] = [
            'status_code' => $response->status(),
            'duration_ms' => $duration,
        ];

        return $this;
    }

    public function setError(\Throwable $exception): self
    {
        $this->logData['error'] = [
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'file' => $exception->getFile(),
            'line' => $exception->getLine(),
            'trace' => config('app.debug') ? $exception->getTraceAsString() : 'Hidden in production',
        ];

        return $this;
    }

    public function setCustomData(array $data): self
    {
        $this->logData['custom'] = $data;

        return $this;
    }

    public function log(string $level = 'info'): void
    {
        // Add log level to the data
        $this->logData['level'] = $level;

        // Write directly to file for clean JSON output
        $logPath = storage_path('logs/request-' . now()->format('Y-m-d') . '.log');
        $json = json_encode($this->logData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        file_put_contents($logPath, $json . "\n", FILE_APPEND | LOCK_EX);
    }

    public function toArray(): array
    {
        return $this->logData;
    }

    public function toJson(): string
    {
        return json_encode($this->logData, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
    }

    protected function getClientIp(Request $request): string
    {
        $headers = [
            'HTTP_X_FORWARDED_FOR',
            'HTTP_X_REAL_IP',
            'HTTP_CF_CONNECTING_IP',
            'HTTP_CLIENT_IP',
        ];

        foreach ($headers as $header) {
            if (!empty($_SERVER[$header])) {
                $ips = explode(',', $_SERVER[$header]);
                return trim($ips[0]);
            }
        }

        return $request->ip();
    }

    protected function sanitizeHeaders(array $headers): array
    {
        $sensitiveKeys = ['authorization', 'token', 'password', 'secret', 'api-key', 'apikey'];

        $sanitized = [];
        foreach ($headers as $key => $value) {
            if (in_array(strtolower($key), $sensitiveKeys)) {
                $sanitized[$key] = ['***REDACTED***'];
            } else {
                $sanitized[$key] = $value;
            }
        }

        return $sanitized;
    }

    protected function sanitizeBody(array $body): array
    {
        $sensitiveKeys = ['password', 'password_confirmation', 'current_password', 'token', 'secret', 'api_key'];

        $sanitized = [];
        foreach ($body as $key => $value) {
            if (in_array($key, $sensitiveKeys)) {
                $sanitized[$key] = '***REDACTED***';
            } elseif (is_array($value)) {
                $sanitized[$key] = $this->sanitizeBody($value);
            } else {
                $sanitized[$key] = $value;
            }
        }

        return $sanitized;
    }
}
