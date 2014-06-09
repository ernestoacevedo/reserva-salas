BEGIN TRANSACTION;
/*DROP TABLE 	"empleados";
DROP TABLE "alumnos";
DROP TABLE "usuarios";
DROP TABLE "reservas";*/
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
CREATE TABLE "empleados" (
	`id_e`	TEXT NOT NULL,
	`nombres_e`	TEXT NOT NULL,
	`apellidos_e`	TEXT NOT NULL,
	`edad_e`	INTEGER,
	`turno`	TEXT,
	`cargo`	TEXT,
	PRIMARY KEY(id_e)
);
CREATE TABLE "usuarios" (
	`id_e`	TEXT NOT NULL FOREIGN KEY REFERENCES "empleados"(id_e),
	`loggin`	TEXT NOT NULL,
	`password`	TEXT NOT NULL,
	`estado`	INTEGER NOT NULL,
	`privilegios`	INTEGER,
	PRIMARY KEY(id_e),
	FOREIGN KEY(id_e) REFERENCES empleados(id_e)
);
CREATE TABLE "reservas" (
	`fecha`	TEXT NOT NULL,
	`modulo`	INTEGER NOT NULL,
	`sala`	INTEGER NOT NULL,
	`eliminada`	INTEGER NOT NULL,
	`id_a`	TEXT NOT NULL,
	`confirmada`	INTEGER NOT NULL,
	`estado`	INTEGER NOT NULL,
	`id_e`	TEXT NOT NULL,
	`observacion`	TEXT,
	PRIMARY KEY(fecha,modulo,sala,eliminada),
	FOREIGN KEY(id_e) REFERENCES usuarios(id_e),
	FOREIGN KEY(id_a) REFERENCES alumnos(id_a)
);
INSERT INTO `empleados` VALUES('12.312.312-3','Juan Manuel
','Lillo Peralta',45,'dia','asistente');
INSERT INTO `empleados` VALUES('12.435.754-2','Felipe Andres','Mena Lopez',43,'dia','asistente');
INSERT INTO `empleados` VALUES('10.532.533-7','Luis Felipe','Arancibia Bernal',50,'dia','jefe');
INSERT INTO `usuarios` VALUES('12.312.312-3','jmanuel','jmanuel',1,1);
INSERT INTO `usuarios` VALUES('12.435.754-2','fandres','fandres',1,1);
INSERT INTO `usuarios` VALUES('10.532.533-7','lfelipe','lfelipe',1,2);
INSERT INTO `alumnos` VALUES('18.176.879-7','Diego Rafael','Vergara Letelier',21,'Ing. Civil Inf.',2011,566789,'dvergara@mail.cl');
INSERT INTO `alumnos` VALUES('17.345.534-9','Ernesto Andres','Acevedo Aliste',25,'Ing. Civil Inf.',2010,523213,'eacevedo@mail.cl');
INSERT INTO `alumnos` VALUES('12.543.653-7','Felipe Santiago','Jorquera Uribe',22,'Ing. Civil Inf',2011,65345,'fjorquera@mail.cl');
INSERT INTO `alumnos` VALUES('15.234.654-8','Manuel Eduardo','Wilson Hernandez',22,'Ing. Civil Inf',2011,234565,'mwilson@mail.cl');
INSERT INTO `alumnos` VALUES('16.345.234-8','Karina Andrea','Pina Allende',21,'Enfermeria',2011,3453213,'kpina@mail.cl');
INSERT INTO `alumnos` VALUES('12.435.234-9','Patricio Sebastian','Aravena Rojas',20,'Ped. Ed. Fisica',2012,234234,'parvena@mail.cl');
INSERT INTO `reservas` VALUES('04-06-2014',1,2,0,'18.176.879-7',1,0,'12.312.312-3','nada');
INSERT INTO `reservas` VALUES('04-06-2014',1,1,0,'18.176.879-7',0,0,'12.312.312-3','nada');
;
;
;
;
COMMIT;
