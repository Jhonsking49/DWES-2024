<?php

/**
 * 
 */
class FilmModel 
{
	private $id;
	private $title;
	private $director;
	private $year;
	private $poster;
	
	function __construct($datos)
	{
		$this->id=$datos['id'];
		$this->title=$datos['title'];
		$this->director=$datos['director'];
		$this->year=$datos['year'];
		$this->poster=$datos['poster'];
		# code...
	}

	public function getId(){
		return $this->id;
	}
	public function getTitle(){
		return $this->title;
	}
	public function getDirector(){
		return $this->director;
	}
	public function getYear(){
		return $this->year;
	}
	public function getPoster(){
		return $this->poster;
	}
}

?>