INSERT INTO `tracksocial`.`users` (`user_login`, `user_pass`) VALUES ('user1@ts.com', 'user1');
INSERT INTO `tracksocial`.`users` (`user_login`, `user_pass`) VALUES ('user2@ts.com', 'user2');
INSERT INTO `tracksocial`.`users` (`user_login`, `user_pass`) VALUES ('user3@ts.com', 'user3');

INSERT INTO `tracksocial`.`media` (`nome`, `url_twitter`, `url_instagram`, `is_twitter`, `is_instagram`, `is_mentions`, `is_hashtags`) VALUES ('media1', '@media1', '', '1', '0', '1', '1');
INSERT INTO `tracksocial`.`media` (`nome`, `url_instagram`, `is_twitter`, `is_instagram`, `is_mentions`, `is_hashtags`) VALUES ('media2', 'media_2', '0', '1', '1', '0');
INSERT INTO `tracksocial`.`media` (`nome`, `url_twitter`, `url_instagram`, `is_twitter`, `is_instagram`, `is_mentions`, `is_hashtags`) VALUES ('media3', '@media3', 'media_3', '1', '1', '1', '1');
INSERT INTO `tracksocial`.`media` (`nome`, `url_twitter`, `url_instagram`, `is_twitter`, `is_instagram`, `is_mentions`, `is_hashtags`) VALUES ('media4', '@media4', '4_media', '1', '1', '0', '1');
INSERT INTO `tracksocial`.`media` (`nome`, `url_instagram`, `is_twitter`, `is_instagram`, `is_mentions`, `is_hashtags`) VALUES ('media5', '5_media', '0', '1', '0', '1');

INSERT INTO `tracksocial`.`tags` (`nome`, `user_id`) VALUES ('tag1', '1');
INSERT INTO `tracksocial`.`tags` (`nome`, `user_id`) VALUES ('tag2', '1');
INSERT INTO `tracksocial`.`tags` (`nome`, `user_id`) VALUES ('tag3', '1');
INSERT INTO `tracksocial`.`tags` (`nome`, `user_id`) VALUES ('tag4', '1');
INSERT INTO `tracksocial`.`tags` (`nome`, `user_id`) VALUES ('tag5', '1');


# twitter api

INSERT INTO `search_terms` (`id`, `term`) VALUES (1, 'yolo'), (2, 'fact');