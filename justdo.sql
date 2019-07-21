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

 Date: 22/07/2019 00:08:19
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
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of crud
-- ----------------------------
INSERT INTO `crud` VALUES (1, 'muhammad irfan ibnu fdsfdsfds fdsfdfd dsadsadssda', 'mpampam5@gmail.com', '08529999595', 'makassar');
INSERT INTO `crud` VALUES (2, 'pingendo', 'mpampam', '0876525626', 'jeneponto');
INSERT INTO `crud` VALUES (3, 'dsadsdsa', 'dsada', '231', 'das');
INSERT INTO `crud` VALUES (4, 'irfandi', 'mpampam5@gmail.com', '321321', 'makassar');
INSERT INTO `crud` VALUES (5, 'gf', 'gfgf', '5454', 'kjjkj');
INSERT INTO `crud` VALUES (6, 'dddwdw', 'dsds', '323223', 'ds');
INSERT INTO `crud` VALUES (7, 'sasa', 'ssasa', '2121', 'sasa');

-- ----------------------------
-- Table structure for tb_member
-- ----------------------------
DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member`  (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_referral` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posisi` enum('kiri','kanan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `referral_from` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_member
-- ----------------------------
INSERT INTO `tb_member` VALUES (1, 'admin utama', 'admin', 'admin', '19072019000001', NULL, NULL, '2019-07-19 23:31:58', NULL);
INSERT INTO `tb_member` VALUES (7, 'Anak Admin kanan', 'abcd', '123456', '20072019122320', 'kanan', '19072019000001', '2019-07-20 12:23:20', NULL);
INSERT INTO `tb_member` VALUES (8, 'cucu admin kiri', 'b', '123456', '20072019122452', 'kiri', '19072019000001', '2019-07-20 12:24:52', NULL);
INSERT INTO `tb_member` VALUES (9, 'cucu buyutnya admin', 'ccucubuyut', '123456', '20072019123640', 'kiri', '19072019000001', '2019-07-20 12:36:40', NULL);
INSERT INTO `tb_member` VALUES (10, 'xdsasa', 'sassa', 'sasasasasas', '20072019123714', 'kiri', '19072019000001', '2019-07-20 12:37:14', NULL);
INSERT INTO `tb_member` VALUES (11, 'coba 1', 'coba1', '123456', '20072019124204', 'kanan', '19072019000001', '2019-07-20 12:42:04', NULL);
INSERT INTO `tb_member` VALUES (12, 'sofyan', 'dsadsa', 'dasdas', '21072019100705', 'kiri', '19072019000001', '2019-07-21 10:07:05', NULL);
INSERT INTO `tb_member` VALUES (13, 'hjmhjkghjk', 'lkkl', 'hjkhikl', '21072019100803', 'kanan', '19072019000001', '2019-07-21 10:08:03', NULL);
INSERT INTO `tb_member` VALUES (14, 'dsadsa', 'ddsads', 'dsads', '21072019100846', 'kiri', '19072019000001', '2019-07-21 10:08:46', NULL);
INSERT INTO `tb_member` VALUES (15, 'dsadas', 'dsasda', 'dsasda', '21072019011038', 'kiri', '19072019000001', '2019-07-21 01:10:38', NULL);

-- ----------------------------
-- Table structure for trans
-- ----------------------------
DROP TABLE IF EXISTS `trans`;
CREATE TABLE `trans`  (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  PRIMARY KEY (`id_trans`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans
-- ----------------------------
INSERT INTO `trans` VALUES (1, 0, 1);
INSERT INTO `trans` VALUES (6, 1, 7);
INSERT INTO `trans` VALUES (7, 7, 8);
INSERT INTO `trans` VALUES (8, 8, 9);
INSERT INTO `trans` VALUES (9, 9, 10);
INSERT INTO `trans` VALUES (10, 7, 11);
INSERT INTO `trans` VALUES (11, 1, 12);
INSERT INTO `trans` VALUES (12, 12, 13);
INSERT INTO `trans` VALUES (13, 12, 14);
INSERT INTO `trans` VALUES (14, 11, 15);

SET FOREIGN_KEY_CHECKS = 1;
