create table users(
	user_id int AUTO_INCREMENT,
    name varchar(255),
    username varchar(255),
    password varchar(255),
    primary key(user_id)
);

create table posts(
	post_id int AUTO_INCREMENT,
    user_id int,
    title varchar(255),
    body varchar(255),
    primary key(post_id),
    constraint foreign key(user_id) REFERENCES users(user_id)
);