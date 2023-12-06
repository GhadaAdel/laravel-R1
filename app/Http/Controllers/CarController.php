<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;
use App\Traits\Common;

class CarController extends Controller
{
    use Common;

    private $columns =['carTitle', 'description', 'published'];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars= Car::get();
        return view ('cars', compact('cars'));

         //   return view("updatecar");
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addcar');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $cars= new Car;
        // $cars->carTitle = $request->carTitle;
        // $cars->description = $request->description;
        // if(isset($request->published)){
        //     $cars->published = true;
        // }else{
        //     $cars->published = false;
        // }
        // $cars->save();
        // return "successfully";

        // $data= $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true : false;
        $messages=[
            'carTitle.required'=>'This is required',
            'description.required'=>'This is required'
        ];

        $data = $request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:5',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048'

        ], $messages);

        $fileName= $this->uploadFile($request->image,'assets\images');

        $data['image'] = $fileName;

        $data['published'] = isset($request['published'])? true : false;

        Car::create($data);
        return "weeeeee";
        // Car::create($request->only($this->columns));
        // return redirect('cars');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $car = Car::findOrFail($id);
        return view('showcar',compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $car = Car::findOrfail($id);
        return view('updatecar', compact('car'));
      //  return "The id is: ".$id;
        //return view ('cars', compact('cars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $data= $request->only($this->columns);
        // $data['published'] = isset($data['published'])? true:false;

        // Car::where('id', $id)->update($data);
        // return 'updated';
        
        $messages=[
            'carTitle.required'=>'This is required',
            'description.required'=>'This is required'
        ];

        $data = $request->validate([
            'carTitle'=>'required|string',
            'description'=>'required|string|max:5',
            'image' => 'mimes:png,jpg,jpeg|max:2048'

        ], $messages);

        // if (Car::has('image')) {
        //     $edit_rules['image'] = 'required|image|mimes:jpeg,jpg,bmp,png,gif';
        // }
    
        // $v = Car::make(Car::all(), $edit_rules);
    
        // if ($data) {
    
        //     if ($v->fails()) {
        //         return Car::back()->withErrors($v);
        //     }
    
        $fileName= $this->uploadFile($request->image,'assets\images');


        $data['image'] = $fileName;

        $data['published'] = isset($request['published'])? true : false;

        Car::where('id',$id)->update($data);


        return "DONE";
    }

    
    public function validateImage(Request $request)
    {


        // $request->validate(['image' => 'required|mimes:png,jpg,jpeg|max:2048']);
        // return redirect()->back();

        // [Car::requiredIf(function (){

        //     if (!empty(Car::find($this->updateFile)->file_upload)) {
      
        //        return false;
        //     }
      
        //       return true;
      
        //    }),'image','mimes:jpeg,png,jpg,svg','max:2048'];
       
      //  return "The id is: ".$id;
        //return view ('cars', compact('cars'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): RedirectResponse //softdelete
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        Car::where('id',$id)->delete();
        return redirect('cars');
    }

    public function forceDelete(string $id): RedirectResponse //forcedelete
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        Car::where('id',$id)->forceDelete();
        return redirect('cars');
    }

    public function restore(string $id): RedirectResponse
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        Car::where('id',$id)->restore();
        return redirect('cars');
    }
    public function trashed() 
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        $cars= Car::onlyTrashed()->get();
        return view('trashed', compact('cars'));
    }
}
