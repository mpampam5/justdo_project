/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50532
 Source Host           : localhost:3306
 Source Schema         : justdo

 Target Server Type    : MySQL
 Target Server Version : 50532
 File Encoding         : 65001

 Date: 22/07/2019 19:53:37
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
-- Table structure for tb_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_admin`;
CREATE TABLE `tb_admin`  (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `is_active` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id_admin`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_admin
-- ----------------------------
INSERT INTO `tb_admin` VALUES (4, 'admin', '08633213', 'admin@gmail.com', '1', '2019-07-22 08:39:21', '2019-07-22 10:49:18');
INSERT INTO `tb_admin` VALUES (7, 'muhammad irfan ibnu', '0852888829941', 'mpampam5@gmail.com', '1', '2019-07-22 09:24:27', '2019-07-22 09:51:07');

-- ----------------------------
-- Table structure for tb_auth
-- ----------------------------
DROP TABLE IF EXISTS `tb_auth`;
CREATE TABLE `tb_auth`  (
  `id_auth` int(11) NOT NULL AUTO_INCREMENT,
  `id_personal` int(11) NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` enum('member','admin') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` date NULL DEFAULT NULL,
  PRIMARY KEY (`id_auth`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_auth
-- ----------------------------
INSERT INTO `tb_auth` VALUES (1, 4, 'admin', '$2y$10$x8FZeM6C7DCErOFzjtjcReb1mBztrPSrG9kQvxbKXl35j8mKYc7j.', '22072019105039', 'admin', '2019-07-22 08:39:22', '2019-07-22');
INSERT INTO `tb_auth` VALUES (4, 7, 'mpampam', '$2y$10$LxKykTjd4vjagZjIUM4PM.bVMFibcCC3jSzkwr2U7EsS6msI1ixEK', '22072019092428', 'admin', '2019-07-22 09:24:28', NULL);

-- ----------------------------
-- Table structure for tb_member
-- ----------------------------
DROP TABLE IF EXISTS `tb_member`;
CREATE TABLE `tb_member`  (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `telepon` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `email` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `alamat` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `foto` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `jk` enum('pria','wanita') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT 'pria',
  `username` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kode_referral` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `posisi` enum('kiri','kanan') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `referral_from` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `created` datetime NULL DEFAULT NULL,
  `modified` datetime NULL DEFAULT NULL,
  `is_active` enum('1','2') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`id_member`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 16 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tb_member
-- ----------------------------
INSERT INTO `tb_member` VALUES (1, 'admin utama', '085288882994', 'mpampam5@gmial.com', 'makassar', NULL, 'pria', 'admin', 'admin', '19072019000001', NULL, NULL, '2019-07-19 23:31:58', NULL, '1');
INSERT INTO `tb_member` VALUES (2, 'Anak Admin kanan', '085288882994', 'mpampam5@gmial.com', 'makassar', NULL, 'pria', 'abcd', '123456', '20072019122320', 'kanan', '19072019000001', '2019-07-20 12:23:20', NULL, '1');

-- ----------------------------
-- Table structure for trans_member
-- ----------------------------
DROP TABLE IF EXISTS `trans_member`;
CREATE TABLE `trans_member`  (
  `id_trans` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `is_active` enum('1','0') CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT '1',
  PRIMARY KEY (`id_trans`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of trans_member
-- ----------------------------
INSERT INTO `trans_member` VALUES (1, 0, 1, '1');
INSERT INTO `trans_member` VALUES (2, 1, 2, '1');

SET FOREIGN_KEY_CHECKS = 1;
