CREATE TABLE `password_reset` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `email` VARCHAR(255),
    `token` VARCHAR(255) UNIQUE
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = uft8_unicode_ci;