CREATE TABLE catalogoaberto.category (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name TINYTEXT NOT NULL,
	description TEXT
);

CREATE TABLE catalogoaberto.api (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	category_id INT DEFAULT(NULL),
	title TINYTEXT NOT NULL,
	url TINYTEXT NOT NULL,
	technology TINYTEXT NOT NULL,
	format TINYTEXT NOT NULL,
	last_update DATETIME NOT NULL DEFAULT (now()),
	main_operations TEXT,
	how_to TEXT,
	examples TEXT,
	access_control TEXT,
	FOREIGN KEY (category_id) REFERENCES catalogoaberto.category (id) ON DELETE SET DEFAULT
);

CREATE TABLE catalogoaberto.citation (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	url TINYTEXT NOT NULL,
	title TINYTEXT NOT NULL,
	last_update DATETIME NOT NULL DEFAULT (now())
);

CREATE TABLE catalogoaberto.api_edition_proposition (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	category_id INT DEFAULT(NULL),
	title TINYTEXT NOT NULL,
	url TINYTEXT NOT NULL,
	technology TINYTEXT NOT NULL,
	format TINYTEXT NOT NULL,
	last_update DATETIME NOT NULL DEFAULT (now()),
	main_operations TEXT,
	how_to TEXT,
	examples TEXT,
	access_control TEXT,
	FOREIGN KEY (category_id) REFERENCES catalogoaberto.category (id) ON DELETE SET DEFAULT
);

CREATE TABLE catalogoaberto.citation_proposition (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	url TINYTEXT NOT NULL,
	title TINYTEXT NOT NULL
);
