<?php
class Despachos extends Controllers //Aquí se debe llamas igual que el archivo
{
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ".base_url());
        }
        parent::__construct();
    }

    //Aquí se debe llamar igual que la vista
    public function Registro()
    {
        $data1= $this->model->SelectUnidad();
        $this->views->getView($this, "Registro", "", $data1);
    }

    //Aquí se debe llamar igual que la vista
    public function Editar()
    {
        $id = $_GET['id'];
        $data1= $this->model->SelectUnidad();
        $data2 = $this->model->SelectDespacho($id);
    $this->views->getView($this, "Editar", "", $data1, $data2);
    }

    //Actualiza los datos de un Usuario
    public function actualizar()
    {
        $id = $_POST['id'];
        if (isset($_POST['negadas'])) {
            $negadas = 1;
        } else {
            $negadas = 0;
        }
        $unidad = limpiarInput($_POST['unidad']);
        $remision = limpiarInput($_POST['remision']);
        $entrega = limpiarInput($_POST['entrega']);
        $eco = limpiarInput($_POST['eco']);
        $actualizar = $this->model->actualizarDespacho($unidad, $negadas, $remision, $entrega, $eco, $id);     
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
        header("location: " . base_url() . "Despachos/Listar?msg=$alert");
        die();
    }

    //Aquí se debe llamar igual que la vista
    public function Listar()
    {
        $data1= $this->model->SelectUnidad();
        $data2= $this->model->Despachos();
        $this->views->getView($this, "Listar", "", $data1, $data2);
    }

    // Muestra la vista "Registro" con los datos obtenidos de los modelos.
    public function eliminar() {
        $id = $_GET['id'];
        $this->model->eliminar($id);
        $alert = "eliminado";
        header("location: " . base_url() . "Despachos/Listar?msg=$alert");
    }

    public function agregar() {
        if (isset($_POST['negadas'])) {
            $negadas = 1;
        } else {
            $negadas = 0;
        }
        $unidad = limpiarInput($_POST['unidad']);
        $remision = limpiarInput($_POST['remision']);
        $entrega = limpiarInput($_POST['entrega']);
        $eco = limpiarInput($_POST['eco']);
        //$administrador = limpiarInput($_SESSION['id']);          
        $fecha_termina = date("Y-m-d", strtotime("+2 month"));
        
        $name = pathinfo($_FILES["archivo"]["name"]);
        $nombre_archivo = $_FILES["archivo"]["name"];
        $nombre_nuevo = $remision.".".$name["extension"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];
        $ruta_temporal = $_FILES["archivo"]["tmp_name"];
        $error_archivo = $_FILES["archivo"]["error"];
        $tmaximo = 20 * 1024 * 1024;
        if(($tamano_archivo < $tmaximo && $tamano_archivo != 0) && ($name["extension"] == "pdf")){
            if ($error_archivo == UPLOAD_ERR_OK) {
                $ruta_destino = 'Assets/Documentos/Despachos/'.$nombre_nuevo;
                if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                   $insert = $this->model->agregarDespacho($unidad, $negadas, $remision, $entrega, $nombre_nuevo, $fecha_termina, $eco);
                    if ($insert == 'existe') {
                        $alert = 'existe';
                    } else if ($insert > 0) {
                        //Si se agrega te redirige a la vista "General" con un mensaje de alerta.
                        $alert = 'registrado';
                    } else {
                        $alert = 'error';
                    }
                } else {
                   $alert =  'noformato1';
                }
            } else {
            $alert =  'noformato2';
            }
        } else {
            $alert =  'noformato3';
        }
        header("location: " . base_url() . "Despachos/Listar?msg=$alert");
        die();
    }
}
?>