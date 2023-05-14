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
			path varchar(280),
			type_question int, 
			category varchar(50), 
			country varchar(50), 
			id_correct_answer int, 
			primary key(id),
			foreign key(id_correct_answer) references Answer(id));

create table Travel (id int, 
			name varchar(50),
			start_time time,
			end_time time,
			primary key(id));
			
create table current_question1 (
	id int(11),
	question_id int(11) default null,
	primary key(id));

drop table Answer;
drop table Player;
drop table Question;
drop table Travel;
drop table current_question1;
