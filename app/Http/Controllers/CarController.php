<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $cars= new Car;
        $cars->carTitle = $request->carTitle;
        $cars->description = $request->description;
        if(isset($request->published)){
            $cars->published = true;
        }else{
            $cars->published = false;
        }
        $cars->save();
        return "successfully";
        
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
        return view('updatecar');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
