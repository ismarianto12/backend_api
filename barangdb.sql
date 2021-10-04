/*
 Navicat Premium Data Transfer

 Source Server         : 103.219.112.114
 Source Server Type    : MySQL
 Source Server Version : 50516
 Source Host           : localhost:3306
 Source Schema         : barangdb

 Target Server Type    : MySQL
 Target Server Version : 50516
 File Encoding         : 65001

 Date: 04/02/2021 00:16:51
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for penjualan
-- ----------------------------
DROP TABLE IF EXISTS `penjualan`;
CREATE TABLE `penjualan`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `barang_id` int(14) NOT NULL,
  `nominal` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `user_created` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_update` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of penjualan
-- ----------------------------

-- ----------------------------
-- Table structure for tmbarang
-- ----------------------------
DROP TABLE IF EXISTS `tmbarang`;
CREATE TABLE `tmbarang`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_beli` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga_jual` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `kategori_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `suplier_id` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `stok` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_created` datetime NOT NULL,
  `user_id` int(15) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tmbarang
-- ----------------------------
INSERT INTO `tmbarang` VALUES (3, 'GA23FG', 'SHAMPO', '12.0000', '23.000', '1', '1', '12', '2021-02-03 16:17:33', 1);
INSERT INTO `tmbarang` VALUES (4, 'LA23FG', 'SHAMPO', '12.0000', '23.000', '1', '1', '12', '2021-02-03 16:18:04', 1);

-- ----------------------------
-- Table structure for tmkategori
-- ----------------------------
DROP TABLE IF EXISTS `tmkategori`;
CREATE TABLE `tmkategori`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `user_id` int(15) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tmkategori
-- ----------------------------

-- ----------------------------
-- Table structure for tmlogin
-- ----------------------------
DROP TABLE IF EXISTS `tmlogin`;
CREATE TABLE `tmlogin`  (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(40) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tmlogin
-- ----------------------------
INSERT INTO `tmlogin` VALUES (1, 'rian', '$2y$10$nDCKgFwPOWTLu/1BRI8BgORJjCsxtxcADk/Je20hvIxViCgvO9XnO', 'Rian', 'test@test.com', '2021-01-25 00:00:00', NULL);
INSERT INTO `tmlogin` VALUES (2, 'admin', '$2y$10$y2Yb04TocMj8SNp3kvO7qu0oBP6kVVGImQfVReDG0CIdui0hfnGxu', 'Rian', 'ss@test.com', '2021-01-25 00:00:00', NULL);
INSERT INTO `tmlogin` VALUES (3, 'ttesting', '$2y$10$3zp7nRZHr1fG5g5m1vOxiO4yLs54uJH9O96NT8QcBk/rrSs6fKuL.', '123', 'ttesting', '2021-02-03 09:41:48', '2021-02-03 09:41:48');
INSERT INTO `tmlogin` VALUES (4, 'ttesting', '$2y$10$PoXsdsqHOinOClqFOD4Db.1tpQpiySnMndrFTkcKM71dq.FkFof8u', '123', 'ttesting', '2021-02-03 09:50:11', '2021-02-03 09:50:11');

-- ----------------------------
-- Table structure for tmsuplier
-- ----------------------------
DROP TABLE IF EXISTS `tmsuplier`;
CREATE TABLE `tmsuplier`  (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `kode` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `nama` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `npwp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `status_aktif` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `date_created` date NOT NULL,
  `date_updated` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tmsuplier
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
