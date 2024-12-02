<?php
    class cancion{
        private $id_cancion;
        private $titulo;
        private $autor;
        private $duracion;
        private $id_lista;

        public function __construct($id_cancion, $titulo, $autor, $duracion, $id_lista) {
            $this->id_cancion = $id_cancion;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->duracion = $duracion;
            $this->id_lista = $id_lista;
        }

        public function getId(){
            return $this->id_cancion;
        }

        public function getTitulo(){
            return $this->titulo;
        }

        public function getAutor(){
            return $this->autor;
        }

        public function getDuracion(){
            return $this->duracion;
        }

        public function getIdLista(){
            return $this->id_lista;
        }
    }
?>