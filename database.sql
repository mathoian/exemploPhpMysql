
      -- Created by mclo.
      -- Mail: marcelohenrik@gmail.com
      -- Github: https://github.com/mathoian
      --  --MYSQL -  script criação de aluno para exemplo

-- create schema
create schema if not exists ALLOW;
use ALLOW;

-- select
select * from aluno;
 -- create table
create table if not exists aluno(
	id int auto_increment,
	nome varchar(50) not null,
    cpf varchar(15) not null,
	primary key(id)
	);

-- insert
insert into aluno(nome,cpf) values('Ana Marola Alians Biocro',"999.193.404-00");
insert into aluno(nome,cpf) values('HoY Salazar Fernandes',"231.969.400-18");
insert into aluno(nome,cpf) values('Xin Xong Pong',"112.313.404-02");
insert into aluno(nome,cpf) values('Kou Xin Xu',"231.969.400-89");
insert into aluno(nome,cpf) values('Luiz Paulo Souyo',"333.322.404-39");
insert into aluno(nome,cpf) values('Sando dias Mauatim',"984.009.400-77");

-- insert if not exists s
insert into aluno(nome,cpf)
	select * from (select 'Honey',"111.111.111.99") as tmp
    where not exists(
    select nome from aluno where nome = 'Honey'
    ) limit 1;

-- update
update aluno set nome = "Joana Goias Assis" , cpf = "077.885.134-122" where id = 25;

-- delete
delete from aluno where id = 1;
-- consulta
select nome, cpf from aluno where id = 3;
--  Brazilian document 'cpf' missing a number
alter table aluno modify nome varchar(18);