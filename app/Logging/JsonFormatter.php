<?php

namespace App\Logging;

use Monolog\LogRecord;
use Monolog\Formatter\JsonFormatter as MonologJsonFormatter;

class JsonFormatter extends MonologJsonFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(LogRecord $record): string
    {
        // Extract the message (which contains our JSON)
        $message = $record->message ?? '';

        // Try to decode it as JSON
        $data = json_decode($message, true);

        if (json_last_error() === JSON_ERROR_NONE && is_array($data)) {
            // Add log level to the JSON data
            $data['level'] = strtolower($record->level->name ?? 'info');
            $data['channel'] = $record->channel ?? 'app';

            // Return clean JSON without timestamp prefix
            return json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) . "\n";
        }

        // If not JSON, use parent formatter
        return parent::format($record);
    }
}
