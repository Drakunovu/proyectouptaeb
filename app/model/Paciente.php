<?php

namespace app\model;

use PDO;
use PDOException;

class Paciente
{
    private $db;

    public function __construct($conexion)
    {
        $this->db = $conexion;
    }

    public function RegistrarPaciente($cedula, $nombre, $apellido, $contraseña, $tipo, $pnf, $fecha_nacimiento, $tlfprincipal, $tlfemergencia, $sexo)
    {
        try {
            if (empty($contraseña)) {
                $contraseña_final = "UptaebMedicos001";
            } else {
                $contraseña_final = $contraseña;
            }

            $contraseña_encriptada = password_hash($contraseña_final, PASSWORD_BCRYPT);

        $sql = "INSERT INTO usuarios (cedula, nombre, apellido, contrasena, tipo, pnf, fecha_nacimiento, tlfprincipal, tlfemergencia, sexo) 
                VALUES (:cedula, :nombre, :apellido, :contrasena, :tipo, :pnf, :fecha_nacimiento, :tlfprincipal, :tlfemergencia, :sexo)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':cedula'           => (int)$cedula, 
            ':nombre'           => trim($nombre),
            ':apellido'         => trim($apellido),
            ':contrasena'       => $contraseña_encriptada,
            ':tipo'             => (int)$tipo,
            ':pnf'              => (int)$pnf,
            ':fecha_nacimiento' => $fecha_nacimiento,
            ':tlfprincipal'     => trim($tlfprincipal),
            ':tlfemergencia'    => trim($tlfemergencia),
            ':sexo'             => (int)$sexo
        ]);

        } catch (PDOException $error) {
            return "Error al registrar paciente: " . $error->getMessage();
        }
    }
}
