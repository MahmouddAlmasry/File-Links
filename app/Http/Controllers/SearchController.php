<?php

namespace App\Http\Controllers;

use App\Models\File;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function main(){
        return view('main');
    }


    public function search_code(Request $request){
        $request->validate([
            'code' => 'required',
        ]);

        $file = File::withoutGlobalScope('user')->where('code', '=', $request->code)->first();
        if($file == null) {
            $error = 'Enter Correct Code!';
            return view('main', compact('error'));
        }
        return view('main', compact('file'));
    }

    public function search_url($url)
    {
        $file = File::withoutGlobalScope('user')->where('url', '=', $url)->first();
        if($file == null) {
            $error = 'The File Not Found!';
            return view('main', compact('error'));
        }
        return view('main', compact('file'));
    }

    public function download($code)
    {
            $file = File::where('code', '=', $code)->first();
            if (!$file) {
                abort(404);
            }
            // Assuming your files are stored in the public disk
            $filePath = public_path('storage'."\\files\\".$file->code.'.'.$file->extinsion);
            return response()->download($filePath);
    }
}
