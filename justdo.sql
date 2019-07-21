/*
 Navicat Premium Data Transfer

 Source Server         : mpampam
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : justdo

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 17/07/2019 01:09:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for crud
-- ----------------------------
DROP TABLE IF EXISTS `crud`;
CREATE TABLE `crud`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of crud
-- ----------------------------
INSERT INTO `crud` VALUES (1, 'muhammad irfan ibnu fdsfdsfds fdsfdfd dsadsadssda', 'mpampam5@gmail.com', '08529999595', 'makassar');
INSERT INTO `crud` VALUES (2, 'pingendo', 'mpampam', '0876525626', 'jeneponto');
INSERT INTO `crud` VALUES (3, 'dsadsdsa', 'dsada', '231', 'das');
INSERT INTO `crud` VALUES (4, 'irfandi', 'mpampam5@gmail.com', '321321', 'makassar');
INSERT INTO `crud` VALUES (5, 'gf', 'gfgf', '5454', 'kjjkj');
INSERT INTO `crud` VALUES (6, 'dddwdw', 'dsds', '323223', 'ds');

SET FOREIGN_KEY_CHECKS = 1;
