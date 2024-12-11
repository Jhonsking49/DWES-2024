<?php

class AsignacionModel
{
    private $id;
    private $alumno_id;
    private $empresa_id;
    private $fecha_inicio;
    private $fecha_fin;
    private $tutor_id;

    public function __construct($id, $alumno_id, $empresa_id, $fecha_inicio, $fecha_fin, $tutor_id)
    {
        $this->id = $id;
        $this->alumno_id = $alumno_id;
        $this->empresa_id = $empresa_id;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->tutor_id = $tutor_id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAlumnoId()
    {
        return $this->alumno_id;
    }

    public function getEmpresaId()
    {
        return $this->empresa_id;
    }

    public function getFechaInicio()
    {
        return $this->fecha_inicio;
    }

    public function getFechaFin()
    {
        return $this->fecha_fin;
    }

    public function getTutorId()
    {
        return $this->tutor_id;
    }
}