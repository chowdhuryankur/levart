<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		$xmlFile = "test.xml";
		$genres = array();
		$books = array();
		$xmlData = simplexml_load_file($xmlFile) or die("Error: Cannot create object");
		$genreGroup = array_flip(array_flip(array_map("strval",$xmlData->xpath("//catalog/book/genre"))));

		foreach ($genreGroup as $genre) 
		{
			array_push($genres, $genre);
			$book = $xmlData->xpath("//catalog/book[genre = '$genre']");
			array_push($books, $book);
		}

		$data['genres'] = $genres;
		$data['books'] = $books;

		return view('file_reader',$data);
	}
}
