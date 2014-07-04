BEGIN TRANSACTION;
CREATE TABLE "reservas" (
	`fecha`	TEXT NOT NULL,
	`modulo`	INTEGER NOT NULL,
	`sala`	INTEGER NOT NULL,
	`eliminada`	INTEGER NOT NULL,
	`id_a`	TEXT NOT NULL,
	`nombre_a`	INTEGER,
	`carrera_a`	INTEGER,
	`confirmada`	INTEGER NOT NULL,
	`estado`	INTEGER NOT NULL,
	`id_e`	TEXT NOT NULL,
	`observacion`	TEXT,
	PRIMARY KEY(fecha,modulo,sala,eliminada)
);
INSERT INTO `reservas` VALUES('17/06/2014',4,2,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('20/06/2014',6,1,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('20/06/2014',2,4,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',4,1,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',2,3,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',2,4,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',4,4,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',5,3,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',3,5,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',1,5,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',5,2,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',7,1,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',4,2,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',6,3,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',7,3,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',1,2,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',3,2,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',3,3,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',4,3,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',1,4,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',3,4,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',1,3,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',2,2,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',6,4,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('13/06/2014',8,2,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',6,2,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',6,1,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',3,1,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',1,1,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',8,3,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',5,4,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',7,4,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',4,5,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',6,5,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',5,5,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('14/06/2014',7,5,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',7,3,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',4,3,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',5,2,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',5,1,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',5,4,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',3,4,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',2,5,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('11/06/2014',5,5,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',2,3,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',4,2,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',4,1,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',6,4,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',7,5,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',2,4,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',7,1,0,4,'Felipe Santiago','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',3,2,0,2,'Karina Andrea','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('10/06/2014',7,4,0,1,'Patricio Sebastian','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',3,2,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',4,2,0,3,'Manuel Eduardo','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('16/06/2014',3,1,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('16/06/2014',4,2,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('16/06/2014',6,1,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('17/06/2014',5,2,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('17/06/2014',3,3,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('17/06/2014',5,3,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('17/06/2014',5,4,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('17/06/2014',3,4,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('12/06/2014',2,1,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('17/06/2014',3,2,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('26/06/2014',3,2,1,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('27/06/2014',3,2,2,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('27/06/2014',2,2,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('27/06/2014',5,2,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('27/06/2014',5,1,6,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('12/06/2014',2,2,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('27/06/2014',5,1,3,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('27/06/2014',5,1,4,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('27/06/2014',5,1,5,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',4,1,2,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',4,2,2,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',3,2,2,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',5,3,2,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',1,3,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('24/06/2014',4,1,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('24/06/2014',4,3,2,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',2,1,2,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',4,3,3,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('30/06/2014',5,2,2,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('24/06/2014',6,3,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('24/06/2014',6,2,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('18/06/2014',5,2,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',2,2,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('18/06/2014',3,4,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('03/07/2014',1,2,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('03/07/2014',1,4,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('01/07/2014',2,1,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('01/07/2014',2,4,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('01/07/2014',4,3,2,1,'','',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('26/06/2014',2,2,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('01/07/2014',4,3,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('01/07/2014',4,2,2,2,'','',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('30/06/2014',5,3,0,1,'Patricio Aravena','Ped. Ed. Fisica',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',3,4,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',7,1,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',4,1,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',5,5,0,3,'Manuel Wilson','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',4,2,0,4,'Felipe Jorquera','Ing. Civil Inf',0,1,'17.159.876-9','Reservada');
INSERT INTO `reservas` VALUES('30/06/2014',2,3,2,2,'Karina Pina','Enfermeria',0,1,'17.159.876-9','Eliminada:   ');
INSERT INTO `reservas` VALUES('30/06/2014',6,2,0,2,'Karina Pina','Enfermeria',0,1,'17.159.876-4','Reservada');
CREATE TABLE "modulos" (
	`id_mod`	INTEGER NOT NULL,
	`h_inicio`	TEXT,
	`h_fin`	TEXT,
	`dimension`	INTEGER,
	PRIMARY KEY(id_mod)
);
INSERT INTO `modulos` VALUES(1,'09:00','10:00',1);
INSERT INTO `modulos` VALUES(2,'10:00','11:00',1);
INSERT INTO `modulos` VALUES(3,'11:00','12:00',1);
INSERT INTO `modulos` VALUES(4,'12:00','13:00',1);
INSERT INTO `modulos` VALUES(5,'13:00','14:00',1);
INSERT INTO `modulos` VALUES(6,'15:00','16:00',1);
INSERT INTO `modulos` VALUES(7,'16:00','17:00',1);
INSERT INTO `modulos` VALUES(8,'17:00','18:00',1);
CREATE TABLE `parametros` (
	`cant_salas`	INTEGER NOT NULL,
	`plazo_para_reservar`	INTEGER NOT NULL,
	`n_reservas_diarias`	INTEGER NOT NULL,
	PRIMARY KEY(cant_salas,plazo_para_reservar,n_reservas_diarias)
);
INSERT INTO `parametros` VALUES(5,48,1);
CREATE TABLE "usuarios" (
	`id_e`	TEXT NOT NULL,
	`loggin`	TEXT NOT NULL,
	`password`	TEXT NOT NULL,
	`estado`	INTEGER NOT NULL,
	`privilegios`	INTEGER,
	PRIMARY KEY(id_e)
);
INSERT INTO `usuarios` VALUES('12.312.312-3','jmanuel','jmanuel',1,1);
INSERT INTO `usuarios` VALUES('12.435.754-2','fandres','fandres',1,1);
INSERT INTO `usuarios` VALUES('10.532.533-7','lfelipe','lfelipe',1,2);
CREATE TABLE "empleados" (
	`id_e`	TEXT NOT NULL,
	`nombres_e`	TEXT NOT NULL,
	`apellidos_e`	TEXT NOT NULL,
	`edad_e`	INTEGER,
	`turno`	TEXT,
	`cargo`	TEXT,
	PRIMARY KEY(id_e)
);
INSERT INTO `empleados` VALUES('12.312.312-3','Juan Manuel','Lillo Peralta',45,'dia','asistente');
INSERT INTO `empleados` VALUES('12.435.754-2','Felipe Andres','Mena Lopez',43,'dia','asistente');
INSERT INTO `empleados` VALUES('10.532.533-7','Luis Felipe','Arancibia Bernal',50,'dia','jefe');
CREATE TABLE "alumnos" (
	`id_a`	TEXT NOT NULL,
	`nombre_a`	TEXT NOT NULL,
	`apellidos_a`	TEXT NOT NULL,
	`edad_a`	INTEGER,
	`carrera`	TEXT NOT NULL,
	`ingreso`	INTEGER NOT NULL,
	`telefono`	TEXT,
	`email`	TEXT,
	PRIMARY KEY(id_a)
);
INSERT INTO `alumnos` VALUES('18.176.879-7','Diego Rafael','Vergara Letelier',21,'Ing. Civil Inf.',2011,566789,'dvergara@mail.cl');
INSERT INTO `alumnos` VALUES('16.858.759-7','Ernesto Andres','Acevedo Aliste',26,'Ing. Civil Inf.',2010,523213,'eacevedo@mail.cl');
INSERT INTO `alumnos` VALUES('12.543.653-7','Felipe Santiago','Jorquera Uribe',22,'Ing. Civil Inf',2011,65345,'fjorquera@mail.cl');
INSERT INTO `alumnos` VALUES('15.234.654-8','Manuel Eduardo','Wilson Hernandez',22,'Ing. Civil Inf',2011,234565,'mwilson@mail.cl');
INSERT INTO `alumnos` VALUES('16.345.234-8','Karina Andrea','Pina Allende',21,'Enfermeria',2011,3453213,'kpina@mail.cl');
INSERT INTO `alumnos` VALUES('12.435.234-9','Patricio Sebastian','Aravena Rojas',20,'Ped. Ed. Fisica',2012,234234,'parvena@mail.cl');
INSERT INTO `alumnos` VALUES(1,'Patricio Sebastian','Aravena Rojas',20,'Ped. Ed. Fisica',2012,234234,'parvena@mail.cl');
INSERT INTO `alumnos` VALUES(2,'Karina Andrea','Pina Allende',21,'Enfermeria',2011,3453213,'kpina@mail.cl');
INSERT INTO `alumnos` VALUES(3,'Manuel Eduardo','Wilson Hernandez',22,'Ing. Civil Inf',2011,234565,'mwilson@mail.cl');
INSERT INTO `alumnos` VALUES(4,'Felipe Santiago','Jorquera Uribe',22,'Ing. Civil Inf',2011,3456789,'fjorquera@mail.cl');
;
;
;
;
;
COMMIT;
