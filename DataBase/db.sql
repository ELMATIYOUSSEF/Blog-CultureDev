
-- create table admin 
CREATE TABLE `admin`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    `first_name` varchar(255) DEFAULT NULL,
    `last_name` varchar(255) DEFAULT NULL,
    `Email` varchar(255) UNIQUE,
    `PassWord` varchar(255) DEFAULT NULL
);


-- create table Person
CREATE TABLE `author`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    `first_name` varchar(255) DEFAULT NULL,
    `last_name` varchar(255) DEFAULT NULL
);


-- create table Category 
CREATE TABLE `category`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    `name` varchar(255) DEFAULT NULL
);

-- create table article
CREATE TABLE `article`(
    `Id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL ,
    `image` varchar(255) ,
    `title` varchar(255) DEFAULT NULL,
    `id_category` int(11),
    `id_author` int(11),
    `content` text DEFAULT NULL,
    `date_created` date DEFAULT NULL,  
    CONSTRAINT Fk_CategorieArticle FOREIGN KEY (id_category) REFERENCES category(Id) ON UPDATE CASCADE ON DELETE CASCADE ,
    CONSTRAINT Fk_authorArticle FOREIGN KEY (id_author) REFERENCES author(Id) ON UPDATE CASCADE ON DELETE CASCADE 
);