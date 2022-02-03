<?php 
class BD {
    private $Server;
    private $User;
    private $Password;
    private $DataBase;
    private $Conexion;
    private $ResultadoQuery;

    public function __construct(){
        $this->Server = "Demostración";
        $this->User = "Datos";
        $this->Password = "No";
        $this->DataBase = "Visibles";
    }

    protected function Conectar(){
        @$this->Conexion = mysqli_connect($this->Server, $this->User, $this->Password, $this->DataBase) or die("<br><br>No se puede establecer conexión");
        return $this->Conexion;
    }

    protected function CerrarConexion(){
        return mysqli_close($this->Conexion);
    }

    public function EjecutarQuery($paCadena){
        $this->ResultadoQuery = mysqli_query($this->Conectar(), $paCadena) or die ("Error en consulta <br>" . mysqli_error($this->Conexion) );
        $this->CerrarConexion();
        return $this->ResultadoQuery;
    }
}
