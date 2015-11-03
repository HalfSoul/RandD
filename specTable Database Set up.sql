CREATE DATABASE jobtable;

use jobtable;

CREATE TABLE IF NOT EXISTS jobtable.specSheet (
		specCode MEDIUMINT NOT NULL AUTO_INCREMENT,
		date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
		product_name VARCHAR(20),
		description VARCHAR(100),
		cut_list VARCHAR(100),
		packing VARCHAR(100),
		submit VARBINARY(100),
		drawing VARBINARY(100),
	
		PRIMARY KEY(specCode)
		);