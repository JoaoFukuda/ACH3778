CREATE DATABASE catalogoaberto CHARACTER SET "latin1" COLLATE "latin1_general_ci";

CREATE USER 'catalogoaberto'@'%' IDENTIFIED BY 'catalogoaberto';

GRANT ALL PRIVILEGES ON catalogoaberto.* TO 'catalogoaberto'@'%';
