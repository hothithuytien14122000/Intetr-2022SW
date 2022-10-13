<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;
// chưa tạo file  Controller mà đi extends
class FileController 
{
    public function index()
    {

      return view('files');
    }

    public function store(Request $request)
    {
        $request->validate([
          'files' => 'required',
        ]);

        if ($request->hasfile('files')) {
            $files = $request->file('files');

            foreach($files as $file) {
                $name = $file->getClientOriginalName();
                $path = $file->storeAs('uploads', $name, 'public');

                File::create([
                    'name' => $name,
                    'path' => '/storage/'.$path
                  ]);
            }
         }
         
        return back()->with('success', 'Files uploaded successfully');
    }
}