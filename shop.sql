/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : shop

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 18/08/2018 09:30:16
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sh_auth
-- ----------------------------
DROP TABLE IF EXISTS `sh_auth`;
CREATE TABLE `sh_auth`  (
  `auth_id` int(11) NOT NULL AUTO_INCREMENT,
  `auth_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `auth_c` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `auth_a` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `pid` int(11) NULL DEFAULT 0,
  `create_time` int(11) NULL DEFAULT 0,
  `update_time` int(11) NULL DEFAULT 0,
  PRIMARY KEY (`auth_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sh_auth
-- ----------------------------
INSERT INTO `sh_auth` VALUES (1, '所有权限', '*', '*', 0, 0, 0);
INSERT INTO `sh_auth` VALUES (2, '用户权限', 'user', '*', 1, 0, 0);
INSERT INTO `sh_auth` VALUES (3, '用户列表', 'user', 'user_list', 2, 0, 0);
INSERT INTO `sh_auth` VALUES (4, '权限管理', 'auth', '*', 1, 0, 0);
INSERT INTO `sh_auth` VALUES (5, '权限列表', 'auth', 'auth_list', 4, 0, 0);
INSERT INTO `sh_auth` VALUES (6, '角色权限', 'role', '*', 1, 0, 0);
INSERT INTO `sh_auth` VALUES (7, '角色列表', 'role', 'role_list', 6, 0, 0);

-- ----------------------------
-- Table structure for sh_role
-- ----------------------------
DROP TABLE IF EXISTS `sh_role`;
CREATE TABLE `sh_role`  (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `auth_ids_list` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `create_time` int(11) NULL DEFAULT 0,
  `update_time` int(11) NULL DEFAULT 0,
  `role_rema` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sh_role
-- ----------------------------
INSERT INTO `sh_role` VALUES (1, '超级管理员', '*', 1534323833, 1534323833, '秒天秒地秒人间');
INSERT INTO `sh_role` VALUES (2, '小明', '2,3,6,7', 1534494938, 1534494938, '新人');

-- ----------------------------
-- Table structure for sh_user
-- ----------------------------
DROP TABLE IF EXISTS `sh_user`;
CREATE TABLE `sh_user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `password` char(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '',
  `role_id` tinyint(4) NULL DEFAULT 0,
  `create_time` int(11) NULL DEFAULT 0,
  `update_time` int(11) NULL DEFAULT 0,
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `beihzu` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` tinyint(1) NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of sh_user
-- ----------------------------
INSERT INTO `sh_user` VALUES (2, 'admin', '569dadef7df19b8807d2305e9e764415', 1, 1534402534, 1534402534, '17620933150', '17620933150@163.com', '123456789\n', 1);
INSERT INTO `sh_user` VALUES (9, '小明', '569dadef7df19b8807d2305e9e764415', 2, 1534496681, 1534496681, '17620933150', '17620933150@163.com', '123456798', NULL);
INSERT INTO `sh_user` VALUES (10, '小兰', '569dadef7df19b8807d2305e9e764415', 2, 1534497226, 1534497226, '17620933150', '17620933150@163.com', '132456', 1);

SET FOREIGN_KEY_CHECKS = 1;
