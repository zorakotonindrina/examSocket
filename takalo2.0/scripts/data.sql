
insert into utilisateur(mail,mdp,contact) values('un@gmail.com','un','1111111111'),
('deux@gmail.com','deux','2222222222'),
('trois@gmail.com','trois','3333333333'),
('quatre@gmail.com','quatre','4444444444');

insert into admin(mail,mdp) values('admin@gmail.com','admin');

insert into categorie(nom) values('cat1'),
('cat2'),
('cat3'),
('cat4');

insert into objet(nom,description,prixestimatif,idutilisateur,idcategorie) values('objet1','desc object1',1000.01,3,2),
('objet2','desc object2',2000.02,1,4),
('objet3','desc object3',3000.03,2,1),
('objet4','desc object4',4000.04,4,3);

insert into photo(idobjet,path) values(1,'photo1objet1'),
(1,'1.jpg'),
(1,'11.jpg'),
(2,'12.jpg'),
(2,'xx.jpg'),
(2,'xx1.jpg'),
(3,'tel.jpg'),
(3,'tel1.jpg'),
(3,'tel2.jpg'),
(4,'lu.jpg'),
(4,'lu1.jpg'),
(4,'lu21.jpg');

insert into proposition(idutilisateur1,idobjet1,idobjet2,idutilisateur2,etat,dateprop) values(1,2,3,2,0,'2023-01-01'),
(3,1,4,4,0,'2023-01-02');

