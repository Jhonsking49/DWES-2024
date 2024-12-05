<?php

class PlaylistModel {
    private $ownerId;
    private $name;
    private $songs = array();

    public function __construct($ownerId, $name, $songs)
    {
        $this->ownerId = $ownerId;
        $this->name = $name;
        $this->songs = SongRepository::getSongsByPlaylist($this->ownerId);
    }

    public function getOwnerId()
    {
        return $this->ownerId;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getSongs()
    {
        return $this->songs;
    }
}