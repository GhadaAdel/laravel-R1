<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Piece;


class PieceController extends Controller
{
    private $columns =['title', 'description', 'published'];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts= Piece::get();
        return view ('posts', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pieces');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $pieces= new Piece;
        $pieces->title =  $request->title;
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
        $post = Piece::findOrFail($id);
        return view('showpost',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Piece::findOrfail($id);
        return view('updatepost', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data= $request->only($this->columns);
        $data['published'] = isset($data['published'])? true:false;

        Piece::where('id', $id)->update($data);
        return 'updated';
       

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $post = Piece::findOrfail($id);
        // return view ('deletepost', compact('post')); 
        Piece::where('id',$id)->delete();
        return 'deleted';
    }
}
