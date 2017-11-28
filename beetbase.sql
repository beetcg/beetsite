create database beet;
use beet;

create table tech(
	__id VARCHAR(255) NOT NULL,
	PRIMARY KEY(__id),
	fname VARCHAR(255),
	lname VARCHAR(255),
	email VARCHAR(255) NOT NULL UNIQUE,
	tlf VARCHAR(255),
	zip VARCHAR(255),
	salt VARCHAR(255),
	hash VARCHAR(255),
	id_card VARCHAR(255),
	active BOOLEAN DEFAULT false, 
	hardware BOOLEAN DEFAULT false,
	printing BOOLEAN DEFAULT false,
	security BOOLEAN DEFAULT false,
	television BOOLEAN DEFAULT false,
	virus BOOLEAN DEFAULT false,
	network BOOLEAN DEFAULT false,
	telephone BOOLEAN DEFAULT false,
	servers BOOLEAN DEFAULT false,

	created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	update_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- INSERT INTO TECH (__id, fname, lname, email, tlf, zip, question, answer, salt, hash, activate_code, active, hardware, printing, security, television, virus, network, telephone, servers, created_at, update_at) 
-- VALUES ('$id','$fname','$lname','$email_s','$tlf','$zip','$salt','$hash','0','0','0','0','0','0','0','0','0','$date','$date');