<?php
$inputs = isset($_SESSION['inputs']) ? $_SESSION['inputs'] : [];

unset($_SESSION['inputs']);

$msg = isset($_GET['msg']) ? htmlspecialchars($_GET['msg']) : '';
$status = isset($_GET['status']) ? $_GET['status'] : '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGSU - Registro de Pacientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📋 Formulario de Registro de Usuarios / Pacientes</h4>
                </div>
                <div class="card-body">

                    <?php if (!empty($status) && !empty($msg)): ?>
                        <?php 
                            $claseAlert = ($status === 'success') ? 'alert-success' : 'alert-danger';
                            $titulo = ($status === 'success') ? '¡Registro Exitoso!' : '¡Atención!';
                        ?>
                        <div class="alert <?php echo $claseAlert; ?> alert-dismissible fade show d-flex align-items-center shadow-sm mb-4" role="alert">
                            <div>
                                <strong><?php echo $titulo; ?></strong> <?php echo $msg; ?>
                            </div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>
                    <form action="index.php" method="POST">
                        
                        <input type="hidden" name="form" value="registro_paciente">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="cedula" class="form-label font-weight-bold">Cédula de Identidad</label>
                                <input type="number" class="form-control" id="cedula" name="cedula" 
                                       value="<?php echo isset($inputs['cedula']) ? $inputs['cedula'] : ''; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tipo" class="form-label">Tipo de Usuario</label>
                                <select class="form-select" id="tipo" name="tipo" required>
                                    <?php $t = isset($inputs['tipo']) ? $inputs['tipo'] : ''; ?>
                                    <option value="" <?php echo ($t === '') ? 'selected' : ''; ?> disabled>Seleccione...</option>
                                    <option value="0" <?php echo ($t === '0') ? 'selected' : ''; ?>>Estudiante / Paciente</option>
                                    <option value="1" <?php echo ($t === '1') ? 'selected' : ''; ?>>Enfermero</option>
                                    <option value="2" <?php echo ($t === '2') ? 'selected' : ''; ?>>Médico</option>
                                    <option value="3" <?php echo ($t === '3') ? 'selected' : ''; ?>>Director / Autoridad</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nombre" class="form-label">Nombres</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" 
                                       value="<?php echo isset($inputs['nombre']) ? $inputs['nombre'] : ''; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="apellido" class="form-label">Apellidos</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" 
                                       value="<?php echo isset($inputs['apellido']) ? $inputs['apellido'] : ''; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="pnf" class="form-label">PNF (Área académica)</label>
                                <select class="form-select" id="pnf" name="pnf" required>
                                    <?php $p = isset($inputs['pnf']) ? $inputs['pnf'] : ''; ?>
                                    <option value="" <?php echo ($p === '') ? 'selected' : ''; ?> disabled>Seleccione PNF...</option>
                                    <option value="1" <?php echo ($p === '1') ? 'selected' : ''; ?>>Informática</option>
                                    <option value="2" <?php echo ($p === '2') ? 'selected' : ''; ?>>Administración</option>
                                    <option value="3" <?php echo ($p === '3') ? 'selected' : ''; ?>>Higiene y Seguridad</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" 
                                       value="<?php echo isset($inputs['fecha_nacimiento']) ? $inputs['fecha_nacimiento'] : ''; ?>" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tlfprincipal" class="form-label">Teléfono Principal</label>
                                <input type="text" class="form-control" id="tlfprincipal" name="tlfprincipal" 
                                       value="<?php echo isset($inputs['tlfprincipal']) ? $inputs['tlfprincipal'] : ''; ?>" required>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="tlfemergencia" class="form-label">Contacto de Emergencia</label>
                                <input type="text" class="form-control" id="tlfemergencia" name="tlfemergencia" 
                                       value="<?php echo isset($inputs['tlfemergencia']) ? $inputs['tlfemergencia'] : ''; ?>" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label d-block">Sexo</label>
                            <?php $s = isset($inputs['sexo']) ? $inputs['sexo'] : ''; ?>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_m" value="1" <?php echo ($s === '1') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="sexo_m">Masculino</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="sexo" id="sexo_f" value="2" <?php echo ($s === '2') ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="sexo_f">Femenino</label>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between">
                            <button type="reset" class="btn btn-secondary">Limpiar Formulario</button>
                            <button type="submit" class="btn btn-success px-4">Guardar en Sistema 🚀</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>