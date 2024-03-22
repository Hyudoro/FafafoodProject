-- Création de la BDD
CREATE DATABASE IF NOT EXISTS `partage_de_recettes`;
USE `partage_de_recettes`;

-- Création de la table recipes
CREATE TABLE IF NOT EXISTS `recipes` (
    `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
    `title` varchar(128) NOT NULL,
    `recipe` TEXT NOT NULL,
    `author` varchar(255) NOT NULL,
    `is_enabled` BOOLEAN NOT NULL,
    PRIMARY KEY (`recipe_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Création de la table users
CREATE TABLE IF NOT EXISTS `users` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `full_name` varchar(64) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `age` INT NOT NULL,
    PRIMARY KEY (`user_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

delete from `users`;
insert into `users` (`age`, `email`, `full_name`, `password`, `user_id`) values (34, 'mickael.andrieu@exemple.com', 'Mickaël Andrieu', 'devine', 1);
insert into `users` (`age`, `email`, `full_name`, `password`, `user_id`) values (34, 'mathieu.nebra@exemple.com', 'Mathieu Nebra', 'MiamMiam', 2);
insert into `users` (`age`, `email`, `full_name`, `password`, `user_id`) values (28, 'laurene.castor@exemple.com', 'Laurène Castor', 'laCasto28', 3);

delete from `recipes`;
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('mickael.andrieu@exemple.com', 1, "Le cassoulet est une spécialité régionale du Languedoc, à base de haricots secs, généralement blancs, et de viande. À son origine, il était à base de fèves. Le cassoulet tient son nom de la cassole en terre cuite émaillée dite caçòla1 en occitan et fabriquée à Issel.\n", 1, 'Cassoulet');
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('mickael.andrieu@exemple.com', 0, "Le couscous est d'une part une semoule de blé dur préparée à l'huile d'olive (un des aliments de base traditionnel de la cuisine des pays du Maghreb) et d'autre part, une spécialité culinaire issue de la cuisine berbère, à base de couscous, de légumes, d'épices, d'huile d'olive et de viande (rouge ou de volaille) ou de poisson.", 2, 'Couscous');
insert into `recipes` (`author`, `is_enabled`, `recipe`, `recipe_id`, `title`) values ('laurene.castor@exemple.com', 0, "La salade César est une recette de cuisine de salade composée de la cuisine américaine, traditionnellement préparée en salle à côté de la table, à base de laitue romaine, œuf dur, croûtons, parmesan et de « sauce César » à base de parmesan râpé, huile d'olive, pâte d'anchois, ail, vinaigre de vin, moutarde, jaune d'œuf et sauce Worcestershire.", 4, 'Salade Romaine');
