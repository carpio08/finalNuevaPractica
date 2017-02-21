<?php

require_once('AccesoADatos.php'); 


class Material
{
//--------------------------------------------------------------------------------//
    private $nombre;
    private $codigo;
    private $precio;
    private $tipo;
 
//--------------------------------------------------------------------------------//
//--GETTERS Y SETTERS
    
    public function GetNombre()
    {
        return $this->nombre;
    }
    public function GetCodigo()
    {
        return $this->codigo;
    }
    public function GetPrecio()
    {
        return $this->precio;
    }
     public function GetTipo()
    {
        return $this->tipo;
    }
    
    public function SetNombre($valor)
    {
        $this->nombre = $valor;
    }
    public function SetCodigo($valor)
    {
        $this->codigo = $valor;
    }
    public function SetPrecio($valor)
    {
        $this->precio = $valor;
    }
    public function SetTipo($valor)
    {
        $this->tipo = $valor;
    }

    public function __construct()
    {
       
    }

    public function InsertarMaterial(){
        try{
            $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDatos->RetornarConsulta("INSERT into materiales (nombre,precio,tipo)values(:nombre,:precio,:tipo)");
             $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);       
            $consulta->execute();
            return "OK";
        }catch(Exception $e){
            return $e;
        }        
    }

    public function ModificarMaterial(){
         try{
            $objetoAccesoDatos = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta = $objetoAccesoDatos->RetornarConsulta("UPDATE materiales set nombre=:nombre, precio=:precio, tipo=:tipo where codigo=:codigo");
            $consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);
            $consulta->bindValue(':nombre', $this->nombre, PDO::PARAM_STR);
            $consulta->bindValue(':precio', $this->precio, PDO::PARAM_INT);
            $consulta->bindValue(':tipo', $this->tipo, PDO::PARAM_STR);       
            $consulta->execute();
            return "OK";
        }catch(Exception $e){
            return $e;
        }       
    }

    public static function BorrarMaterial($codigo)
     {
            $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("DELETE from materiales WHERE codigo=:codigo"); 
            $consulta->bindValue(':codigo',$codigo, PDO::PARAM_INT);      
            $consulta->execute();
            return "OK";
     }

    public function TraerUnMaterial() 
     {   
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT codigo, precio, tipo, nombre from materiales WHERE codigo=:codigo");
        $consulta->bindValue(':codigo', $this->codigo, PDO::PARAM_INT);  
        $consulta->execute();
        $material = $consulta->fetchObject('Material');
        return $this->toString($material);        
    }

     public static function TraerTodosLosMateriales() 
    {   
        $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
        $consulta =$objetoAccesoDato->RetornarConsulta("SELECT codigo, precio, tipo, nombre from materiales");
        $consulta->execute();           
        return $consulta->fetchAll(PDO::FETCH_CLASS, "Material");               
    }

    private function toString($obj){
        return $obj->codigo.",".$obj->nombre.",".$obj->precio.",".$obj->tipo;
    }




}