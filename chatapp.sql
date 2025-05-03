

CREATE TABLE messages (
   ID INT PRIMARY KEY AUTO_INCREMENT,
   username VARCHAR (50),
   message TEXT,
   timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




CREATE TABLE users (
  user_id int NOT NULL,
  unique_id int(255) NOT NULL,
  fname varchar(255) NOT NULL,

  email varchar(255) NOT NULL,
  password varchar(255) NOT NULL,
  img varchar(255) NOT NULL,
  status varchar(255) NOT NULL
) ;

