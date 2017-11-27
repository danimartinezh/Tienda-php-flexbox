drop schema shop;
create schema shop;

use shop;

create table if not exists tbl_genre(
    nom int(1) primary key,
    description longtext
    /*constraint fk_genre
    foreign key (nom) references tbl_usuari (genre)
		on delete no action
        on update cascade*/
)engine=innoDB;
insert into tbl_genre(nom,description) VALUES(0,'Hombre'),(1,'Mujer'),(2,'Otros');

create table if not exists tbl_tipusUsuari(
    nom int(1) primary key,
    description longtext
)engine=innodb;
insert into tbl_tipusUsuari(nom,description) VALUES(0,'Administrador'),(1,'Customer');

create table if not exists tbl_usuaris (
	nom varchar(20),
    tipus int(1),		-- Tipus d'usuari
    cognom varchar(30),
    mail varchar(50),
    username varchar(20) primary key,
    passwd nvarchar(30),
    pobl varchar(30),
    country varchar(30),
    birthdate date,
    fecharegistro date,
    genre int(1),
    constraint fk_usuarigenre
    foreign key(genre) references tbl_genre(nom)
		on delete no action
        on update cascade,
        
	constraint fk_tipususuari
    foreign key(tipus) references tbl_tipusUsuari(nom)
		on delete no action
        on update cascade
)engine=innoDB;
insert into tbl_usuaris VALUES('Dani',0,'Martínez Hernandez','dmartinezh97@gmail.com','dmartinezh','123456789','Barcelona','Granollers','1997-10-31',date(now()),0);

create table if not exists tbl_categoria(
    nom varchar(30) primary key,
    description longtext
)engine=innodb;
select * from tbl_categoria order by nom ASC;
delete from tbl_categoria where nom like 'a%';

INSERT INTO tbl_categoria (nom,description) VALUES
('Categoria 1', 'Productos sobre categoria 1'),('Categoria 2', 'Productos sobre categoria 2'),('Categoria 3', 'Productos sobre categoria 3')
,('Categoria 4', 'Productos sobre categoria 4'),('Categoria 5', 'Productos sobre categoria 5'),('Categoria 6', 'Productos sobre categoria 6')
,('Categoria 7', 'Productos sobre categoria 7'),('Categoria 8', 'Productos sobre categoria 8'),('Categoria 9', 'Productos sobre categoria 9');

create table if not exists tbl_marca(
	nom varchar(30) primary key,
    description longtext
)engine=innodb;
select * from tbl_marca;
INSERT INTO tbl_marca (nom,description) VALUES ('MarcaPrueba','DescripcionPrueba');

create table if not exists tbl_product(
	ID int(5) primary key,
    nom varchar(30),
    image blob,
    precio decimal,
    cost decimal,
    category varchar(30),
    dte decimal,
    stock int(10),
    description longtext,
    marca varchar(30),
    
    constraint fk_categoriaProduct
    foreign key(category) references tbl_categoria(nom)
		on delete no action
        on update cascade,
        
	constraint fk_preducte_marca
    foreign key(marca) references tbl_marca(nom)
		on delete no action
        on update cascade
)engine=innodb;

select * from tbl_product;
INSERT INTO tbl_product (ID,nom,image,precio,cost,category,dte,stock,description,marca) VALUES (0,'Pelota','URL',199,200,'Categoria 1',0,77,'Descripcion larga xd','MarcaPrueba');
INSERT INTO tbl_product (ID,nom,image,precio,cost,category,dte,stock,description,marca) VALUES (1,'Pelota','URL',199,200,'Categoria 1',0,77,'Descripcion larga xd','MarcaPrueba');
INSERT INTO tbl_product (ID,nom,image,precio,cost,category,dte,stock,description,marca) VALUES (2,'Pelota','URL',199,200,'Categoria 1',0,77,'Descripcion larga xd','MarcaPrueba');
INSERT INTO tbl_product (ID,nom,image,precio,cost,category,dte,stock,description,marca) VALUES (3,'Pelota','URL',199,200,'Categoria 1',0,77,'Descripcion larga xd','MarcaPrueba');

select max(id) from tbl_product;

create table if not exists tbl_orderHeader(
	usuari varchar(20) not null,
    fechaPedido date,
    numPedido int(3) primary key,
    importeTotal decimal,
    
    constraint fk_orderUsuari 
    foreign key(usuari) references tbl_usuaris(username)
		on delete no action
        on update cascade
)engine=innodb;

create table if not exists tbl_orderLine(
	idPedido int(3),
    idProduct int(5),
    qtt decimal,
    price decimal,
    totalPrice decimal,
    descripcion longtext,
    primary key (idPedido, idProduct),
    
    constraint fk_order_HeaderLine foreign key(idPedido)
    references tbl_orderHeader (numPedido)
)engine=innodb;




/*
FUNCIONES
*/
