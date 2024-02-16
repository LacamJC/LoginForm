CREATE DATABASE LoginForm;
DROP DATABASE LoginForm;
DROP TABLE users;
SHOW TABLES;
use LoginForm;

SHOW DATABASES;

CREATE TABLE users(
	id INT AUTO_INCREMENT PRIMARY KEY,
	user_username varchar(50) NOT NULL,
    user_password varchar(8) NOT NULL,
    user_name varchar(50) NOT NULL,
    user_age int NOT NULL,
    user_sex varchar(10),
    adm VARCHAR(10)
);

INSERT INTO users VALUES(1,'Root','000000','Root Manager',00,'Male',1);
INSERT INTO users VALUES(1,'JbDefault', '123456', 'James Baxter', 21, 'Male', 0)/

-- Lembre-se que o script inicia automaticamente a criação do banco de dados e da tabela e a inserção de usuarios
-- Esté arquivo é apenas para mostrar como esta montado