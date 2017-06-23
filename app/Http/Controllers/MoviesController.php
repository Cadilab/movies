<?php

namespace App\Http\Controllers;

use App\Movies;
use App\Categories;
use DB;
use Session;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::get();
        return view('movies.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'release' => 'required',
            'description' => 'required',
            'embed' => 'required',
            'actors' => 'required',
            'rating' => 'required',
            'categories' => 'required_without_all',
            'thumbnail' => 'required',
        ]);

        // * We are saving movie here

        $thumbnail = $request->file('thumbnail');

        $movie = new Movies();
        $movie->name = $request->name;
        $movie->year = $request->release;
        $movie->description = $request->description;
        $movie->embed = $request->embed;
        $movie->actors = $request->actors;
        $movie->rating = $request->rating;

        if($request->hasFile('thumbnail'))
        {
            if (substr($thumbnail->getMimeType(), 0, 5) == 'image')
            {
                $thumbnail->store('thumbnails');
                $movie->avatar_name = $thumbnail->hashName();
            }
            else {
                return back()->withError('Error! Invalid file type!');
            }
        }

        $movie->save($request->all());

        // * Now we should save all categories and insert them into the database

        $checkboxes = $request->input('categories');

        foreach($checkboxes as $checkbox)
        {  
            DB::table('movie_categories')->insert(
                ['movie_id' => $movie->id, 'category_id' => $checkbox]
            );
        } 

    }

    public function destroy(Movies $movies)
    {
        //
    }


    public function landing()
    {
        $movies = Movies::get();
        return view('landing', compact('movies'));
    }

    public function displayMovie($id)
    {
        $movie = Movies::getMovie($id);

        /*
            First we have to add a view to a movie
        */

        $movie_session = 'movie_'.$id;

        if(!Session::has($movie_session)) {
            Movies::where('id', $id)->increment('views');
            Session::put($movie_session, 1);
        }

        /*

            Now we are passion a movie to the view

        */

        return view('movies.display', compact('movie'));
    }

    public function popularMovies()
    {
        $movies = Movies::getMostPopular();
        return view('movies.popular', compact('movies'));
    }
}
