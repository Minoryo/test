create database hobby_circle;

use hobby_circle;

create table communities (
  id int auto_increment NOT NULL PRIMARY KEY,
  community_name varchar(255) NOT NULL,
  description text
);


create table messages (
  com_id int NOT NULL,
  message text
);
