<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Place;
use App\Traits\Common;


class PlaceController extends Controller
{

    use Common;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $places= Place::get();
        return view ('places', compact('places'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addplace');
        
    }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages=[
            'title.required'=>'This is required',
            'description.required'=>'This is required'
        ];

        $data = $request->validate([
            'title'=>'required|string',
            'description'=>'required|string|max:5',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'From'=>'required',
            "To"=>'required'


        ], $messages);

        $fileName= $this->uploadFile($request->image,'assets\images');

        $data['image'] = $fileName;

        Place::create($data);
        return "good to go";
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $place = Place::findOrfail($id);
        return 'here we go';
       // return view('updatecar', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse
    {
        Place::where('id',$id)->delete();
        return redirect('places');
    }
}
