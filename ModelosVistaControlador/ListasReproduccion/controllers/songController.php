<?php

if (isset($_POST['añadirCancion'])){
        
    SongRepository::createSong($_POST['title'], $_POST['author'], $_POST['duration'], $_POST['lista']);
    
}

