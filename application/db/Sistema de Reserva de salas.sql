--create database if no exists reservas;

-- TABLAS DE LA BASE DE DATOS INSTITUCIONAL.

/*
drop table if exists parametros;
drop table if exists modulo;
drop table if exists reservas;
drop table if exists usuarios;
drop table if exists alumnos;
drop table if exists empleados;
*/

create table empleados(
	id_e varchar (30) not null,
	nombres_e varchar (40) not null,
	apellidos_e varchar(40) not null,
	edad_e int not null,
	turno date,
	cargo varchar(40),
	constraint id_e_pk primary key (id_e)
);

create table alumnos(
	id_a varchar (30) not null,
	nombre_a varchar (40) not null,
	apellidos_a varchar (40) not null,
	edad_a int not null,
	carrera varchar (30) not null,
	ingreso date not null,
	telefono number,
	email varchar (40)
	constraint id_a_pk primary key (id_a)
);


create table usuarios(
	id_u varchar (30) not null,
	loggin varchar (30) not null,
	password varchar (30) not null,
	estado int not null,
	privilegios int not null,
	constraint id_u_pk primary key (id_u),
	constraint id_u_fk foreign key (id_u) references empleados (id_e)
);

-- TABLAS DE LA BASE DE  DATOS DEL SISTEMA DE RESERVA.

create table reservas(
	fecha date not null,
	modulo int not null,
	sala int not null,
	eliminada int not null, -- No 0 / si > 1, en el caso de que se elimine una sala, el código no se replica para una nueva reserva cuando se borre.
					-- a demás, sabremos cuando se elimine una sala  automáticamente debería pasar a 1 cuando no se confirme, y será 2 cuando se bloquee.
	alumno varchar (30) not null,
	nombre_a varchar (50) not null,
	carrera_a varchar (30) not null,
	confirmada int not null, -- SI 1 / NO 0
	asistente varchar(30) not null,
	estado int not null, -- Activa SI 1/ No 0     No es necesario ya que el estado se puede saber con eliminada
	observación varchar (256), -- o código de observación (00001.txt), en caso de ser texto en almacenado en un ftp
	--cant_alumnos number, --1 a 8
	--plumon_borrador int, -- SI 1 / NO 0
	constraint reservas_pk primary key (fecha, modulo, sala, eliminada),
	constraint reservas_fk_1 foreign key (alumno) references alumnos (id_a),
	constraint reservas_fk_2 foreign key (asistente) references usuarios (id_u),
	constraint reservas_fk_3 foreign key (modulo) references modulos(id_mod)
	);

create table modulos(
	id_mod int not null,
	h_inicio varchar(10) not null,
	h_fin varchar(10) not null,
	dimension int not null,
	constraint modulos_pk primary key (id_mod)
);

create table parametros(
	cant_salas int not null,
	plazo_para_reservar int not null,
	n_reservas_diarias int not null,
	constraint parametros_pk primary key (cant_salas, plazo_para_reservar, n_reservas_diarias)
);