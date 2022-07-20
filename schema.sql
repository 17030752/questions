CREATE Table polls(
    id int not null auto_increment,
    uuid varchar(20) not null unique,
    title varchar(255) not null,
    primary key (id)
);

create table options(
    id int not null auto_increment,
    poll_id int not null ,
    title varchar(255) not null,
    votes int not null,
    primary key (id),
    foreign key (poll_id) references polls (id)
    );