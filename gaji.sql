/*
 Navicat Premium Data Transfer

 Source Server         : Lokal
 Source Server Type    : MySQL
 Source Server Version : 50731
 Source Host           : localhost:3306
 Source Schema         : testing

 Target Server Type    : MySQL
 Target Server Version : 50731
 File Encoding         : 65001

 Date: 27/04/2021 22:18:25
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gaji
-- ----------------------------
DROP TABLE IF EXISTS `gaji`;
CREATE TABLE `gaji`  (
  `ID` int(10) NOT NULL,
  `NAMA` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `BULAN` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `VALUE` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = MyISAM CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gaji
-- ----------------------------
INSERT INTO `gaji` VALUES (1, 'ANTO', 'JANUARI', '100.000');
INSERT INTO `gaji` VALUES (2, 'ANTO', 'JANUARI', '250.000');
INSERT INTO `gaji` VALUES (3, 'ANTO', 'FEBRUARY', '300.000');
INSERT INTO `gaji` VALUES (4, 'ANTO', 'FEBRUARY', '100.000');
INSERT INTO `gaji` VALUES (5, 'DIAN', 'FEBRUARY', '10.000');

SET FOREIGN_KEY_CHECKS = 1;
