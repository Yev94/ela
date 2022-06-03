CREATE TABLE contact_type(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    contact_type varchar(50) NOT NULL COMMENT 'Type of contact to know who is the contact'
) DEFAULT CHARSET UTF8 COMMENT 'Table to know the type of contact';