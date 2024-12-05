<?php

class SongModel {
    private $id;
    private $title;
    private $author;
    private $duration;
    private $mp3;
    private UserModel $owner;

    public function __construct($id, $title, $author, $duration, $mp3, $owner) {
        $this->id = $id;
        $this->title = $title;
        $this->author = $author;
        $this->duration = $duration;
        $this->mp3 = $mp3;
        $this->owner = UserRepository::getUserById($id);
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getDuration() {
        return $this->duration;
    }

    public function getMp3() {
        return $this->mp3;
    }

    public function getOwner() {
        return UserRepository::getUserById($this->owner);
    }
}