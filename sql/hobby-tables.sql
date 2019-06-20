CREATE TABLE recipe (
	recipe_id int(5) primary key auto_increment,
	title varchar(255) not null,
	prep_time time not null,
	bake_time time not null,
	ingredient_id int(5),
	nutrition_id int(5),
	FOREIGN KEY (ingredient_id) REFERENCES ingredient(ingredient_id),
	FOREIGN KEY (nutrition_id) REFERENCES nutrition(nutrition_id)
);

ALTER TABLE recipe AUTO_INCREMENT=1000;

CREATE TABLE ingredient (
	ingredient_id int(5) primary key auto_increment,
	title varchar(255) not null,
	amount int not null,
	unit varchar(25) not null
);


ALTER TABLE ingredient AUTO_INCREMENT=2000;

CREATE TABLE nutrition (
	nutrition_id int(5) primary key auto_increment,
	value int not null,
	unit varchar(25) not null,
	type varchar(50)
);


ALTER TABLE nutrition AUTO_INCREMENT=3000;