CREATE TABLE `hillel`.`posts`
(
    `id`      BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `user`    BIGINT UNSIGNED NOT NULL,
    `title`   VARCHAR(255) NOT NULL,
    `content` MEDIUMTEXT   NOT NULL,
    `image`   VARCHAR(500) NOT NULL,
    `created` DATETIME     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
