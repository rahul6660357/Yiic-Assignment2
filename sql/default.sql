use yii_assignment2;
create table users(
   users_id INT NOT NULL AUTO_INCREMENT,
   users_name VARCHAR(255) NOT NULL,
   users_email VARCHAR(255) NOT NULL,
   users_phone varchar(20) not null,
   users_password varchar(255) not null,
   PRIMARY KEY (users_id)
);