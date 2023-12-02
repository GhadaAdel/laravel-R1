<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Models\Piece;


class PieceController extends Controller
{
    private $columns =['title', 'content','author', 'published'];

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
        // $pieces= new Piece;
        // $pieces->title =  $request->title;
        // $pieces->content = $request->content;
        // if(isset($request->published)){
        //     $pieces->published = true;
        // }else{
        //     $pieces->published = false;
        // }
        // $pieces->author = $request->author;
        // $pieces->save();
        // return "news is published successfully";
        $data= $request->only($this->columns);
        $data['published'] = isset($data['published'])? true : false;

        $request->validate([
            'title'=>'required|string',
            'content'=>'required|string|max:5',
            'author'=>'required|string'

        ]);
        Piece::create($data);
        return "done";
        
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
    public function destroy(string $id): RedirectResponse //softdelete
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        Piece::where('id',$id)->delete();
        return redirect('posts');
    }

    public function forceDelete(string $id): RedirectResponse //forcedelete
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        Piece::where('id',$id)->forceDelete();
        return redirect('posts');
    }

    public function restore(string $id): RedirectResponse
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        Piece::where('id',$id)->restore();
        return redirect('posts');
    }
    public function trashedpost() 
    {
        // $cars = Car::findOrfail($id);
        // return view('cars', compact('cars'));
        $posts= Piece::onlyTrashed()->get();
        return view('trashedpost', compact('posts'));
    }

}
