/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50547
Source Host           : localhost:3306
Source Database       : yii2advanced

Target Server Type    : MYSQL
Target Server Version : 50547
File Encoding         : 65001

Date: 2016-04-15 10:35:35
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
INSERT INTO `auth_assignment` VALUES ('普通用户', '12', '1460425053');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '14', '1460425467');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '15', '1460425522');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '16', '1460426459');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '17', '1460441363');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '18', '1460687341');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '19', '1460687688');
INSERT INTO `auth_assignment` VALUES ('普通管理员', '4', null);
INSERT INTO `auth_assignment` VALUES ('超级管理员', '5', '1460687522');

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
INSERT INTO `auth_item` VALUES ('index/welcome', '2', '创建[index/welcome]权限', null, null, '1460440772', '1460440772');
INSERT INTO `auth_item` VALUES ('item/create', '2', '创建了[item/create]权限', null, null, '1459244668', '1459244668');
INSERT INTO `auth_item` VALUES ('item/delete', '2', '创建了[item/delete]权限', null, null, '1459244640', '1459244640');
INSERT INTO `auth_item` VALUES ('item/index', '2', '创建了[item/index]权限', null, null, '1459244203', '1459244203');
INSERT INTO `auth_item` VALUES ('item/permission', '2', '创建了[item/permission]权限', null, null, '1459244241', '1459244241');
INSERT INTO `auth_item` VALUES ('item/update', '2', '创建了[item/update]权限', null, null, '1459244589', '1459244589');
INSERT INTO `auth_item` VALUES ('menu/create', '2', '创建了[menu/create]权限', null, null, '1459244935', '1459244935');
INSERT INTO `auth_item` VALUES ('menu/delete', '2', '创建了[menu/delete]权限', null, null, '1459244986', '1459244986');
INSERT INTO `auth_item` VALUES ('menu/index', '2', '创建了[menu/index]权限', null, null, '1459244264', '1459244264');
INSERT INTO `auth_item` VALUES ('menu/update', '2', '创建了[menu/update]权限', null, null, '1459244958', '1459244958');
INSERT INTO `auth_item` VALUES ('permission/set', '2', '创建了[permission/set]权限', null, null, '1459244025', '1459244025');
INSERT INTO `auth_item` VALUES ('user/create', '2', '创建了[user/create]权限', null, null, '1460367527', '1460367527');
INSERT INTO `auth_item` VALUES ('user/delete', '2', '创建了[user/delete]权限', null, null, '1460428104', '1460428104');
INSERT INTO `auth_item` VALUES ('user/list', '2', '创建了[user/list]权限', null, null, '1459243859', '1459243859');
INSERT INTO `auth_item` VALUES ('user/update', '2', '创建了[user/update]权限', null, null, '1459244510', '1459244510');
INSERT INTO `auth_item` VALUES ('普通用户', '1', '创建[普通用户]角色', null, null, '1459502750', '1459502750');
INSERT INTO `auth_item` VALUES ('普通管理员', '1', '拥有后台管理权限', null, null, '1458195329', '1458195329');
INSERT INTO `auth_item` VALUES ('网站编辑', '1', '拥有编辑权限', null, null, '1458195363', '1458195363');
INSERT INTO `auth_item` VALUES ('超级管理员', '1', '拥有网站所有权限', null, null, '1458195294', '1458195294');

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
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'index/welcome');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'item/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'item/delete');
INSERT INTO `auth_item_child` VALUES ('普通管理员', 'item/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'item/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'item/permission');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'item/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'menu/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'menu/delete');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'menu/index');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'menu/update');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'permission/set');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'user/create');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'user/delete');
INSERT INTO `auth_item_child` VALUES ('普通管理员', 'user/list');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'user/list');
INSERT INTO `auth_item_child` VALUES ('超级管理员', 'user/update');

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `sort` varchar(11) DEFAULT NULL,
  `data` text,
  `status` int(4) unsigned zerofill DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  KEY `name` (`name`),
  KEY `route` (`route`(255)),
  KEY `order` (`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COMMENT='系统管理员菜单权限表';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('2', '系统管理', '0', '', '2', '', '0001');
INSERT INTO `menu` VALUES ('8', '主页', '0', '', '1', '', '0001');
INSERT INTO `menu` VALUES ('15', '欢迎页面', '8', 'index/welcome', null, '', '0001');
INSERT INTO `menu` VALUES ('16', '用户管理', '2', 'user/list', null, '', '0001');
INSERT INTO `menu` VALUES ('17', '权限配置', '2', 'permission/set', null, '', '0000');
INSERT INTO `menu` VALUES ('18', '权限配置', '2', 'permission/set', null, '', '0000');
INSERT INTO `menu` VALUES ('19', '角色管理', '2', 'item/index', null, '', '0001');
INSERT INTO `menu` VALUES ('20', '权限管理', '2', 'item/permission', null, '', '0000');
INSERT INTO `menu` VALUES ('21', '菜单管理', '2', 'menu/index', null, '', '0001');
INSERT INTO `menu` VALUES ('22', '修改用户', '2', 'user/update', null, '', '0000');
INSERT INTO `menu` VALUES ('23', '编辑角色', '2', 'item/update', null, '', '0000');
INSERT INTO `menu` VALUES ('24', '删除角色', '2', 'item/delete', null, '', '0000');
INSERT INTO `menu` VALUES ('25', '创建角色', '2', 'item/create', null, '', '0000');
INSERT INTO `menu` VALUES ('26', '创建菜单', '2', 'menu/create', null, '', '0000');
INSERT INTO `menu` VALUES ('27', '编辑菜单', '2', 'menu/update', null, '', '0000');
INSERT INTO `menu` VALUES ('28', '删除菜单', '2', 'menu/delete', null, '', '0000');
INSERT INTO `menu` VALUES ('30', '新增用户', '2', 'user/create', null, '', '0000');
INSERT INTO `menu` VALUES ('31', '删除用户', '2', 'user/delete', null, '', '0000');

-- ----------------------------
-- Table structure for migration
-- ----------------------------
DROP TABLE IF EXISTS `migration`;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of migration
-- ----------------------------
INSERT INTO `migration` VALUES ('m000000_000000_base', '1452736387');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role` smallint(6) NOT NULL DEFAULT '10',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('5', 'admin', 'pRAAzd8yMtrkTFyT4fYoNuFpDDF32BLb', '$2y$13$rdHxNkxbOroxDU7hTcjlXuwYLTNxZlJVYKWx379.ff//DZzkaLXaq', null, '272067517@qq.com', '10', '10', '1460510925', '0');
INSERT INTO `user` VALUES ('19', 'test', 'snGASMxkEQhwznuKsOQusmnc4YBGfnU7', '$2y$13$VfGUg4z/cFPiJBDHSdKF2O8PD.jNpFIU1yJQderYlVEAVlKAtKW1m', null, '272067517@qq.com', '10', '10', '1460687673', '0');

-- ----------------------------
-- Procedure structure for test1
-- ----------------------------
DROP PROCEDURE IF EXISTS `test1`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test1`()
begin
declare v_cnt decimal (10)  default 0 ;
dd:loop 
          insert  into usertb values
        (null,'用户1','2010-01-01 00:00:00',20),
        (null,'用户2','2010-01-01 00:00:00',20),
        (null,'用户3','2010-01-01 00:00:00',20),
        (null,'用户4','2010-01-01 00:00:00',20),
        (null,'用户5','2011-01-01 00:00:00',20),
        (null,'用户6','2011-01-01 00:00:00',20),
        (null,'用户7','2011-01-01 00:00:00',20),
        (null,'用户8','2012-01-01 00:00:00',20),
        (null,'用户9','2012-01-01 00:00:00',20),
        (null,'用户0','2012-01-01 00:00:00',20)
            ;
                  commit;
                    set v_cnt = v_cnt+10 ;
                           if  v_cnt = 10000000 then leave dd;
                          end if;
         end loop dd ;
end
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for test2
-- ----------------------------
DROP PROCEDURE IF EXISTS `test2`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `test2`()
begin
declare v_cnt decimal (10)  default 0 ;
dd:loop 
          insert  into usertb values
        (null,'用户1','2010-01-01 00:00:00',20),
        (null,'用户2','2010-01-01 00:00:00',20),
        (null,'用户3','2010-01-01 00:00:00',20),
        (null,'用户4','2010-01-01 00:00:00',20),
        (null,'用户5','2011-01-01 00:00:00',20),
        (null,'用户6','2011-01-01 00:00:00',20),
        (null,'用户7','2011-01-01 00:00:00',20),
        (null,'用户8','2012-01-01 00:00:00',20),
        (null,'用户9','2012-01-01 00:00:00',20),
        (null,'用户0','2012-01-01 00:00:00',20)
            ;
                  commit;
                    set v_cnt = v_cnt+10 ;
                           if  v_cnt = 10 then leave dd;
                          end if;
         end loop dd ;
end
;;
DELIMITER ;
