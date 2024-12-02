<?php
    if(isset($_GET['create']) && $_POST['titulo']){
        $user = $_SESSION['user'];
        ListRepository::createList($user->getId(), $_POST['titulo']);
        header('Location: index.php');
    }

    if(isset($_GET['creates']) && $_POST['titulo'] && $_POST['autor'] && $_POST['duracion']){
        SongRepository::createSong($_GET['id'], $_POST['titulo'], $_POST['autor'], $_POST['duracion']);
    }

    if(isset($_GET['listaView'])){
        $id = $_GET['id'];
        $nombreLista = ListRepository::getNombreById($id);
        $canciones = SongRepository::getAllSongsByLista($id);
        require_once('views/listaView.phtml');
        die();
    }

    if(isset($_GET['mainView'])){
        require_once('views/ListView.phtml');
        die();
    }

    if (isset($_GET['searchSongs'])) {
        $query = $_POST['query'] ?? '';
        $songs = SongRepository::searchSongs($query);
        require_once('views/searchSongs.phtml');
        exit;
    }

    if(isset($_GET['addSong']) && isset($_POST['cancion'])){
        $id_lista = $_GET['id'];
        $id_cancion = $_POST['cancion'];
        // Lógica para agregar la canción a la lista
        ListRepository::addSongToList($id_lista, $id_cancion);
        header("Location: index.php?c=lista&listaView=1&id=$id_lista");
    }
?>