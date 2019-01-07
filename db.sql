drop database if exists db;
create database db character set utf8 collate utf8_general_ci;

use db;

create table if not exists category (
id int(11) not null auto_increment,
cat_name varchar(255) not null,
note text,
primary key(id)
);

create table if not exists product (
id int(11) not null auto_increment,
prod_name varchar(255) not null,
category_id int(11),
price int(11) not null,
quantity int(11) not null,
status int(11) not null,
imported_date date not null,
note text,
image varchar(255),
primary key(id),
foreign key(category_id) references category (id)
);

create table if not exists product_audit (
id int(11) not null auto_increment,
prod_id int,
message text not null,
primary key(id),
foreign key(prod_id) references product (id)
);

create table if not exists customer (
id int(11) not null auto_increment,
cus_name varchar(255) not null,
user_name varchar(255) not null,
password varchar(255) not null,
address varchar(255),
email varchar(255) not null,
sdt varchar(15) not null,
primary key (id)
);

create table if not exists orders (
id int(11) not null auto_increment,
cus_id	int(11),
date datetime not null,
status varchar(255),
primary key (id),
foreign key (cus_id) references customer (id)
);

create table if not exists prod_orders (
prod_id int(11),
order_id int(11),
quantity int(11) not null,
primary key(prod_id, order_id),
foreign key(prod_id) references product(id),
foreign key(order_id) references orders(id)
);

create table if not exists message (
id int not null auto_increment,
content text not null,
created_date datetime,
primary key (id)
);

create table if not exists admins (
id int not null auto_increment,
name varchar(255) not null,
password varchar(255) not null,
email varchar(255) not null,
primary key (id)
);

create table if not exists support (
id int not null auto_increment,
name varchar(255) not null,
sdt varchar(255) not null,
email varchar(255) not null,
address varchar(255),
primary key (id)
);
create table if not exists slides (
id int not null auto_increment,
name varchar(255) not null,
link varchar(255) not null,
status varchar(255) not null,

primary key (id)
);




insert into category (cat_name) values
(N'Đồng Hồ'),
(N'Điện Thoại'),
(N'Máy Tính'),
(N'IPad');

