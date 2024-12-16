--Data type sizes are small for the purposes of prototyping
--MY COMPLETE INFINITY FREE DATABASE NAME "if0_37361428_platform"
--The primary key is each table's unique record ID/entry

CREATE DATABASE platform;

--Stores users registration details
CREATE TABLE users (
  user_id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  forename VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  passcode VARCHAR(255) NOT NULL,
  current_level VARCHAR(20) NOT NULL DEFAULT 'easy',
  PRIMARY KEY (user_id)
) ENGINE=InnoDB;

--Stores the self-assigned lock settings
CREATE TABLE users_lock_settings (
  lock_record TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(8) UNSIGNED NOT NULL,
  streak TINYINT(3) UNSIGNED DEFAULT 0,
  last_session TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, --Changed var name to last_session UPDATE INFINITY
  start_lock_date DATE NOT NULL,
  start_lock_t TIME NOT NULL,
  end_lock_date DATE NOT NULL,
  end_lock_t TIME NOT NULL,
  PRIMARY KEY (lock_record),
  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;

--Records user's performance in exercises
CREATE TABLE users_exercises (
  exercise_record TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(8) UNSIGNED NOT NULL,
  exercise_name VARCHAR(50),
  score TINYINT(3) NOT NULL DEFAULT 0,
  t_completed TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (exercise_record),
  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;

--Stores users' social posts
CREATE TABLE posts (
  post_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(8) UNSIGNED NOT NULL,
  content VARCHAR(255) NOT NULL,
  t_posted TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;



/*

CREATE DATABASE platform;

--Stores users registration details
CREATE TABLE users (
  user_id INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  forename VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  passcode VARCHAR(255) NOT NULL,
  current_level VARCHAR(20) NOT NULL DEFAULT 'easy',
  PRIMARY KEY (user_id)
) ENGINE=InnoDB;

--Stores the self-assigned lock settings & tracks streak
CREATE TABLE users_activity (
  user_id INT(8) UNSIGNED NOT NULL,
  streak TINYINT(3) UNSIGNED DEFAULT 0,
  last_session TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, --Changed var name to last_session UPDATE INFINITY
  start_lock_date TIMESTAMP NOT NULL,
  start_lock_t TIME NOT NULL,
  end_lock_date DATE NOT NULL,
  end_lock_t TIME NOT NULL,
  PRIMARY KEY (user_id),
  CONSTRAINT FK_user_id_act FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;

--Records user's performance in exercises
CREATE TABLE users_exercises (
  exercise_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(8) UNSIGNED NOT NULL,
  exercise_name VARCHAR(50),
  score TINYINT(3) NOT NULL DEFAULT 0,
  t_completed TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (exercise_id),
  CONSTRAINT FK_user_id_exer FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;

--Stores users' social posts
CREATE TABLE posts (
  post_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id INT(8) UNSIGNED NOT NULL,
  content VARCHAR(255) NOT NULL,
  post_t TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id),
  CONSTRAINT FK_user_id_post FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB;
*/