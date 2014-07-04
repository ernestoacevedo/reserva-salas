create table alumnos (
    id_a varchar(30) not null,
    nombre_a varchar(40) not null,
    apellidos_a varchar(40) not null,
    edad_a int not null,
    carrera varchar(30) not null,
    ingreso date not null,
    telefono int,
    email varchar(40),
    constraint id_a_pk primary key (id_a)
);


create table usuarios(
	id_u varchar (40) not null,
	loggin varchar (40) not null,
	password varchar (40) not null,
	estado int not null,
	privilegios int not null,
	constraint id_u_pk primary key (id_u),
	constraint id_u_fk foreign key (id_u) references empleados (id_e)
);


create table reservas(
	fecha date not null,
	modulo int not null,
	sala int not null,
	eliminada int not null,
	alumno varchar (40) not null,
	nombre_a varchar (50) not null,
	carrera_a varchar (40) not null,
	confirmada int not null, 
	asistente varchar(30) not null,
	estado int not null, 
	observación varchar (256),
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