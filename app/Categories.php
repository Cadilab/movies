<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Categories extends Model
{
    public static function categorySearch($id)
    {	
    	$query = DB::table('movies')
    				->join('movie_categories', 'movie_categories.movie_id', '=', 'movies.id')
    				->where('movie_categories.category_id', $id)->get();
    	return $query;
    }

    public static function getCategoryByName($id)
    {
    	$query = DB::table('categories')->where('id', $id)->first();
    	return $query;
    }
}
