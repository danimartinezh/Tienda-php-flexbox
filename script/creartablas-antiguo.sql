drop schema if exists shop;
create schema if not exists shop;

use shop;

create table if not exists tbl_genre(
    nom varchar(10) primary key
    /*constraint fk_genre
    foreign key (nom) references tbl_usuari (genre)
		on delete no action
        on update cascade*/
)engine=innoDB;

create table if not exists tbl_tipusUsuari(
    nom varchar(20) primary key,
    description longtext
)engine=innodb;

create table if not exists tbl_usuaris (
	nom varchar(20),
    tipus varchar(20),		-- Tipus d'usuari
    cognom varchar(30),
    mail varchar(50),
    username varchar(20) primary key,
    passwd nvarchar(30),
    pobl varchar(30),
    country varchar(30),
    birthdate date,
    fecharegistro date,
    genre varchar(10),
    constraint fk_usuarigenre
    foreign key(genre) references tbl_genre(nom)
		on delete no action
        on update cascade,
        
	constraint fk_tipususuari
    foreign key(tipus) references tbl_tipusUsuari(nom)
		on delete no action
        on update cascade
)engine=innoDB;

create table if not exists tbl_categoria(
    nom varchar(30) primary key,
    description longtext
)engine=innodb;

create table if not exists tbl_product(
	ID int(5),
    nom varchar(30),
    image blob,
    precio decimal,
    cost decimal,
    category varchar(30),
    dte decimal,
    stock int(10),
    description longtext,
    marca_id int(2),
    
    constraint fk_categoriaProduct
    foreign key(category) references tbl_categoria(nom)
		on delete no action
        on update cascade
)engine=innodb;

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

select now();

select * from tbl_usuaris;

INSERT INTO tbl_genre(nom) VALUES('Hombre');
INSERT INTO tbl_genre(nom) VALUES('Mujer');
INSERT INTO tbl_usuaris(nom,tipus,cognom,mail,username,passwd,pobl,country,birthdate,fecharegistro,genre) VALUES('Dani',0,'martinez hernandez','adads@gmail.com','dmadsa','asdadaa12','sadaada','asdsaad','2017-11-01',now(),'Mujer');