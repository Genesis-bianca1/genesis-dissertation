CREATE DATABASE platform; --if0_37361428_platform

CREATE TABLE posts (
  post_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  content VARCHAR(255) NOT NULL,
  timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  user_id TINYINT(3) UNSIGNED,
  PRIMARY KEY (post_id),
  KEY FK_user_id (user_id),
  CONSTRAINT FK_user_id FOREIGN KEY(user_id) REFERENCES users(user_id) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE users (
  user_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  username VARCHAR(50) NOT NULL,
  forename VARCHAR(50) NOT NULL,
  surname VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  passcode VARCHAR(255) NOT NULL,
  PRIMARY KEY (user_id)
);

CREATE TABLE user_performance (
  user_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  weak_areas VARCHAR(255),
  recommended_exercises VARCHAR(255),
  PRIMARY KEY (user_id),
  CONSTRAINT user_performance FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);

CREATE TABLE user_progress (
  user_id TINYINT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
  challenge_id TINYINT(3) UNSIGNED,
  score TINYINT(3) UNSIGNED,
  time_spent SMALLINT(5) UNSIGNED,
  correct_answers TINYINT(3) UNSIGNED,
  PRIMARY KEY (user_id, challenge_id),
  CONSTRAINT user_progress FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE
);