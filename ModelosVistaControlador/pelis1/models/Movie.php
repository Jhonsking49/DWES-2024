<?php

class Movie
{
    private $title;
    private $year;
    private $poster;

    public function __construct($title, $year, $poster)
    {
        $this->title = $title;
        $this->year = $year;
        $this->poster = $poster;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getYear()
    {
        return $this->year;
    }

    public function getPoster()
    {
        return $this->poster;
    }
}
