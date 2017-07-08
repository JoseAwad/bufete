create table usuarios(
    id int not null AUTO_INCREMENT,
    rutNumero int(11) not null,
    nombreCompleto varchar(100) not null,
    fechaIncorporacion date not null,
    tipoUsuario varchar(50) not null,
    direccion varchar(255) ,
    telefonoCelular varchar(12),
    telefonoFijo varchar(12),
    perfil varchar(14) not null,
    clave varchar(255) not null,
    PRIMARY KEY (id)
);

create table abogados(
    id int not null AUTO_INCREMENT,
    rutNumero int(11) not null,
    nombreCompleto varchar(100) not null,
    fechaContratacion date not null,
    valorHora int(11) not null,
    PRIMARY KEY (id) 
);

create table especialidades(
    id int not null AUTO_INCREMENT,
    nombre varchar(50) not null,
    PRIMARY KEY (id)
);

create table abogadosEspecialidades(
    id int not null AUTO_INCREMENT,
    idAbogados int(11) not null,
    idEspecialidades int(11) not null,
    PRIMARY KEY (id),
    FOREIGN KEY (idAbogados) REFERENCES abogados(id),
    FOREIGN KEY (idEspecialidades) REFERENCES especialidades(id)
);

create table atenciones(
    id int not null AUTO_INCREMENT,
    fechaHora dateTime not null,
    idAbogados int(11) not null,
    idUsuarios int(11) not null,
    estado varchar(14) not null,
    PRIMARY KEY (id),
    FOREIGN KEY (idAbogados) REFERENCES abogados(id),
    FOREIGN KEY (idUsuarios) REFERENCES usuarios(id)
);