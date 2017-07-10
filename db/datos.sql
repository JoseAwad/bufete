delete from usuarios where rutNumero = 11111111;

insert into usuarios (rutNumero, nombreCompleto, fechaIncorporacion, tipoUsuario, perfil, clave)
values (11111111, 'Jose', NOW(), 'N', 'ADMINISTRADOR', '$2y$10$wE4.M2bzuOPj8X3nXTOKYetevujc1ZheuLT3Qz/G1JYg2lIqryl4a');

insert into usuarios (rutNumero, nombreCompleto, fechaIncorporacion, tipoUsuario, perfil, clave)
values (22222222, 'Pedro', NOW(), 'N', 'GERENTE', '$2y$10$wE4.M2bzuOPj8X3nXTOKYetevujc1ZheuLT3Qz/G1JYg2lIqryl4a');

insert into usuarios (rutNumero, nombreCompleto, fechaIncorporacion, tipoUsuario, perfil, clave)
values (33333333, 'Maria', NOW(), 'N', 'SECRETARIA', '$2y$10$wE4.M2bzuOPj8X3nXTOKYetevujc1ZheuLT3Qz/G1JYg2lIqryl4a');

insert into usuarios (rutNumero, nombreCompleto, fechaIncorporacion, tipoUsuario, perfil, clave)
values (44444444, 'Andres', NOW(), 'N', 'CLIENTE', '$2y$10$wE4.M2bzuOPj8X3nXTOKYetevujc1ZheuLT3Qz/G1JYg2lIqryl4a');


delete from especialidades;

insert into especialidades (nombre) values('Accidentes de Tráfico');
insert into especialidades (nombre) values('Administrativo');
insert into especialidades (nombre) values('Adopciones');
insert into especialidades (nombre) values('Agrario');
insert into especialidades (nombre) values('Blanqueo de capitales');
insert into especialidades (nombre) values('Civil');
insert into especialidades (nombre) values('Comunidad de Propietarios');
insert into especialidades (nombre) values('Comunitario');
insert into especialidades (nombre) values('Concursal');
insert into especialidades (nombre) values('Constitucional');
insert into especialidades (nombre) values('Consumidores y Usuarios');
insert into especialidades (nombre) values('Delitos contra el honor');
insert into especialidades (nombre) values('Delitos contra el patrimonio');
insert into especialidades (nombre) values('Delitos contra la intimidad');
insert into especialidades (nombre) values('Delitos contra la seguridad vial');
insert into especialidades (nombre) values('Delitos de amenazas');
insert into especialidades (nombre) values('Delitos de calumnias e injurias');
insert into especialidades (nombre) values('Delitos de daños');
insert into especialidades (nombre) values('Delitos de descubrimiento y revelación de secretos');
insert into especialidades (nombre) values('Delitos propiedad intelectual');
insert into especialidades (nombre) values('Estafas');
insert into especialidades (nombre) values('extranjería');
insert into especialidades (nombre) values('Familia');
insert into especialidades (nombre) values('Fiscal');
insert into especialidades (nombre) values('Hereditario');
insert into especialidades (nombre) values('Internet');
insert into especialidades (nombre) values('Laboral');
insert into especialidades (nombre) values('LOPD');
insert into especialidades (nombre) values('Mercantil');
insert into especialidades (nombre) values('Penal');
insert into especialidades (nombre) values('Propiedad Intelectual');
insert into especialidades (nombre) values('Reputación online');
insert into especialidades (nombre) values('Urbanismo');