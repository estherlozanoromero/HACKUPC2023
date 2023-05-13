create table Player(
	seat int, 
	username varchar(50), 
	score int default 0, 
	time time, 
	total_ans int default 0, 
	total_correct int default 0, 
	primary key(seat));

create table Answer (id int, 
			answer varchar(280) unique, 
			category varchar(50),
			primary key(id));

create table Question (id int, 
			question varchar(280) unique, 
			type_question int, 
			category varchar(50), 
			country varchar(50), 
			id_correct_answer int, 
			primary key(id),
			foreign key(id_correct_answer) references Answer(id));

create table Travel (id int, 
			name varchar(50),
			primary key(id));
