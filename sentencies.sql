//Nom de la BD: phpTinkering

Create table films (
    id serial primary key,
    title varchar(255) not null,
    year integer not null,
    director varchar(255) not null
);
Create table shows (
    id serial primary key,
    title varchar(255) not null,
    year integer not null,
    episodes integer not null,
    platform varchar(255) not null,
    protagonist varchar(255) not null
);


/*
    mysql -u root -p
    password: root
    use phpTinkering;
*/



