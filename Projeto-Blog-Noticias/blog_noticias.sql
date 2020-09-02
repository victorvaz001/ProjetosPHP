CREATE DATABASE blog_noticias;

CREATE TABLE noticias
(
	id int primary key auto_increment,
	titulo_materia varchar(150),
	conteudo_materia varchar(2000),
	nome_pessoa varchar(50),
	data_materia DATETIME
);
insert into noticias (titulo_materia,conteudo_materia,nome_pessoa) VALUES ('FAKE NEWS G1', 'G1 propaga fake news', 'Victor Gonçalves Vaz');

insert into noticias (titulo_materia,conteudo_materia,nome_pessoa) VALUES ('Bolsonaro 2021', 'Vai ganhar', 'Victor Gonçalves Vaz');

insert into noticias (titulo_materia,conteudo_materia,nome_pessoa) VALUES ('Mega Senha', 'Uma pessoa ganhou 1 milhão', 'Victor Gonçalves Vaz');

###################################################

CREATE TABLE usuarios
(
	id int primary key auto_increment,
	nome varchar(50),
	email varchar(50),
	senha varchar(50)
);


INSERT INTO usuarios(nome, email, senha) VALUES 
(
	'Victor',
	'victoradmin@blog.com',
	MD5('123')
);
INSERT INTO usuarios(nome, email, senha) VALUES 
(
	'Nívea Cristina dos Santos Silva',
	'nivea@blog.com',
	MD5('123')
);

UPDATE noticias SET 
titulo_materia  = 'Apoiadora de Bolsonaro ATUALIZADO', conteudo_materia  = 'Paula Marisa, será candidata a vereadora de canoas 2', nome_pessoa  = 'Marcianita Gonçalves de Souza 2' WHERE id = $id

