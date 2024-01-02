<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;

class ExampleController extends Controller
{
    use Common;

    public function showUpload() {
        return view("upload");
    }

    public function place() {
        return view("place");
    }

    public function blog() {
        return view("blog");
    }
 
    public function mySession() {
        session()->put('test', 'First Laravel session');
        $data = session('test');
        return view('session', compact('data'));
    }

    public function upload(Request $request) {
        // $extension= $request->image->getClientOriginalExtension();
        // $fileName = time() . '.' . $extension;
        // $path= 'assets\images';
        // $request->image->move($path , $fileName);
        // return 'doneeeeeeee';
        $fileName= $this->uploadFile($request->image,'assets\images');
        return $fileName;
        }

    public function uploadImage(Request $request) {
        // $extension= $request->image->getClientOriginalExtension();
        // $fileName = time() . '.' . $extension;
        // $path= 'assets\images';
        // $request->image->move($path , $fileName);
        // return 'doneeeeeeee';
    }
}
