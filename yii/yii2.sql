/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50639
Source Host           : localhost:3306
Source Database       : dota

Target Server Type    : MYSQL
Target Server Version : 50639
File Encoding         : 65001

Date: 2018-05-04 17:43:51
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `auth_assignment_user_id_idx` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('Admin', '1', '系统管理员', null, null, '1524734957', '1524734957');
INSERT INTO `auth_item` VALUES ('equipcontroller_actioncreate', '2', '添加物品\r', null, null, '1524818609', '1524892142');
INSERT INTO `auth_item` VALUES ('equipcontroller_actiondelete', '2', '删除物品\r', null, null, '1524818609', '1524892142');
INSERT INTO `auth_item` VALUES ('equipcontroller_actionindex', '2', '物品首页\r', null, null, '1524818609', '1524892142');
INSERT INTO `auth_item` VALUES ('equipcontroller_actionupdate', '2', '更新物品\r', null, null, '1524818609', '1524892142');
INSERT INTO `auth_item` VALUES ('equipcontroller_actionview', '2', '物品详情\r', null, null, '1524818609', '1524892142');
INSERT INTO `auth_item` VALUES ('herocontroller_actioncreate', '2', '添加英雄\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('herocontroller_actiondelete', '2', '删除英雄\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('herocontroller_actionindex', '2', '英雄列表页\r', null, null, '1524818609', '1524892143');
INSERT INTO `auth_item` VALUES ('herocontroller_actionupdate', '2', '编辑英雄\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('herocontroller_actionview', '2', '英雄详情页\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('NewsOperater', '1', '新闻管理员', null, null, '1524734957', '1524734957');
INSERT INTO `auth_item` VALUES ('rabccontroller_actionindex', '2', '权限管理首页\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('rabccontroller_actioninit', '2', '初始化权限\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('rabccontroller_actionusers', '2', '分配权限\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('sitecontroller_actionindex', '2', '后台首页\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('sitecontroller_actionlogin', '2', '登陆页面\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('sitecontroller_actionlogout', '2', '登出页面\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('skillcontroller_actioncreate', '2', '添加技能\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('skillcontroller_actiondelete', '2', '删除技能\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('skillcontroller_actionindex', '2', '技能首页\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('skillcontroller_actionupdate', '2', '更新技能\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('skillcontroller_actionview', '2', '技能详情\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('sysusercontroller_actioncreate', '2', '添加后台用户\r', null, null, '1524818610', '1524892144');
INSERT INTO `auth_item` VALUES ('sysusercontroller_actiondelete', '2', '删除后台用户\r', null, null, '1524818610', '1524892144');
INSERT INTO `auth_item` VALUES ('sysusercontroller_actionindex', '2', '后台用户首页\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('sysusercontroller_actionupdate', '2', '更新后台用户\r', null, null, '1524818610', '1524892144');
INSERT INTO `auth_item` VALUES ('sysusercontroller_actionview', '2', '后台用户详情\r', null, null, '1524818610', '1524892143');
INSERT INTO `auth_item` VALUES ('Updater', '1', '信息更新员', null, null, '1524734957', '1524734957');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('Admin', 'equipcontroller_actioncreate');
INSERT INTO `auth_item_child` VALUES ('Admin', 'equipcontroller_actiondelete');
INSERT INTO `auth_item_child` VALUES ('NewsOperater', 'equipcontroller_actiondelete');
INSERT INTO `auth_item_child` VALUES ('Updater', 'equipcontroller_actiondelete');
INSERT INTO `auth_item_child` VALUES ('NewsOperater', 'equipcontroller_actionindex');
INSERT INTO `auth_item_child` VALUES ('Updater', 'equipcontroller_actionindex');
INSERT INTO `auth_item_child` VALUES ('Admin', 'skillcontroller_actioncreate');
INSERT INTO `auth_item_child` VALUES ('Admin', 'skillcontroller_actiondelete');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for equip
-- ----------------------------
DROP TABLE IF EXISTS `equip`;
CREATE TABLE `equip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(4) DEFAULT '0',
  `mana` tinyint(4) NOT NULL,
  `price` int(11) NOT NULL,
  `sid` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '子物品id',
  `type` tinyint(4) DEFAULT NULL COMMENT '类型-1-装备，0-卷轴',
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of equip
-- ----------------------------
INSERT INTO `equip` VALUES ('1', '树枝', '+1 所有属性', '0', '0', '50', '', '1', '20180411439334.jpg');
INSERT INTO `equip` VALUES ('2', '速度之靴', '+50 移动速度', '0', '0', '500', '', '1', '20180411644866.jpg');
INSERT INTO `equip` VALUES ('3', '加速手套', '+15 攻击速度', '0', '0', '500', '', '1', '20180411652541.jpg');
INSERT INTO `equip` VALUES ('4', '力量腰带', '+6 力量', '0', '0', '450', '', '1', '20180411618166.jpg');
INSERT INTO `equip` VALUES ('5', '动力鞋', ' +55 移动速度 +8 所有属性 +30 攻击速度', '0', '0', '1450', '2,3,4', '1', '20180411398089.jpg');

-- ----------------------------
-- Table structure for gift
-- ----------------------------
DROP TABLE IF EXISTS `gift`;
CREATE TABLE `gift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hero_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of gift
-- ----------------------------

-- ----------------------------
-- Table structure for hero
-- ----------------------------
DROP TABLE IF EXISTS `hero`;
CREATE TABLE `hero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `str` int(11) NOT NULL,
  `int` int(11) NOT NULL,
  `dex` int(11) NOT NULL,
  `hp` int(11) NOT NULL,
  `mp` int(11) NOT NULL,
  `min_atk` int(11) NOT NULL,
  `max_atk` int(11) NOT NULL,
  `def` float(10,1) unsigned zerofill NOT NULL,
  `dps` int(11) NOT NULL,
  `speed` int(11) NOT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of hero
-- ----------------------------
INSERT INTO `hero` VALUES ('1', '帕吉', '0', '25', '14', '14', '650', '168', '52', '58', '00000001.0', '33', '280', null);
INSERT INTO `hero` VALUES ('2', '狙击手', '1', '16', '15', '21', '470', '180', '36', '42', '00000002.0', '24', '285', null);
INSERT INTO `hero` VALUES ('3', '影魔', '1', '15', '18', '20', '450', '216', '35', '41', '00000000.9', '23', '310', null);
INSERT INTO `hero` VALUES ('4', '祈求者', '2', '18', '16', '14', '524', '315', '35', '41', '00000001.2', '25', '282', null);

-- ----------------------------
-- Table structure for skill
-- ----------------------------
DROP TABLE IF EXISTS `skill`;
CREATE TABLE `skill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hero_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `damage` int(11) NOT NULL,
  `mana` int(11) NOT NULL,
  `pic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of skill
-- ----------------------------
INSERT INTO `skill` VALUES ('1', '1', '1', '肉钩', 'xxx', '90', '140', null);
INSERT INTO `skill` VALUES ('2', '1', '2', '肉钩', 'xxx', '180', '140', null);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '2',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES ('11', 'aaa', 'fHcSBA0miHalT-vI-mYXr_EH79er5Wtu', '$2y$13$XhbmhohHik10Cc9pDQ7PuuEftJp6HA4oUKumPLOQCpthrtaqYIW4a', null, '123@qq.com', '10', '2', '1524627910', '1524627910');
INSERT INTO `sys_user` VALUES ('12', 'ccc', 'yNb-z4wLtLfrFKQDU8phMj0iVHMmQ9FH', '$2y$13$B/gMznws9Nkzjd5L0xozouqOrszlArtwvOQL0yVFpXCthu2hHTjhC', null, '111@qq.com', '10', '2', '1524634799', '1524634799');
INSERT INTO `sys_user` VALUES ('13', 'asd', 'SbI7lqp9JmT0VglnnQt9yCeTd0czk_bB', '$2y$13$hjGQPnvna453YJbWPIfr..3v/IIjrCl.lpdpCm4THIdMdCkOVyD9m', null, '1111@qq.com', '10', '2', '1524635926', '1524635926');
INSERT INTO `sys_user` VALUES ('14', 'asd1', 'zwz5IKzDicHpn_mFg8PBLMPIWk4h3NCt', '$2y$13$hu3w6ZVx8LzKH.63PqslfeMtMGUoztzzIUil9b.xhWWInu8BrrI1G', null, '123112323@qq.com', '10', '2', '1524884565', '1524884565');
INSERT INTO `sys_user` VALUES ('15', 'cccc', 'TbZPfBmRPub1H_lqZfE0s30nC60jrx7T', '$2y$13$PeB7cZ3n/Abd2iLHZlRuvOtLguH2fRqs1ZyfAix8Aa9anY3KwTMRy', null, '123321@qq.com', '10', '2', '1524884689', '1524884689');
