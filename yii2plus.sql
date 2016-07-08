/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : yii2plus

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-07-08 10:23:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for auth_assignment
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` varchar(64) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('用户管理', '2', '1467889410');
INSERT INTO `auth_assignment` VALUES ('超级管理员', '1', '1467629090');
INSERT INTO `auth_assignment` VALUES ('超级管理员', '3', '1467711334');

-- ----------------------------
-- Table structure for auth_item
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('/*', '2', null, null, null, '1467628934', '1467628934');
INSERT INTO `auth_item` VALUES ('/admin/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/assignment/*', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/assign', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/index', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/revoke', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/assignment/view', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/default/*', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/default/index', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/*', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/create', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/delete', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/index', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/update', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/menu/view', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/*', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/permission/assign', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/create', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/delete', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/index', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/remove', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/permission/update', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/permission/view', '2', null, null, null, '1467628930', '1467628930');
INSERT INTO `auth_item` VALUES ('/admin/role/*', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/assign', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/create', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/delete', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/index', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/remove', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/update', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/role/view', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/*', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/assign', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/create', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/index', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/refresh', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/route/remove', '2', null, null, null, '1467628931', '1467628931');
INSERT INTO `auth_item` VALUES ('/admin/rule/*', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/create', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/delete', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/index', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/update', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/rule/view', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/activate', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/change-password', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/delete', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/index', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/login', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/logout', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/request-password-reset', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/reset-password', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/admin/user/signup', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/admin/user/view', '2', null, null, null, '1467628932', '1467628932');
INSERT INTO `auth_item` VALUES ('/debug/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/db-explain', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/download-mail', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/index', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/toolbar', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/debug/default/view', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/action', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/diff', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/index', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/preview', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/gii/default/view', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/index/welcome', '2', null, null, null, '1467885038', '1467885038');
INSERT INTO `auth_item` VALUES ('/site/*', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/error', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/index', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/login', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/site/logout', '2', null, null, null, '1467628933', '1467628933');
INSERT INTO `auth_item` VALUES ('/user/*', '2', null, null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/create', '2', null, null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/delete', '2', null, null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/index', '2', null, null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/list', '2', null, null, null, '1467684059', '1467684059');
INSERT INTO `auth_item` VALUES ('/user/update', '2', null, null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('/user/view', '2', null, null, null, '1467626433', '1467626433');
INSERT INTO `auth_item` VALUES ('普通管理员', '1', '普通管理员', null, null, '1467626553', '1467626553');
INSERT INTO `auth_item` VALUES ('用户管理', '2', '用户管理', null, null, '1467626475', '1467626475');
INSERT INTO `auth_item` VALUES ('超级权限', '2', '超级权限拥有最高级系统权限', null, null, '1467628984', '1467629027');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '超级管理员拥有最高级别系统权限', null, null, '1467629059', '1467629059');

-- ----------------------------
-- Table structure for auth_item_child
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('超级权限', '/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/assignment/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/assignment/assign');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/assignment/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/assignment/revoke');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/assignment/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/default/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/default/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/menu/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/menu/create');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/menu/delete');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/menu/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/menu/update');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/menu/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/assign');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/create');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/delete');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/remove');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/update');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/permission/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/assign');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/create');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/delete');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/remove');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/update');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/role/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/route/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/route/assign');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/route/create');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/route/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/route/refresh');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/route/remove');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/rule/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/rule/create');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/rule/delete');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/rule/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/rule/update');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/rule/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/activate');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/change-password');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/delete');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/login');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/logout');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/request-password-reset');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/reset-password');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/signup');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/admin/user/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/default/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/default/db-explain');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/default/download-mail');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/default/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/default/toolbar');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/debug/default/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/default/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/default/action');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/default/diff');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/default/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/default/preview');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/gii/default/view');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/index/welcome');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/site/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/site/error');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/site/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/site/login');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/site/logout');
INSERT INTO `auth_item_child` VALUES ('用户管理', '/user/*');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/*');
INSERT INTO `auth_item_child` VALUES ('用户管理', '/user/create');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/create');
INSERT INTO `auth_item_child` VALUES ('用户管理', '/user/delete');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/delete');
INSERT INTO `auth_item_child` VALUES ('用户管理', '/user/index');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/index');
INSERT INTO `auth_item_child` VALUES ('用户管理', '/user/list');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/list');
INSERT INTO `auth_item_child` VALUES ('用户管理', '/user/update');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/update');
INSERT INTO `auth_item_child` VALUES ('超级权限', '/user/view');
INSERT INTO `auth_item_child` VALUES ('普通管理员', '用户管理');
INSERT INTO `auth_item_child` VALUES ('超级管理员', '超级权限');

-- ----------------------------
-- Table structure for auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------
INSERT INTO `auth_rule` VALUES ('编辑文章', 'O:30:\"backend\\components\\ArticleRule\":3:{s:4:\"name\";s:12:\"编辑文章\";s:9:\"createdAt\";i:1467706283;s:9:\"updatedAt\";i:1467706305;}', '1467706283', '1467706305');

-- ----------------------------
-- Table structure for country
-- ----------------------------
DROP TABLE IF EXISTS `country`;
CREATE TABLE `country` (
  `code` char(2) NOT NULL,
  `name` char(52) NOT NULL,
  `population` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of country
-- ----------------------------
INSERT INTO `country` VALUES ('AU', 'Australia', '18886000');
INSERT INTO `country` VALUES ('BR', 'Brazil', '170115000');
INSERT INTO `country` VALUES ('CA', 'Canada', '1147000');
INSERT INTO `country` VALUES ('CN', 'China', '1277558000');
INSERT INTO `country` VALUES ('DE', 'Germany', '82164700');
INSERT INTO `country` VALUES ('FR', 'France', '59225700');
INSERT INTO `country` VALUES ('GB', 'United Kingdom', '59623400');
INSERT INTO `country` VALUES ('IN', 'India', '1013662000');
INSERT INTO `country` VALUES ('RU', 'Russia', '146934000');
INSERT INTO `country` VALUES ('US', 'United States', '278357000');

-- ----------------------------
-- Table structure for goods
-- ----------------------------
DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods
-- ----------------------------
INSERT INTO `goods` VALUES ('1', '11111');
INSERT INTO `goods` VALUES ('2', '22222');
INSERT INTO `goods` VALUES ('3', '333');
INSERT INTO `goods` VALUES ('4', '444');
INSERT INTO `goods` VALUES ('5', '555');

-- ----------------------------
-- Table structure for log
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) DEFAULT NULL,
  `ip` varchar(64) DEFAULT NULL,
  `data` varchar(64) DEFAULT NULL,
  `create_time` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of log
-- ----------------------------
INSERT INTO `log` VALUES ('1', 'lzkong1029', '127.0.0.1', '', '1460439851');
INSERT INTO `log` VALUES ('2', 'lzkong1029', '127.0.0.1', '', '1460441344');
INSERT INTO `log` VALUES ('3', 'test', '127.0.0.1', '', '1460441372');
INSERT INTO `log` VALUES ('4', 'lzkong1029', '127.0.0.1', '', '1460441448');
INSERT INTO `log` VALUES ('5', 'lzkong1029', '127.0.0.1', '', '1460443092');
INSERT INTO `log` VALUES ('6', 'test', '127.0.0.1', '', '1460510935');
INSERT INTO `log` VALUES ('7', 'lzkong1029', '127.0.0.1', '', '1460511022');
INSERT INTO `log` VALUES ('8', 'lzkong1029', '127.0.0.1', '', '1460511099');
INSERT INTO `log` VALUES ('9', 'test', '127.0.0.1', '', '1460511126');
INSERT INTO `log` VALUES ('10', 'lzkong1029', '127.0.0.1', '', '1460518525');
INSERT INTO `log` VALUES ('11', 'test', '127.0.0.1', '', '1460529644');
INSERT INTO `log` VALUES ('12', 'lzkong1029', '127.0.0.1', '', '1460683222');
INSERT INTO `log` VALUES ('13', 'test', '127.0.0.1', '', '1460687319');
INSERT INTO `log` VALUES ('14', 'lzkong1029', '127.0.0.1', '', '1460687331');
INSERT INTO `log` VALUES ('15', 'admin', '127.0.0.1', '', '1460687467');
INSERT INTO `log` VALUES ('16', 'admin', '127.0.0.1', '', '1460713859');
INSERT INTO `log` VALUES ('17', 'admin', '127.0.0.1', '', '1466130336');
INSERT INTO `log` VALUES ('18', 'test', '127.0.0.1', '', '1467701285');
INSERT INTO `log` VALUES ('19', 'admin', '127.0.0.1', '', '1467704379');
INSERT INTO `log` VALUES ('20', 'admin', '127.0.0.1', '', '1467711872');
INSERT INTO `log` VALUES ('21', 'test', '127.0.0.1', '', '1467711883');
INSERT INTO `log` VALUES ('22', 'admin', '127.0.0.1', '', '1467712267');
INSERT INTO `log` VALUES ('23', 'test', '127.0.0.1', '', '1467799040');
INSERT INTO `log` VALUES ('24', 'admin', '127.0.0.1', '', '1467806743');
INSERT INTO `log` VALUES ('25', 'admin', '127.0.0.1', '', '1467874541');
INSERT INTO `log` VALUES ('26', 'test', '127.0.0.1', '', '1467885125');
INSERT INTO `log` VALUES ('27', 'admin', '127.0.0.1', '', '1467888107');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '用户管理', null, '/user/list', null, 0x7B2269636F6E223A202266612066612D75736572227D);
INSERT INTO `menu` VALUES ('2', '权限控制', null, '/admin/default/index', '1', 0x7B2269636F6E223A202266612066612D6B6579227D);
INSERT INTO `menu` VALUES ('3', '路由列表', '2', '/admin/route/index', '2', null);
INSERT INTO `menu` VALUES ('4', '菜单管理', '2', '/admin/menu/index', '7', null);
INSERT INTO `menu` VALUES ('5', '权限管理', '2', '/admin/permission/index', '3', null);
INSERT INTO `menu` VALUES ('6', '角色管理', '2', '/admin/role/index', '4', null);
INSERT INTO `menu` VALUES ('7', '分配权限', '2', '/admin/assignment/index', '5', null);
INSERT INTO `menu` VALUES ('8', '用户列表', '1', '/user/list', '1', 0x7B2269636F6E223A202266612066612D7573657273227D);
INSERT INTO `menu` VALUES ('9', '规则管理', '2', '/admin/rule/index', '6', null);
INSERT INTO `menu` VALUES ('10', '三级列表', '8', '/user/update', null, 0x7B2269636F6E223A202266612066612D75736572227D);

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1467622624');
INSERT INTO `migration` VALUES ('m140602_111327_create_menu_table', '1467622628');
INSERT INTO `migration` VALUES ('m160312_050000_create_user', '1467622628');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'C5f5K1Kg8tL-IutYAom4-s7RMh_xMk_l', '$2y$13$zUhKPW6Y69gn.DDWjSI.kOp9OXZWSuMDTq5JRZvw6yK9dr2QK43qu', null, '272067517@qq.com', '10', '1467626063', '1467626063');
INSERT INTO `user` VALUES ('2', 'test', 'C5f5K1Kg8tL-IutYAom4-s7RMh_xMk_l', '$2y$13$zUhKPW6Y69gn.DDWjSI.kOp9OXZWSuMDTq5JRZvw6yK9dr2QK43qu', null, '2720675171@qq.com', '10', '1467629909', '1467629909');
