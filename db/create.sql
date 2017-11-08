create table users (
	id bigint not null auto_increment,
	user_login varchar(255),
	user_pass varchar(255),
	primary key (id)
);
    
create table media (
	id bigint not null auto_increment,
	nome varchar(255),
	url_twitter varchar(255),
    url_instagram varchar(255),
    is_twitter tinyint(1) not null,
    is_instagram tinyint(1) not null,
    is_mentions tinyint(1) not null,
    is_hashtags tinyint(1) not null,
	primary key (id)
);

create table mentions (
	id bigint not null auto_increment,
	texto longtext,
	origem varchar(255),
    data_mention datetime,
    tag_id bigint not null,
	primary key (id)
);

create table tags (
	id bigint not null auto_increment,
	nome varchar(255),
	user_id bigint not null,
	primary key (id)
);


# twitter api

CREATE TABLE IF NOT EXISTS `search_terms` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `term` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

CREATE TABLE IF NOT EXISTS `tweets` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `tweet_id` text NOT NULL,
  `user_id` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;