CREATE TABLE `subscribers` (
    `id` int(255) NOT NULL AUTO_INCREMENT,
    `nome` TEXT COLLATE utf8_unicode_ci NOT NULL,
    `email` VARCHAR(255) COLLATE utf8_unicode_ci NOT NULL,
    `verify_token` VARCHAR(150) COLLATE utf8_unicode_ci DEFAULT NULL,
    `is_verified` TINYINT(1) NOT NULL DEFAULT '0',
    `created` DATETIME NOT NULL,
    `modified` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` TINYINT(1) NOT NULL DEFAULT '1',
    PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8 COLLATE = utf8_unicode_ci;