
-- TABLAS DE LA BASE DE DATOS INSTITUCIONAL.

create table empleados(
	id_e varchar (30),
	nombres_e varchar (40),
	apellidos_e varchar(40),
	edad_e int,
	turno date,
	cargo varchar(40),
	constraint id_e_pk primary key (id_e)
);

create table alumnos(
	id_a varchar (30),
	nombre_a varchar (40),
	apellidos_a varchar (40),
	edad_a int,
	carrera varchar (30),
	ingreso date,
	telefono number,
	email varchar (40)
	constraint id_a_pk primary key (id_a)
);


create table usuarios(
	id_u varchar (30),
	loggin varchar (30),
	password varchar (30),
	estado int,
	privilegios int,
	constraint id_u_pk primary key (id_u),
	constraint id_u_fk foreign key (id_u) references empleados (id_e)
);

-- TABLAS DE LA BASE DE  DATOS DEL SISTEMA DE RESERVA.

create table reservas(
	fecha date,
	modulo int,
	sala int,
	eliminada int, -- No 0 / si > 1, en el caso de que se elimine una sala, el código no se replica para una nueva reserva cuando se borre.
					-- a demás, sabremos cuando se elimine una sala  automáticamente debería pasar a 1 cuando no se confirme, y será 2 cuando se bloquee.
	alumno varchar (30),
	confirmada int, -- SI 1 / NO 0
	asistente varchar(30),
	estado int, -- Activa SI 1/ No 0     No es necesario ya que el estado se puede saber con eliminada
	observación varchar (256), -- o código de observación (00001.txt), en caso de ser texto en almacenado en un ftp
	--cant_alumnos number, --1 a 8
	--plumon_borrador int, -- SI 1 / NO 0
	constraint reservas_pk primary key (fecha, modulo, sala, eliminada),
	constraint reservas_fk_1 foreign key (alumno) references alumnos (id_a),
	constraint reservas_fk_2 foreign key (asistente) references usuarios (id_u),
	constraint reservas_fk_3 foreign key (modulo) references modulos(id_mod)
	);

create table modulos(
	id_mod int,
	h_inicio varchar(10),
	h_fin varchar(10),
	dimension int,
	constraint modulos_pk primary key (id_mod)
);

create table parametros(
	cant_salas int,
	plazo_para_reservar int,
	n_reservas_diarias int,
	constraint modulos_pk primary key (cant_salas, plazo_para_reservar, n_reservas_diarias)
);