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
price DECIMAL(12,2) not null,
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
email varchar(255) not null unique,
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

CREATE TABLE `details` (
  `id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `forGen` varchar(255) NOT NULL,
  `glass` varchar(255) NOT NULL,
  `machine` varchar(255) NOT NULL,
  `guarantee` int(11) NOT NULL,
  `guarantee_place` varchar(255) NOT NULL,
  `diameter` float NOT NULL,
  `surface_thickness` float NOT NULL,
  `braces` varchar(255) NOT NULL,
  `strap` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `waterproof` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  primary key(id),
  foreign key(prod_id) references product(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;





insert into category (cat_name) values
(N'Đồng Hồ Nam'),
(N'Đồng Hồ Nữ'),
(N'Đồng Hồ Dây Da'),
(N'Đồng Hồ Không Dây');

insert into product (prod_name,category_id,price,quantity,status,imported_date,note,image)values
('Rolex',1,1222222,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/18.png'),
('Cartier',1,232522,23,1,now(),'','image/2.png'),
('Omega ',1,1999999,23,1,now(),'','image/19.png'),
('Philippe',1,2999999,23,1,now(),'','image/4.png'),
('Longines ',1,19999999,23,1,now(),'','image/19.png'),
('Breitling ',1,1999999,23,1,now(),'','image/6.png'),
('TAG Heuer',1,4999999,23,1,now(),'','image/7.png'),
('Montblanc ',1,4999999,23,1,now(),'','image/8.png'),
('Breguet',2,1999999,23,1,now(),'','image/9.png'),
('Swiss Made',2,1499999,23,1,now(),'','image/10.png'),
('Tissot',2,1789999,23,1,now(),'','image/11.png'),
('Timex',2,1299999,23,1,now(),'','image/12.png'),
('Calvin Klein',2,6999999,23,1,now(),'','image/13.png'),
('Movado',1,1226666,23,1,now(),'','image/14.png'),
('SEIKO',1,1229999,23,1,now(),'','image/15.png'),
('Citizen',1,12222999,23,1,now(),'','image/16.png'),
('Orient',1,12222999,23,1,now(),'','image/17.png');

insert into slides(name, link,status) values
('TISSOT TRADITION 5.5','image/slide1.jpg',''),
('TISSOT CHRONO XL 3.5','image/slide2.jpg',''),
('TISSOT T-TOUCH','image/slide3.jpg',''),
('TISSOT T-RACE 2.5','image/slide4.jpg','');


insert into customer(cus_name,user_name,password,address,email,sdt)values
('Nguyễn Văn A','Nguyễn A','25d55ad283aa400af464c76d713c07ad','Quảng Trị','a@gmail.com','122228'),
('Nguyễn Văn B','Nguyễn B','25d55ad283aa400af464c76d713c07ad','Quảng Ngãi','b@gmail.com','122228'),
('Nguyễn Văn C','Nguyễn C','25d55ad283aa400af464c76d713c07ad','Đà Nẵng','c@gmail.com','122228'),
('Nguyễn Văn D','Nguyễn D','25d55ad283aa400af464c76d713c07ad','Quảng Trị','d@gmail.com','122228'),
('Nguyễn Văn E','Nguyễn E','25d55ad283aa400af464c76d713c07ad','Quảng Trị','e@gmail.com','122228'),
('Nguyễn Văn F','Nguyễn F','25d55ad283aa400af464c76d713c07ad','Quảng Trị','f@gmail.com','122228'),
('Nguyễn Văn G','Nguyễn G','25d55ad283aa400af464c76d713c07ad','Quảng Trị','g@gmail.com','122228');

insert into orders(cus_id,date,status)values
(1,'2018-12-12',''),
(2,'2018-12-12',''),
(3,'2018-12-12',''),
(4,'2018-12-12',''),
(3,'2018-12-12',''),
(1,'2018-12-12',''),
(1,'2018-12-12',''),
(1,'2018-12-12',''),
(2,'2018-12-12',''),
(1,'2018-12-12',''),
(3,'2018-12-12',''),
(1,'2018-12-12',''),
(5,'2018-12-12',''),
(1,'2018-12-12',''),
(4,'2018-12-12',''),
(1,'2018-12-12',''),
(1,'2018-12-12','');
insert into prod_orders(prod_id,order_id,quantity)values
(13,1,1),
(2,2,1),
(15,3,1),
(14,4,1),
(4,5,1),
(5,6,1),
(6,7,1),
(7,8,1),
(8,9,1),
(9,10,1),
(10,11,1),
(11,12,1),
(12,13,1);
insert into orders(cus_id,date,status)values
(1,'2019-1-2',''),
(2,'2019-1-2',''),
(3,'2019-1-2',''),
(2,'2019-1-2',''),
(1,'2019-1-2',''),
(3,'2019-1-2',''),
(1,'2019-1-2',''),
(4,'2019-1-2',''),
(1,'2019-1-2',''),
(6,'2019-1-2',''),
(2,'2019-1-2',''),
(3,'2019-1-2',''),
(1,'2019-1-2','');





select  *, sum(prod_orders.quantity) from product, prod_orders where product.id= prod_orders.prod_id
GROUP BY prod_orders.prod_id
ORDER BY Sum(prod_orders.quantity) DESC
limit 12;




select * from product 
order by imported_date limit 12;