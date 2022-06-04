create table cart(
	id int not null auto_increment primary key,
	client_email varchar(255),
	created_at datetime not null
);

create table cart_product (
	id int not null auto_increment primary key,
	product_id int not null,
	q float,
	cart_id int not null
);

