

CREATE TABLE `sh_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) DEFAULT '',
  `password` char(32) DEFAULT '',
  `role_id` tinyint(4) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sh_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(40) DEFAULT '',
  `auth_ids_list` varchar(100) DEFAULT '',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sh_auth` (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(40) DEFAULT '',
  `auth_c` varchar(40) DEFAULT '',
  `auth_a` varchar(40) DEFAULT '',
  `pid` int(11) DEFAULT '0',
  `create_time` int(11) DEFAULT '0',
  `update_time` int(11) DEFAULT '0',
  PRIMARY KEY (`auth_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `sh_conut` (
  `conut_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键(自增长)',
  `bomain` varchar(30) DEFAULT '' COMMENT '网站域名',
  `keyword` varchar(100) DEFAULT '' COMMENT '关键字',
  `os` varchar(30) DEFAULT '0' COMMENT '用户设备',
  `ref` varchar(30) DEFAULT '0' COMMENT '用户访问平台',
  `create_time` int(11) DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) DEFAULT '0' COMMENT '修改时间',
  PRIMARY KEY (`conut_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;







