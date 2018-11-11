/*
MySQL Data Transfer
Source Host: localhost
Source Database: login_zmh
Target Host: localhost
Target Database: login_zmh
Date: 2018/6/20 21:26:46
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for addresslist
-- ----------------------------
DROP TABLE IF EXISTS `addresslist`;
CREATE TABLE `addresslist` (
  `Id` int(100) NOT NULL AUTO_INCREMENT,
  `name_zmh` varchar(100) COLLATE utf8_bin NOT NULL,
  `Nickname_zmh` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '',
  `phone_zmh` int(50) DEFAULT NULL,
  `Email_zmh` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `qq_zmh` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `picture_zmh` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `username_zmh` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `gourp_zmh` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Beizhu1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Beizhu2` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`Id`,`name_zmh`,`Nickname_zmh`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Table structure for personal
-- ----------------------------
DROP TABLE IF EXISTS `personal`;
CREATE TABLE `personal` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `idcard` int(100) DEFAULT NULL,
  `phone` int(50) DEFAULT NULL,
  `jianjie` varchar(300) COLLATE utf8mb4_bin DEFAULT NULL,
  `beiyong2` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  `beiyong3` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `roleid` int(100) DEFAULT NULL,
  `rolename` varchar(100) COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Table structure for userinfo
-- ----------------------------
DROP TABLE IF EXISTS `userinfo`;
CREATE TABLE `userinfo` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `username_zmh` varchar(100) COLLATE utf8_bin NOT NULL,
  `Password_zmh` int(100) DEFAULT NULL,
  `Role_zmh` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Beizhu1` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `Beizhu2` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`username_zmh`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `addresslist` VALUES ('2', '权志龙', '权三岁', '1235154236', '58126@163.com', '58415622', null, '太阳', null, null, null);
INSERT INTO `addresslist` VALUES ('4', '张三丰', '包子', '1575669556', '25162@126.com', '49513654', null, '太阳', null, null, null);
INSERT INTO `addresslist` VALUES ('5', '张会', '', '2147483647', '152345842@qq.com', '45826414', null, '张明华', null, null, null);
INSERT INTO `addresslist` VALUES ('5', '张雨生', '水果', '1846526588', '52152@126.com', '85126622', null, '张明华', null, null, null);
INSERT INTO `addresslist` VALUES ('6', '王五', '石青', '123346223', '86324@126.com', '65512035', null, '太阳', null, null, null);
INSERT INTO `addresslist` VALUES ('7', 'mm', '', '125', '455', '455', null, null, null, null, null);
INSERT INTO `addresslist` VALUES ('8', 'zz', 'zz', '133552452', '1545158415@qq.com', '1535652', null, '太阳', null, null, null);
INSERT INTO `roles` VALUES ('1', '1', '超级管理员');
INSERT INTO `roles` VALUES ('2', '2', '管理员');
INSERT INTO `roles` VALUES ('3', '3', '普通会员');
INSERT INTO `userinfo` VALUES ('1', '张明华', '123456', '超级管理员', null, null);
INSERT INTO `userinfo` VALUES ('2', '太阳', '123123', '普通会员', null, null);
INSERT INTO `userinfo` VALUES ('3', '微微', '123123', '2', null, null);
INSERT INTO `userinfo` VALUES ('4', '张青', '123123', '3', null, null);
INSERT INTO `userinfo` VALUES ('5', '李四', '789789', '3', null, null);
INSERT INTO `userinfo` VALUES ('6', '红红', '123123', '3', null, null);
INSERT INTO `userinfo` VALUES ('7', '兰兰', '789789', '2', null, null);
INSERT INTO `userinfo` VALUES ('8', 'zz', '11', '2', null, null);
