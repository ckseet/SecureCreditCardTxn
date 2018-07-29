-- business as well as system users
create table users
(
	user_id 	bigint not null auto_increment primary key,
	username	varchar(255),
	password	varchar(255),
	active		tinyint not null,
	create_date	datetime not null,
	create_user	bigint not null,
	change_date	datetime not null,
	change_user	bigint not null
);

-- create users to be use by controllers
create procedure create_user(in in_username varchar(255), in in_password varchar(255), in_action_user bigint)
begin
	insert into users(username, password,active,create_date,create_user, change_date, change_user) 
	values
	(in_username, MD5(in_password),1,now(),in_action_user,now(), in_action_user);
end; 


-- Stores each tranascation
create table user_transaction
(
	user_transaction_id		bigint not null auto_increment primary key,
	user_transaction_system_id	varchar(255),
	vendor_id			bigint,
	active				tinyint not null,
	create_date			datetime not null,
	create_user			bigint not null
);
