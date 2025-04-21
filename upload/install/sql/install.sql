CREATE TABLE IF NOT EXISTS `oc_variant_group` (
  `variant_group_id` INT(11) NOT NULL AUTO_INCREMENT,
  `group_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`variant_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `oc_variant_group_product` (
  `variant_group_id` INT(11) NOT NULL,
  `product_id` INT(11) NOT NULL,
  PRIMARY KEY (`variant_group_id`, `product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
