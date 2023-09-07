<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function main()
    {
        return view('main');
    }

    public function search_url(Request $request, $url)
    {
        $file = File::withoutGlobalScope('user')->where('url', '=', $url)->first();
        if ($file == null) {
            $error = 'The File Not Found!';
            return view('main', compact('error'));
        }
        $filePath = public_path('storage' . "\\files\\" . $file->code . '.' . $file->extinsion);

        event('downloadFile', [$request, $file]);

        return response()->file($filePath);
    }
}
