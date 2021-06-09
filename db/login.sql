CREATE TABLE `login` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `user` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NUL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `authtoken` VARCHAR(255) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = uft8_unicode_ci;