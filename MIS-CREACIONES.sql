CREATE TABLE user_address(  
    id int NOT NULL PRIMARY KEY AUTO_INCREMENT COMMENT 'Primary Key',
    user_id int COMMENT 'Foreign Key of User Table',
    street_id int COMMENT 'Foreign Key of Street Table',
    direction text COMMENT 'Rest of Direction Address of user in JSON format',
    deleted boolean DEFAULT false COMMENT 'Indicates if the record is deleted',
    update_time DATETIME COMMENT 'Last update time',
    create_time DATETIME COMMENT 'Creation time'
) DEFAULT CHARSET UTF8 COMMENT 'ZIPs Code Table';