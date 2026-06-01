<?php
namespace app\controller;

use app\model\Paciente;
use Exception;

class PacienteController {
    private $db;

    public function __construct($conexion){
        $this->db = $conexion;
    }
      
    public function Registrar() {
        try {
            $cedula           = isset($_POST['cedula']) ? trim($_POST['cedula']) : '';
            $nombre           = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
            $apellido         = isset($_POST['apellido']) ? trim($_POST['apellido']) : '';
            $tipo             = isset($_POST['tipo']) ? $_POST['tipo'] : '';
            $pnf              = isset($_POST['pnf']) ? $_POST['pnf'] : '';
            $fecha_nacimiento = isset($_POST['fecha_nacimiento']) ? $_POST['fecha_nacimiento'] : '';
            $tlfprincipal     = isset($_POST['tlfprincipal']) ? trim($_POST['tlfprincipal']) : '';
            $tlfemergencia    = isset($_POST['tlfemergencia']) ? trim($_POST['tlfemergencia']) : '';
            $sexo             = isset($_POST['sexo']) ? $_POST['sexo'] : '';

            $modeloPaciente = new Paciente($this->db);
            
            $resultado = $modeloPaciente->registrarPaciente(
            $cedula, $nombre, $apellido, $tipo, $pnf, $fecha_nacimiento, $tlfprincipal, $tlfemergencia, $sexo
            );

            if ($resultado === true) {
                unset($_SESSION['inputs']);
                $mensajeExito = "¡Paciente registrado de manera exitosa!";
                header("Location: index.php?ruta=registrar&status=success&msg=" . urlencode($mensajeExito));
                exit();
            } else {
                throw new Exception($resultado);
            }

        } catch (Exception $e) {
            $_SESSION['inputs'] = $_POST;
            header("Location: index.php?ruta=registrar&status=error&msg=" . urlencode($e->getMessage()));
            exit();
        }
    }
}
?>