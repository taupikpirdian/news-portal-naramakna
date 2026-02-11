<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\RequestLogService;
use Throwable;

class LogRequestMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $startTime = microtime(true);

        // Skip logging for certain routes if needed
        if ($this->shouldSkipLogging($request)) {
            return $next($request);
        }

        try {
            $response = $next($request);

            $duration = round((microtime(true) - $startTime) * 1000, 2);

            $logger = new RequestLogService($request);
            $logger->setResponseData($response, $duration);

            // Determine log level based on status code
            $level = $this->getLogLevel($response->status());
            $logger->log($level);

            return $response;

        } catch (Throwable $e) {
            $duration = round((microtime(true) - $startTime) * 1000, 2);

            $logger = new RequestLogService($request);
            $logger->setError($e);
            $logger->setCustomData(['duration_ms' => $duration]);
            $logger->log('error');

            throw $e;
        }
    }

    protected function shouldSkipLogging(Request $request): bool
    {
        // Skip logging for health checks, static assets, etc.
        $skipPaths = config('logging.skip_paths', [
            'health',
            'api/health',
            'metrics',
            '_debugbar',
        ]);

        foreach ($skipPaths as $path) {
            if (str_contains($request->path(), $path)) {
                return true;
            }
        }

        // Skip logging for static assets
        if (preg_match('/\.(css|js|png|jpg|jpeg|gif|ico|svg|woff|woff2|ttf|eot)$/', $request->path())) {
            return true;
        }

        return false;
    }

    protected function getLogLevel(int $statusCode): string
    {
        if ($statusCode >= 500) {
            return 'critical';
        } elseif ($statusCode >= 400) {
            return 'warning';
        } else {
            return 'info';
        }
    }
}
