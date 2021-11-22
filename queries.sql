create database hdp;
use hdp;
create table userinfo(email varchar(30),name varchar(20),password varchar(20),primary key(email));
create table issue(email varchar(30),issue varchar(150));