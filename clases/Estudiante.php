<?php
include_once('Conexion.php');

class Estudiante{

  //Atributos
  private $id;
  private $cedula;
  private $nombre;
  private $apellido;
  private $telefono;
  private $edad;
  private $promedio;
  private $fecha;
  private $con;

  //Metodos
  public function __construct(){
    $this->con=new Conexion();
  }
  public function set($atributo,$contenido)
  {
    $this->$atributo=$contenido;
  }
  public function get($atributo)
  {
    return $this->$atributo;
  }

  public function listar(){
    $sql="SELECT * FROM estudiantes";
    $resultado=$this->con->consultaRetorno($sql);
    return $resultado;
  }


  public function crear(){
    $sql2="SELECT * FROM estudiantes where cedula='{$this->cedula}'";
    $resultado=$this->con->consultaRetorno();
    $num=mysqli_num_rows($resultado);
    if($num!=0)
    {
      return false;
    }
    else {
      $sql="INSERT INTO estudiantes (cedula,nombre,apellido,telefono,edad,promedio,fecha) VALUES ('{$this->cedula}','{$this->$nombre}','{$thia->$apellido}','{$this->telefono}','{$this->edad}','{$this->promedio}'.NOW())";
      $this->con->consultaSimple($sql);
    }
  }

  public function eliminar(){
    $sql="DELETE * FROM estudiantes where id='{$this->id}' ";
    $this->con->consultaSimple();
  }

  public function ver()
  {
    $sql="SELECT * FROM estudiantes where id='{$this->id}' LIMIT 1";
    $resultado=$this->con->consultaRetorno($sql);
    $row=mysql_fetch_assoc($resultado);

    //Set

    $this->id=$row['id'];
    $this->cedula=$row['cedula'];
    $this->nombre=$row['nombre'];
    $this->apellido=$row['apellido'];
    $this->telefono=$row['telefono'];
    $this->edad=$row['edad'];
    $this->promedio=$row['promedio'];
    $this->fecha=$row['fecha'];
  }

  public function editar(){
    $sql="UPDATE estudiantes SET nombre='{$this->nombre}',apellido='{$this->apellido}',telefono='{$this->telefono}',edad='{$this->edad}',promedio='{$this->promedio}' WHERE id='{$this->id}'";
    $this->con->consultaSimple($sql);
  }

}

 ?>
