<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class StaticFileController extends Controller
{
    public function getCss($filename)
    {
        $path = resource_path("css/{$filename}");

        if (!File::exists($path)) {
            abort(404);
        }

        $content = File::get($path);

        $response = Response::make($content, 200);
        $response->header('Content-Type', 'text/css'); // Set incorrect MIME type

        return $response;
    }
}
