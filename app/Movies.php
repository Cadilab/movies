<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public static function getMovie($id)
    {
    	$query = Movies::where('id', $id)->first();
    	return $query;
    }

    public static function getMostPopular()
    {
    	$query = Movies::orderBy('views', 'desc')->get();
    	return $query;
    }
}
