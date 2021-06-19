create database adminitracion_clima;
USE adminitracion_clima;

CREATE TABLE usuarios(
    id          int(255) auto_increment not null,
    nombre      varchar(100) not null,
    apellidos   varchar(100) not null,
    email       varchar(255) not null,
    password    varchar(255) not null,
    rol         varchar(255),
    CONSTRAINT pk_usuarios PRIMARY KEY(id),
    CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb;

INSERT INTO usuarios VALUES(NULL,'Administrador','','admin@admin.com','admin','admin');
INSERT INTO usuarios VALUES(NULL,'Juan Fernando','Maldonado Gomez','juan@gmail.com','12345','user');
INSERT INTO usuarios VALUES(NULL,'Pablo','Perez','pablo@gmail.com','12345','user');
INSERT INTO usuarios VALUES(NULL,'David','Gutierrez','david@gmail.com','12345','user');

CREATE TABLE mensajes(
	id		INT(255) AUTO_INCREMENT NOT NULL,
	usuario_id VARCHAR(255) NOT NULL,
	titulo VARCHAR(255) NOT NULL,
	descripcion mediumtext,
	fecha DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT pk_mensajes PRIMARY KEY(id)
)ENGINE=INNODB;

INSERT INTO mensajes (id,usuario_id,titulo,descripcion) VALUES (NULL,'2','Crea Mensajes','Puedes compartir tus mensajes con todos');
INSERT INTO mensajes (id,usuario_id,titulo,descripcion) VALUES (NULL,'3','Consulta el Clima','La aplicación cuenta con la opción de saber el clima de tu ciudad');
INSERT INTO mensajes (id,usuario_id,titulo,descripcion) VALUES (NULL,'4','Edita tu usuario','La aplicacion web tambien te deja modificar tu usuario');
