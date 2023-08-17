<?php

namespace App\Http\Controllers;

use App\Models\File;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $files = File::all();
        return view('dashboard.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'dropify' => 'required|file',
        ]);
            $file = $request->file('dropify');
            $name = $file->getClientOriginalName();
            $extinsion = $file->getClientOriginalExtension();
            $code = $this->generateRandomString(51);
            $path = $file->storeAs('/files',($code.'.'.$extinsion), 'public');
            $size = $file->getSize();
            $url = $this->generateRandomLink();
            $request->merge([
                'user_id' => Auth::user()->id,
                'path' => $path,
                'name' => $name,
                'size' => $size,
                'code' => $code,
                'extinsion' => $extinsion,
                'url' => $url,
            ]);

        $fileCreated = File::create($request->all());
        return redirect()->route('dashboard.index')->with('success', 'File added and URL created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $file = File::findOrFail($id);

        $invitation_link = URL::temporarySignedRoute('search_url', now()->addHours(24), [
            'file' => $file->id,
        'url' => $file->url]);

        return view('dashboard.show', compact('file', 'invitation_link'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $file = File::findOrFail($id);
        } catch (Exception $e) {
            return Redirect::route('dashboard.index')
                ->with('info', 'Reord Not Found!');
        }

        return view('dashboard.edit',compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'dropify' => 'required|file',
        ]);

            $fileUpdated = File::findOrFail($id);

            $file = $request->file('dropify');
            $name = $file->getClientOriginalName();
            $extinsion = $file->getClientOriginalExtension();
            $code = $fileUpdated->code;
            $path = $file->storeAs('/files',($code.'.'.$extinsion), 'public');
            $size = $file->getSize();
            $url = $fileUpdated->url;
            $request->merge([
                'path' => $path,
                'name' => $name,
                'size' => $size,
                'code' => $code,
                'extinsion' => $extinsion,
                'url' => $url,
            ]);

            $fileUpdated->update($request->all());

            return Redirect::route('dashboard.index')
                ->with('success', 'File Updated!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $file = File::findOrFail($id);
        } catch (Exception $e) {
            return Redirect::route('dashboard.index')
                ->with('info', 'Record Not Found!');
        }

            Storage::disk('public')->delete($file->path);
            $file->forceDelete();

        return redirect()->route('dashboard.index')
            ->with('info', 'File delete forever!');
    }


    public function generateRandomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomString;
    }


    public function generateRandomLink()
    {
        // Assuming your site's domain is "example.com"
        $siteUrl = "/https://";

        // Generating a random string to be used as a parameter
        $randomString = $this->generateRandomString(51);

        // Constructing the complete random link
        // $randomLink = $siteUrl . $randomString;

        return $randomString;
    }
}
