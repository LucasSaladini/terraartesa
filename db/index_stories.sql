CREATE TABLE `stories` (
    `id` INT(255) NOT NULL AUTO_INCREMENT,
    `image1` VARBINARY(max),
    `image2` VARBINARY(max),
    `image3` VARBINARY(max),
    `text1` TEXT,
    `text2` TEXT,
    `text3` TEXT
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;