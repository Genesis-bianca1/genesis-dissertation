--Data type sizes are small for the purposes of prototyping
--MY COMPLETE INFINITY FREE DATABASE NAME "if0_37361428_platform"

CREATE DATABASE platform;

--Stores users registration details
CREATE TABLE users (
  user_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(8) NOT NULL,
  forename VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  passcode VARCHAR(255) NOT NULL,
  current_level VARCHAR(20) NOT NULL DEFAULT 'easy',
  PRIMARY KEY (user_id)
);

--Stores the self-assigned lock settings & tracks streak
CREATE TABLE users_activity (
  user_id TINYINT(3) UNSIGNED NOT NULL,
  streak TINYINT(3) UNSIGNED DEFAULT 0,
  last_date_logged DATE NOT NULL,
  last_t_logged TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  start_lock_date DATE NOT NULL,
  start_lock_t TIME NOT NULL,
  end_lock_date DATE NOT NULL,
  end_lock_t TIME NOT NULL,
  PRIMARY KEY (user_id),
  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

--Records user's performance in exercises
CREATE TABLE users_exercises (
  exercise_id TINYINT(3) AUTO_INCREMENT PRIMARY KEY,
  user_id TINYINT(3) UNSIGNED NOT NULL,
  exercise_name VARCHAR(50),
  score TINYINT(3) NOT NULL DEFAULT 0,
  t_completed TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

--Stores users' social posts
CREATE TABLE posts (
  post_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  user_id TINYINT(3) UNSIGNED NOT NULL,
  content VARCHAR(255) NOT NULL,
  post_t TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (post_id),
  FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);