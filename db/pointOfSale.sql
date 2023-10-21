CREATE TABLE ref_menu (

	menu_id INT AUTO_INCREMENT NOT NULL,
	menu_name VARCHAR(100) NOT NULL,
	menu_desc VARCHAR(1000) NOT NULL,
	price DECIMAL(13,2) NOT NULL,
	
	CONSTRAINT PK_MENU_ID PRIMARY KEY (menu_id)
);

CREATE INDEX IDX_MENU_ID ON ref_menu (menu_id);

INSERT INTO ref_menu(menu_name, menu_desc, price) VALUES ("burger", "cheese burger", 150);