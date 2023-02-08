create database takalo;
use takalo;




create table utilisateur(
    id int auto_increment primary key,
    mail varchar(30),
    mdp varchar(20),
    contact varchar(10)
);

create table admin(
    id int auto_increment primary key,
    mail varchar(20),
    mdp varchar(20)
);

create table categorie(
    id int auto_increment primary key,
    nom varchar(20)
);

create table objet(
    id int auto_increment primary key,
    nom varchar(20),
    description varchar(30),
    prixestimatif float,
    idutilisateur int,
    idcategorie int,
    foreign key (idutilisateur) references utilisateur(id),
    foreign key (idcategorie) references categorie(id)
);

create table photo(
    id int auto_increment primary key,
    idobjet int,
    path varchar(30),
    foreign key (idobjet) references objet(id) 
);

create table proposition(
    id int auto_increment primary key,
    idutilisateur1 int,
    idobjet1 int,
    idobjet2 int,
    idutilisateur2 int,
    etat int,
    dateprop timestamp,
    marge float,
    signe varchar(3),
    foreign key (idutilisateur1) references utilisateur(id),
    foreign key (idutilisateur2) references utilisateur(id),
    foreign key (idobjet1) references objet(id),
    foreign key (idobjet2) references objet(id)
);







///////////

create table historique(
    id int auto_increment primary key,
    idobjet int,
    idutilisateur int,
    datehisto timestamp,
    foreign key (idutilisateur) references utilisateur(id),
    foreign key (idobjet) references objet(id)
);

--views:

--view pour afficher les details d'echange:
create view view_detail1 as select proposition.id as id,idutilisateur1,idobjet1,objet.nom as nom1,idobjet2,idutilisateur2,etat,dateprop from proposition 
join objet on objet.id=idobjet1; 

create view view_detail2 as select view_detail1.id,idutilisateur1,idobjet1,nom1,idobjet2,objet.nom as nom2,idutilisateur2,etat,dateprop from view_detail1
join objet on objet.id=idobjet2;

drop table proposition;
drop table objet;
drop table admin;
drop table photo;
drop table utilisateur;
drop table categorie;