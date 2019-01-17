drop database if exists db;
create database db character set utf8 collate utf8_general_ci;

use db;

create table if not exists category (
id int(11) not null auto_increment,
cat_name varchar(255) not null,
note text,
primary key(id)
);

create table if not exists provided(
id int not null auto_increment,
name varchar(255) not null,
address varchar(255),
primary key (id)
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
provided_id int(11),
primary key(id),
foreign key(category_id) references category (id),
foreign key(provided_id) references provided(id)
);
/*select product.id, product.prod_name,product.price,prod_orders.quantity from product,prod_orders,orders 
where product.id = prod_orders.prod_id and prod_orders.order_id = orders.id and orders.cus_id =1;
*/

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
date date not null,
status varchar(255),
primary key (id),
foreign key (cus_id) references customer (id)
);

create table if not exists prod_orders (
prod_id int(11),
order_id int(11),
quantity int(11) not null,
status int(11) not null,
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
  `id` int(11) NOT NULL auto_increment,
  `prod_id` int(11) NOT NULL,
  `product_code` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `origin` varchar(255) NOT NULL,
  `forGen` varchar(255) NOT NULL,
  `glass` varchar(255) NOT NULL,
  `machine` varchar(255) NOT NULL,
  `guarantee` varchar(255) NOT NULL,
  `guarantee_place` varchar(255) NOT NULL,
  `diameter` varchar(50) NOT NULL,
  `surface_thickness` float NOT NULL,
  `braces` varchar(255) NOT NULL,
  `strap` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `waterproof` varchar(255) NOT NULL,
  `function` varchar(255) NOT NULL,
  primary key(id),
  foreign key(prod_id) references product(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;










insert into provided (name,address) values
('Casio','Đức'),
('Citizen','Đức'),
('Seiko','Đức'),
('Op','Đức'),
('Sakagen','Đức'),
('Sarcar','Mĩ'),
('Zenith','Mĩ'),
('Rolex','Mĩ'),
('Sakagen','Mĩ'),
('Patek Philipe','Mĩ'),
('Oris','Thụy Sỹ'),
('Titoni','Thụy Sỹ'),
('Longines','Thụy Sỹ'),
('CC Watches','Thụy Sỹ'),
('Cover','Thụy Sỹ'),
('Casio','Nhật'),
('Citizen','Nhật'),
('Orients','Nhật'),
('Seiko','Nhật');





insert into category (cat_name) values
(N'Đồng Hồ Nam'),
(N'Đồng Hồ Nữ'),
(N'Đồng Hồ Đôi'),
(N'Phụ Kiện');

insert into product (prod_name,category_id,price,quantity,status,imported_date,note,image,provided_id)values
('Rolex',1,1222222,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/18.png',1),
('Cartier',1,232522,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/2.png',1),
('Omega ',1,1999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/19.png',1),
('Philippe',1,2999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/4.png',1),
('Longines ',1,19999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/19.png',2),
('Breitling ',1,1999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/6.png',2),
('TAG Heuer',1,4999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/7.png',2),
('Montblanc ',1,4999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/8.png',2),
('Breguet',2,1999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/9.png',3),
('Swiss Made',2,1499999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/10.png',3),
('Tissot',2,1789999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/11.png',4),
('Timex',2,1299999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/12.png',4),
('Calvin Klein',2,6999999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/13.png',5),
('Movado',1,1226666,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/14.png',6),
('SEIKO',1,1229999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/15.png',6),
('Citizen',1,12222999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/16.png',7),
('Orient',1,12222999,23,1,now(),'Đồng hồ nam điện tử Casio AE-1000W-1BVDF
với kiểu dáng mạnh mẽ cùng màu đen nam tính,
các chức năng đa dụng tuyệt vời, chất được làm từ nhựa cao cấp siêu bền,
mặt kính nhựa chịu lực.','image/17.png',7);

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

INSERT INTO `details` (`prod_id`, `product_code`, `brand`, `origin`, `forGen`, `glass`, `machine`, `guarantee`, `guarantee_place`, `diameter`, `surface_thickness`, `braces`, `strap`, `color`, `waterproof`, `function`) VALUES
(1, 'AE-1000W-1BVDF', 'Casio', 'Nhật Bản', 'Nam', 'Resin Glass', 'Quartz (Pin)', 2, 'Tại Hải Triều', 44, 14, 'Nhựa', 'Dây Cao Su', 'Đen', '10 ATM', 'Lịch – Bộ Bấm Giờ – Giờ Kép – Đèn Led'),
(2, 'AE-1000W-2BVDF', 'Casio', 'Hàn Quốc', 'Nam', 'Resin Glass', 'Quartz', 2, 'Tại Hải Triều', 44, 14, 'Da', 'Dây Da', 'Xám', '10 ATM', 'Lịch – Bộ Bấm Giờ – Giờ Kép – Đèn Led'),
(3, 'AE-1000W-3BVDF', 'Casio', 'Hàn Quốc', 'Nam', 'Bamin Glass', 'Quartz (Pin)', 2, 'Tại Hải Triều', 34, 10, 'Nhựa', 'Dây cao su', 'Trắng', '11 ATM', 'Lịch – Bộ Bấm Giờ – Giờ Kép'),
(4, 'AE-1000W-4BVDF', 'Casio', 'Nhật Bản', 'Nam', 'Nani Glass', 'Quartz (Pin)', 1, 'Tại Hồng Kông', 33, 10, 'Da', 'Dây Da', 'Xám', '14 ATM', 'Lịch – Bộ Bấm Giờ – Đèn Led'),
(5, 'AE-1000W-5BVDF', 'Sam sung', 'Trung QUốc', 'Nam', 'Bamin Glass', 'Noman', 1, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Xám', '12 ATM', 'Bộ Bấm Giờ – Đèn Led'),
(6, 'AE-1000W-6BVDF', 'Azino', 'Nhật Bản', 'Nam', 'Bamin Glass', 'Quartz (Pin)', 2, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Tím', '12 ATM', 'Lịch - Bộ Bấm Giờ – Đèn Led'),
(7, 'AE-1000W-7BVDF', 'Sam sung', 'Trung QUốc', 'Nam', 'Nani Glass', 'Noman', 1, 'Tại Xing Cua', 40, 12, 'Sắt', 'Dây Sắt', 'Đỏ', '11 ATM', 'Bộ Bấm Giờ - Giờ Kép – Đèn Led'),
(8, 'AE-1000W-8BVDF', 'Virtual', 'Mỹ', 'Nam', 'Nani Glass', 'Quartz (Pin)', 1, 'Tại Mandina', 40, 12, 'Inox', 'Dây Thép', 'Xám', '10 ATM', 'Nhắn tin - Bộ Bấm Giờ – Đèn Led'),
(9, 'AE-1000W-9BVDF', 'Sam sung', 'Trung QUốc', 'Nữ', 'Bamin Glass', 'Wongxi', 1, 'Tại Xing Cua', 40, 12, 'Nhựa', 'Dây Cao Su', 'Trăng', '14 ATM', 'Lịch - Bộ Bấm Giờ – Đèn Led'),
(10, 'AE-1000W-10BVDF', 'Virtual', 'Mỹ', 'Nữ', 'Bamin Glass', 'Wongxi', 1, 'Tại Mandina', 40, 12, 'Da', 'Dây Da', 'Đen', '12 ATM', 'Nhắn tin - Lịch - Bộ Bấm Giờ – Đèn Led'),
(12, 'AE-1000W-12BVDF', 'Casio', 'Trung QUốc', 'Nữ', 'Bamin Glass', 'Quartz (Pin)', 2, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Đen', '13 ATM', 'Gọi điện - Bộ Bấm Giờ – Đèn Led'),
(13, 'AE-1000W-13BVDF', 'Azino', 'Nhật Bản', 'Nữ', 'Resin Glass', 'Wongxi', 1, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Xám', '11 ATM', 'Bộ Bấm Giờ - Lịch – Đèn Led'),
(14, 'AE-1000W-14BVDF', 'Sam sung', 'Trung QUốc', 'Nam', 'Bamin Glass', 'Noman', 1, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Xám', '12 ATM', 'Lịch - Bộ Bấm Giờ – Đèn Led'),
(15, 'AE-1000W-15BVDF', 'Casio', 'Trung QUốc', 'Nam', 'Resin Glass', 'Noman', 1, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Đỏ', '12 ATM', 'Giờ Kép - Bộ Bấm Giờ – Đèn Led'),
(16, 'AE-1000W-16BVDF', 'Casio', 'Trung QUốc', 'Nam', 'Bamin Glass', 'Noman', 1, 'Tại Xing Cua', 40, 12, 'Da', 'Dây Da', 'Xám', '12 ATM', 'Lịch - Giờ Kép – Đèn Led'),
(17, 'AE-1000W-17BVDF', 'Virtual', 'Mỹ', 'Nam', 'Nani Glass', 'Quartz (Pin)', 1, 'Tại Mandina', 40, 12, 'Da', 'Dây Da', 'Xám', 'Vàng ATM', 'Lịch - Bộ Bấm Giờ – Đèn Led');





insert into prod_orders(prod_id,order_id,quantity,status)values
(13,1,1,1),
(2,2,1,1),
(15,3,1,1),
(14,4,1,1),
(4,5,1,0),
(5,6,1,0),
(6,7,1,1),
(7,8,1,0),
(8,9,1,1),
(9,10,1,0),
(10,11,1,0),
(11,12,1,0),
(12,13,1,1);
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



select name from provided where address = 'Đức';
 SELECT * FROM provided WHERE address  =  'Đức';

select  *, sum(prod_orders.quantity) from product, prod_orders where product.id= prod_orders.prod_id
GROUP BY prod_orders.prod_id
ORDER BY Sum(prod_orders.quantity) DESC
limit 12;




select * from product 
order by imported_date limit 12;


select prod_orders.prod_id,prod_orders.quantity from
          product,prod_orders,orders where product.id = prod_orders.prod_id 
         and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id =1;
         
         
select product.id, product.prod_name,product.price,prod_orders.quantity from
          product,prod_orders,orders where product.id = prod_orders.prod_id 
         and prod_orders.status = 1 and prod_orders.order_id = orders.id and orders.cus_id =2;