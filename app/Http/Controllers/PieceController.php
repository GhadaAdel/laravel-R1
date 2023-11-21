<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;


class PieceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pieces');
        //name of the blade//

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pieces= new Piece;
        $pieces->title = $request->title;
        $pieces->content = $request->content;

        if(isset($request->published)){
            $pieces->published = true;
        }else{
            $pieces->published = false;
        }
        $pieces->author = $request->author;
        $pieces->save();
        return "news is published successfully";
        
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
