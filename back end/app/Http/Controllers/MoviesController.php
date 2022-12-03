<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Movie;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $movies=Movie::all();
        return view('admin.movies.index',compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('admin.movies.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request;
        $rate=0;
        $img=$request->img;

        $file_extension = $img->getClientOriginalExtension();
             $file_name = time() . '.' . $file_extension;
             $path = 'img';
             $img->move($path, $file_name);
        Movie::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'rate'=>$rate,
             'img'=>$file_name,
             'category'=>$request->category

        ]);

        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $movie=Movie::find($id);
        $categories=Category::all();

        return view('admin.movies.edit',compact('movie','categories'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
            $update = array();
            $update['title'] = $request->title;
            $update['description'] = $request->description;
            $update['category'] = $request->category;

            Movie::where('id', $id)->update(
                $update
             );

             return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $movie= Movie::find($id);
       $img_destination = 'img/' . $movie->img;
       if (File::exists($img_destination)) {

         File::delete($img_destination);

     }
       $movie->delete();
        return redirect()->back();
    }

    public function search(Request $request)
    {

      $search_field=$request->search_field;
      $type=$request->type;
       $movies=Movie::where($type,$search_field)->get();

       return view('admin.movies.index',compact('movies'));
    }
}
