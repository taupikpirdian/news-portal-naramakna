<?php

namespace App\Services;

class ImageBase64Service
{
    public function encodeAsset(string $relativePath): ?string
    {
        $fullPath = public_path($relativePath);
        if (!is_file($fullPath)) {
            return null;
        }

        $contents = @file_get_contents($fullPath);
        if ($contents === false) {
            return null;
        }

        $mime = function_exists('mime_content_type') ? @mime_content_type($fullPath) : 'image/png';
        $base64 = base64_encode($contents);
        return 'data:' . ($mime ?: 'image/png') . ';base64,' . $base64;
    }
}

