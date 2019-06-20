CREATE TABLE recipe (
	rec_id int(5) primary key auto_increment,
	title varchar(255) not null,
	prep_time time not null,
	bake_time time not null
);

ALTER TABLE recipe AUTO_INCREMENT=1000;

CREATE TABLE recipe_details (
	recd_id int(5) primary key auto_increment,
	rec_id int(5),
	ingredient_id int(5),
	FOREIGN KEY (rec_id) REFERENCES recipe(rec_id),
	FOREIGN KEY (ingredient_id) REFERENCES ingredient(ingredient_id)
);

ALTER TABLE recipe_details AUTO_INCREMENT=2000;

CREATE TABLE ingredient (
	ingredient_id int(5) primary key auto_increment,
	title varchar(255) not null,
	amount int not null,
	unit varchar(25) not null
);


ALTER TABLE ingredient AUTO_INCREMENT=3000;

