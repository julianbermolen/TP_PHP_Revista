drop database if exists sistema;
create database if not exists sistema;

use sistema;

create table rol(
id_rol char(2) primary key,
descripcion varchar(40)
);

create table provincia(
id_prov char(3) primary key,
nombre varchar(30)
);

create table estado(
id_estado int primary key,
descripcion varchar(10)
/*tipo_usuario que es y a que referencia*/
);

create table usuario(
id_usuario int auto_increment,
/*que es (pic)?*/
email varchar(30) not null,
clave varchar(30) not null,
nombre varchar(50) not null,
cod_rol char(2),
primary key(id_usuario)
);

create table cliente(
id_cliente int primary key,/*es foranea? vincula a usuario?*/
nombre varchar(50) not null,
apellido varchar(50) not null,
calle varchar(60) not null,
numero_calle varchar(6) not null,
descripcion_localidad varchar(50) not null,
cod_prov char(3)
);

create table publicacion(
id_publicacion int,
nombre_publicacion varchar(25),
/*tipo_publicacion*/
primary key(id_publicacion)
);

create table seccion(
id_seccion char(3),
id_publicacion int,
nombre varchar(15),
primary key(id_seccion,id_publicacion)
);

create table articulo(
id_articulo int auto_increment,
titulo varchar(25) not null,
subtitulo varchar(50) not null,
texto text,
id_seccion char(3),
coordenadas varchar(1024),
/*queda una variable que no ubico*/
primary key(id_articulo)
);

create table edicion(
id_edicion int auto_increment,
id_publicacion int,
/*que es identificacion?*/
precio decimal(4,2),
precios decimal(4,2),
tapa varchar(100),
primary key(id_edicion)
);

create table imagen(
id_imagen int auto_increment,
id_articulo int,
path varchar(100),
primary key(id_imagen)
);

create table compra(
id_compra int auto_increment,
id_edicion int,
id_cliente int,
primary key(id_compra)
);

create table suscripcion(
id_suscripcion int auto_increment,
id_cliente int,
inicio date not null,
fin date,
primary key(id_suscripcion)
);
