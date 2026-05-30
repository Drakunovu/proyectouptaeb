CREATE DATABASE servicio_medico;

CREATE TABLE usuarios (
    cedula INT NOT NULL,
    nombre TEXT NOT NULL,
    apellido TEXT NOT NULL,
    contrasena VARCHAR(255) NOT NULL DEFAULT 'UptaebMedicos001',
    tipo TINYINT NOT NULL,
    pnf TINYINT,
    fecha_nacimiento DATE NOT NULL,
    tlfprincipal VARCHAR(20) NOT NULL,
    tlfemergencia VARCHAR(20) NOT NULL,
    rol TINYINT NOT NULL,
    sexo TINYINT NOT NULL,
    fecha_creacion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (cedula)
) ENGINE=InnoDB;

CREATE TABLE lista_patologias (
    codigo_icd VARCHAR(10) NOT NULL,
    patologia TEXT NOT NULL,
    PRIMARY KEY (codigo_icd)
) ENGINE=InnoDB;

CREATE TABLE lista_condiciones (
    id INT NOT NULL AUTO_INCREMENT,
    condicion TEXT NOT NULL,
    PRIMARY KEY (id)
) ENGINE=InnoDB;


CREATE TABLE consulta_medica (
    id INT NOT NULL AUTO_INCREMENT,
    id_usuario INT NOT NULL,
    id_medico INT NOT NULL,
    motivo_de_visita TEXT NOT NULL,
    observaciones TEXT NOT NULL,
    fecha TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    CONSTRAINT fk_consulta_usuario FOREIGN KEY (id_usuario) REFERENCES usuarios(cedula) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_consulta_medico FOREIGN KEY (id_medico) REFERENCES usuarios(cedula) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE diagnosticos_consulta (
    id_consulta INT NOT NULL,
    codigo_icd_diagnostico VARCHAR(10) NOT NULL,
    PRIMARY KEY (id_consulta),
    CONSTRAINT fk_diag_consulta FOREIGN KEY (id_consulta) REFERENCES consulta_medica(id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_diag_patologia FOREIGN KEY (codigo_icd_diagnostico) REFERENCES lista_patologias(codigo_icd) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE sintomas_consulta (
    id INT NOT NULL AUTO_INCREMENT,
    id_consulta INT NOT NULL,
    sintoma TEXT NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT fk_sintomas_consulta FOREIGN KEY (id_consulta) REFERENCES consulta_medica(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;


CREATE TABLE patologias_usuarios (
    cedula_usuario INT NOT NULL,
    codigo_icd VARCHAR(10) NOT NULL,
    PRIMARY KEY (cedula_usuario, codigo_icd),
    CONSTRAINT fk_pat_user_usuario FOREIGN KEY (cedula_usuario) REFERENCES usuarios(cedula) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_pat_user_patologia FOREIGN KEY (codigo_icd) REFERENCES lista_patologias(codigo_icd) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE condiciones_usuarios (
    cedula_usuario INT NOT NULL,
    id_condicion INT NOT NULL,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (cedula_usuario, id_condicion),
    CONSTRAINT fk_cond_user_usuario FOREIGN KEY (cedula_usuario) REFERENCES usuarios(cedula) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT fk_cond_user_condicion FOREIGN KEY (id_condicion) REFERENCES lista_condiciones(id) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;