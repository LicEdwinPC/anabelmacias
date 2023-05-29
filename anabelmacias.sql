/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100413
 Source Host           : localhost:3307
 Source Schema         : anabelmacias

 Target Server Type    : MySQL
 Target Server Version : 100413
 File Encoding         : 65001

 Date: 29/05/2023 16:24:40
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for ca_tipo_platillo
-- ----------------------------
DROP TABLE IF EXISTS `ca_tipo_platillo`;
CREATE TABLE `ca_tipo_platillo`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `UAct` int(11) NULL DEFAULT NULL,
  `FAct` timestamp(6) NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of ca_tipo_platillo
-- ----------------------------
INSERT INTO `ca_tipo_platillo` VALUES (1, 'Comida', 1, '2023-04-17 15:49:11.492914');
INSERT INTO `ca_tipo_platillo` VALUES (2, 'Postre', 1, '2023-04-17 15:49:17.227603');

-- ----------------------------
-- Table structure for de_menu
-- ----------------------------
DROP TABLE IF EXISTS `de_menu`;
CREATE TABLE `de_menu`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ma_menu` int(11) NULL DEFAULT NULL,
  `id_tipo` int(11) NULL DEFAULT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `FAct` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `UAct` int(11) NULL DEFAULT NULL,
  `FCreated` date NULL DEFAULT NULL,
  `IdUserCreated` int(11) NULL DEFAULT NULL,
  `NoPlatillos` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 73 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of de_menu
-- ----------------------------
INSERT INTO `de_menu` VALUES (1, 1, 1, 'pozole', '2023-04-18 03:51:25.000000', NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (2, 1, 2, 'pay de queso', '2023-04-18 03:51:25.000000', NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (3, 2, 1, 'Sopitos', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (4, 2, 2, 'flan', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (5, 3, 1, 'tatemado', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (6, 3, 2, 'capirotada', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (7, 4, 1, 'Enchiladas', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (8, 4, 2, 'Helado', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (9, 5, 1, 'ccccc', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (10, 5, 2, 'ppppp', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (13, 7, 1, 'ccccccc', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (14, 7, 2, 'pppppppp', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (15, 8, 1, 'ccccc', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (16, 8, 2, 'ppppp', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (17, 9, 1, 'cccccc', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (18, 9, 2, 'pppppppp', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (19, 10, 1, 'qeqeqeqeq', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (20, 10, 2, 'aasasasasa', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (21, 11, 1, 'chiles ennogada', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (22, 11, 2, 'cremitas', NULL, NULL, '2023-04-18', 1, NULL);
INSERT INTO `de_menu` VALUES (25, 12, 1, 'pozole', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (26, 12, 2, 'flan', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (27, 13, 1, 'sopitos', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (28, 13, 2, 'capirotada', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (29, 14, 1, 'tostadas', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (30, 14, 2, 'arroz en leche', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (31, 15, 1, 'enchiladas', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (32, 15, 2, 'chognos zamoranos', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (33, 16, 1, 'sopes gordos', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (34, 16, 2, 'cremitas', NULL, NULL, '2023-04-24', 1, NULL);
INSERT INTO `de_menu` VALUES (35, 17, 1, 'comida', NULL, NULL, '2023-04-27', 1, NULL);
INSERT INTO `de_menu` VALUES (36, 17, 2, 'postre', NULL, NULL, '2023-04-27', 1, NULL);
INSERT INTO `de_menu` VALUES (37, 18, 1, 'comida2', NULL, NULL, '2023-04-27', 1, NULL);
INSERT INTO `de_menu` VALUES (38, 18, 2, 'postre2', NULL, NULL, '2023-04-27', 1, NULL);
INSERT INTO `de_menu` VALUES (39, 19, 1, 'comida1', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (40, 19, 2, 'pstre1', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (41, 20, 1, 'comida2', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (42, 20, 2, 'postre2', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (43, 21, 1, 'comida3', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (44, 21, 2, 'postre3', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (45, 22, 1, 'comida4', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (46, 22, 2, 'postre4', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (47, 23, 1, 'comida5', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (48, 23, 2, 'postre5', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (49, 24, 1, 'comida6', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (50, 24, 2, 'postre6', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (51, 25, 1, 'comida7', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (52, 25, 2, 'postre7', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (53, 26, 1, 'comida9', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (54, 26, 2, 'postre8', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (55, 27, 1, 'comida9', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (56, 27, 2, 'postre9', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (57, 28, 1, 'comida10', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (58, 28, 2, 'postre10', NULL, NULL, '2023-05-11', 1, NULL);
INSERT INTO `de_menu` VALUES (59, 29, 1, 'comida11', NULL, NULL, '2023-05-18', 1, NULL);
INSERT INTO `de_menu` VALUES (60, 29, 2, 'postre11', NULL, NULL, '2023-05-18', 1, NULL);
INSERT INTO `de_menu` VALUES (61, 30, 1, 'comida23', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (62, 30, 2, 'postre23', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (63, 31, 1, 'comida24', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (64, 31, 2, 'postre24', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (65, 32, 1, 'comida25', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (66, 32, 2, 'postre25', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (67, 33, 1, 'comida26', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (68, 33, 2, 'postre26', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (69, 34, 1, 'comida27', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (70, 34, 2, 'postre27', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (71, 35, 1, 'comida28', NULL, NULL, '2023-05-23', 1, NULL);
INSERT INTO `de_menu` VALUES (72, 35, 2, 'postre28', NULL, NULL, '2023-05-23', 1, NULL);

-- ----------------------------
-- Table structure for de_pedidos
-- ----------------------------
DROP TABLE IF EXISTS `de_pedidos`;
CREATE TABLE `de_pedidos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ma_pedido` int(11) NOT NULL,
  `id_detalle_menu` int(11) NOT NULL,
  `UCreate` int(11) NULL DEFAULT NULL,
  `UAct` int(11) NULL DEFAULT NULL,
  `FInsert` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `FAct` timestamp(6) NULL DEFAULT NULL,
  `Status` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 37 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of de_pedidos
-- ----------------------------
INSERT INTO `de_pedidos` VALUES (1, 1, 25, 2, NULL, '2023-04-27 21:59:31.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (2, 1, 26, 2, NULL, '2023-04-27 21:59:31.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (3, 2, 39, 2, NULL, '2023-05-11 20:39:14.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (4, 2, 40, 2, NULL, '2023-05-11 20:39:14.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (5, 3, 41, 2, NULL, '2023-05-11 22:15:33.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (6, 3, 42, 2, NULL, '2023-05-11 22:15:33.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (7, 4, 43, 2, NULL, '2023-05-11 22:15:40.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (8, 4, 44, 2, NULL, '2023-05-11 22:15:40.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (9, 5, 45, 2, NULL, '2023-05-11 22:15:43.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (10, 5, 46, 2, NULL, '2023-05-11 22:15:43.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (11, 6, 51, 2, NULL, '2023-05-17 20:30:04.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (12, 6, 52, 2, NULL, '2023-05-17 20:30:04.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (13, 7, 53, 2, NULL, '2023-05-17 20:30:07.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (14, 7, 54, 2, NULL, '2023-05-17 20:30:07.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (15, 8, 55, 2, NULL, '2023-05-17 20:30:09.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (16, 8, 56, 2, NULL, '2023-05-17 20:30:09.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (17, 9, 57, 2, NULL, '2023-05-17 20:30:12.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (18, 9, 58, 2, NULL, '2023-05-17 20:30:12.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (19, 10, 67, 3, NULL, '2023-05-26 17:43:12.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (20, 10, 68, 3, NULL, '2023-05-26 17:43:12.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (21, 11, 69, 3, NULL, '2023-05-26 17:43:15.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (22, 11, 70, 3, NULL, '2023-05-26 17:43:15.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (23, 12, 71, 3, NULL, '2023-05-26 17:43:17.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (24, 12, 72, 3, NULL, '2023-05-26 17:43:17.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (25, 33, 67, 2, NULL, '2023-05-26 17:43:40.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (26, 33, 68, 2, NULL, '2023-05-26 17:43:40.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (27, 34, 69, 2, NULL, '2023-05-26 17:43:42.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (28, 34, 70, 2, NULL, '2023-05-26 17:43:42.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (29, 35, 71, 2, NULL, '2023-05-26 17:43:45.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (30, 35, 72, 2, NULL, '2023-05-26 17:43:45.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (31, 33, 67, 4, NULL, '2023-05-26 17:57:53.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (32, 33, 68, 4, NULL, '2023-05-26 17:57:53.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (33, 34, 69, 4, NULL, '2023-05-26 17:57:54.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (34, 34, 70, 4, NULL, '2023-05-26 17:57:54.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (35, 35, 71, 4, NULL, '2023-05-26 17:57:56.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (36, 35, 72, 4, NULL, '2023-05-26 17:57:56.000000', NULL, b'1');

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups`  (
  `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `description` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES (1, 'admin', 'Administrator');
INSERT INTO `groups` VALUES (2, 'members', 'General User');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `time` int(11) UNSIGNED NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 53 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for ma_menus
-- ----------------------------
DROP TABLE IF EXISTS `ma_menus`;
CREATE TABLE `ma_menus`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'identificador de la tabla',
  `fecha_menu` date NOT NULL,
  `IdUserCreated` int(11) NULL DEFAULT NULL,
  `IdUserAct` int(11) NULL DEFAULT NULL,
  `FAct` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `NoPlatillos` int(11) NULL DEFAULT 0,
  `Status` bit(1) NULL DEFAULT NULL,
  `FCreated` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 36 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ma_menus
-- ----------------------------
INSERT INTO `ma_menus` VALUES (1, '2023-04-17', 1, NULL, '2023-04-18 03:51:25.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (2, '2023-04-18', 1, NULL, '2023-04-18 04:20:46.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (3, '2023-04-19', 1, NULL, '2023-04-18 04:25:41.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (4, '2023-04-20', 1, NULL, '2023-04-18 04:32:34.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (5, '2023-04-21', 1, NULL, '2023-04-18 04:34:52.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (6, '2023-04-10', 1, NULL, '2023-04-18 04:37:36.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (7, '2023-04-11', 1, NULL, '2023-04-18 04:39:21.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (8, '2023-04-12', 1, NULL, '2023-04-18 04:48:04.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (9, '2023-04-13', 1, NULL, '2023-04-18 04:56:19.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (10, '2023-04-14', 1, NULL, '2023-04-18 04:56:31.000000', 0, b'1', '2023-04-18');
INSERT INTO `ma_menus` VALUES (11, '2023-04-10', 1, NULL, '2023-04-24 17:19:44.000000', 0, b'1', '2023-04-24');
INSERT INTO `ma_menus` VALUES (12, '2023-04-24', 1, NULL, '2023-04-24 17:20:12.000000', 0, b'1', '2023-04-24');
INSERT INTO `ma_menus` VALUES (13, '2023-04-25', 1, NULL, '2023-04-24 17:20:25.000000', 0, b'1', '2023-04-24');
INSERT INTO `ma_menus` VALUES (14, '2023-04-26', 1, NULL, '2023-04-24 17:20:41.000000', 0, b'1', '2023-04-24');
INSERT INTO `ma_menus` VALUES (15, '2023-04-27', 1, NULL, '2023-04-24 17:20:54.000000', 0, b'1', '2023-04-24');
INSERT INTO `ma_menus` VALUES (16, '2023-04-28', 1, NULL, '2023-04-24 17:21:28.000000', 0, b'1', '2023-04-24');
INSERT INTO `ma_menus` VALUES (17, '2023-04-29', 1, NULL, '2023-04-27 15:49:23.000000', 0, b'1', '2023-04-27');
INSERT INTO `ma_menus` VALUES (18, '2023-04-30', 1, NULL, '2023-04-27 15:49:56.000000', 0, b'1', '2023-04-27');
INSERT INTO `ma_menus` VALUES (19, '2023-05-11', 1, NULL, '2023-05-11 17:16:24.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (20, '2023-05-12', 1, NULL, '2023-05-11 17:16:38.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (21, '2023-05-13', 1, NULL, '2023-05-11 17:16:53.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (22, '2023-05-14', 1, NULL, '2023-05-11 17:17:02.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (23, '2023-05-15', 1, NULL, '2023-05-11 17:17:09.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (24, '2023-05-16', 1, NULL, '2023-05-11 17:17:18.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (25, '2023-05-17', 1, NULL, '2023-05-11 17:17:37.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (26, '2023-05-18', 1, NULL, '2023-05-11 17:17:45.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (27, '2023-05-19', 1, NULL, '2023-05-11 17:17:55.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (28, '2023-05-20', 1, NULL, '2023-05-11 17:18:06.000000', 0, b'1', '2023-05-11');
INSERT INTO `ma_menus` VALUES (29, '2023-05-21', 1, NULL, '2023-05-18 16:06:18.000000', 0, b'1', '2023-05-18');
INSERT INTO `ma_menus` VALUES (30, '2023-05-23', 1, NULL, '2023-05-23 16:23:08.000000', 0, b'1', '2023-05-23');
INSERT INTO `ma_menus` VALUES (31, '2023-05-24', 1, NULL, '2023-05-23 16:23:16.000000', 0, b'1', '2023-05-23');
INSERT INTO `ma_menus` VALUES (32, '2023-05-25', 1, NULL, '2023-05-23 16:23:27.000000', 0, b'1', '2023-05-23');
INSERT INTO `ma_menus` VALUES (33, '2023-05-26', 1, NULL, '2023-05-23 16:23:38.000000', 0, b'1', '2023-05-23');
INSERT INTO `ma_menus` VALUES (34, '2023-05-27', 1, NULL, '2023-05-23 16:23:46.000000', 0, b'1', '2023-05-23');
INSERT INTO `ma_menus` VALUES (35, '2023-05-28', 1, NULL, '2023-05-23 16:23:57.000000', 0, b'1', '2023-05-23');

-- ----------------------------
-- Table structure for ma_pedidos
-- ----------------------------
DROP TABLE IF EXISTS `ma_pedidos`;
CREATE TABLE `ma_pedidos`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NULL DEFAULT NULL,
  `FPedido` datetime(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `id_comensal` int(11) NULL DEFAULT NULL,
  `UInsert` int(11) NULL DEFAULT NULL,
  `UAct` int(11) NULL DEFAULT NULL,
  `FInsert` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `FAct` timestamp(6) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(6),
  `Status` bit(1) NULL DEFAULT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ma_pedidos
-- ----------------------------
INSERT INTO `ma_pedidos` VALUES (1, 12, '2023-04-27 21:59:31.000000', 2, 2, NULL, '2023-04-27 21:59:31.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (2, 19, '2023-05-11 20:39:14.000000', 2, 2, NULL, '2023-05-11 20:39:14.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (3, 20, '2023-05-11 22:15:33.000000', 2, 2, NULL, '2023-05-11 22:15:33.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (4, 21, '2023-05-11 22:15:40.000000', 2, 2, NULL, '2023-05-11 22:15:40.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (5, 22, '2023-05-11 22:15:43.000000', 2, 2, NULL, '2023-05-11 22:15:43.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (6, 25, '2023-05-17 20:30:04.000000', 2, 2, NULL, '2023-05-17 20:30:04.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (7, 26, '2023-05-17 20:30:07.000000', 2, 2, NULL, '2023-05-17 20:30:07.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (8, 27, '2023-05-17 20:30:09.000000', 2, 2, NULL, '2023-05-17 20:30:09.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (9, 28, '2023-05-17 20:30:12.000000', 2, 2, NULL, '2023-05-17 20:30:12.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (10, 33, '2023-05-26 17:43:12.000000', 3, 3, NULL, '2023-05-26 17:43:12.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (11, 34, '2023-05-26 17:43:15.000000', 3, 3, NULL, '2023-05-26 17:43:15.000000', NULL, b'1', '');
INSERT INTO `ma_pedidos` VALUES (12, 35, '2023-05-26 17:43:17.000000', 3, 3, NULL, '2023-05-26 17:43:17.000000', NULL, b'1', '');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `username` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(254) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `activation_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `activation_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED NULL DEFAULT NULL,
  `remember_selector` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `remember_code` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED NULL DEFAULT NULL,
  `active` tinyint(1) UNSIGNED NULL DEFAULT NULL,
  `first_name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ap1` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ap2` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `company` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_email`(`email`) USING BTREE,
  UNIQUE INDEX `uc_activation_selector`(`activation_selector`) USING BTREE,
  UNIQUE INDEX `uc_forgotten_password_selector`(`forgotten_password_selector`) USING BTREE,
  UNIQUE INDEX `uc_remember_selector`(`remember_selector`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '127.0.0.1', 'administrator', '$2y$10$AlnhaiJgQ6EAHZYOhib8.ui1bnm7t327j7IdXb7r0iwYW/03qEPQe', 'admin@admin.com', NULL, '', NULL, NULL, NULL, 'f5d207ac6fad46e2e2b4f4867fc5430c07c51a8d', '$2y$10$x4KFxjGHwQX9XoNXv1Aleu0DD9octD.zgd2xiWrSoImmcKQA/JVES', 1268889823, 1685392961, 1, 'Admin', 'istrator', NULL, 'ADMIN', '0');
INSERT INTO `users` VALUES (2, '::1', 'edwinpc', '$2y$10$MHIFK1ypqsyqzjZfnXJ3QuAPuAMSzYmMpCKkEAQLYRiG6NXk31Kzu', 'lic.edwin.perez@gmail.com', NULL, NULL, NULL, NULL, NULL, 'ebc94399d196b5d116eeb2eec2f10771448b23bc', '$2y$10$QB20kZdkiWNcFPwaNE0TBuyfjm1BgmTLWLViTonIocPo4IWjyopEe', 1681493356, 1685123016, 1, 'edwin', 'perez', 'castrejon', 'deportes', '3125500636');
INSERT INTO `users` VALUES (3, '::1', 'minecp', '$2y$10$0iUnG9CDAEnb7GLn8SMpq./VCdSwwfArx2WZm.K2AqFOC8KGLYBRq', 'minecp.mcp@gmail.com', NULL, NULL, NULL, NULL, NULL, 'ded589ac376671cf87f2c74a8d647b33ca9aa30b', '$2y$10$PyC3JOGeayr8/cUHSd3ASuU3uxYWJT/ERoo1fTygBuOpMEZ2bnZ2G', 1684858903, 1685122985, 1, 'Minerva', 'Cobarribias', 'Perez', 'Damas', '3121115734');
INSERT INTO `users` VALUES (4, '::1', 'luisfer', '$2y$10$ZUL8SShahJt9TtUPnPXEvutsTZQDYs5YSFpKD5fcx.sn4qPd2UAgW', 'luis.fernando@gmail.com', NULL, NULL, NULL, NULL, NULL, '9123025a46421d5cba719470c7c6ed3aa12667c3', '$2y$10$voQ5MTAZmbHa5dn4AJv82OdxE9SPkSfzEZ1vm2HK1t4VNR4L4cwxC', 1685123859, 1685123865, 1, 'LUIS FERNANDO', 'MUNGUIA', 'GONZALEZ', 'DEPORTES', '3121110545');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups`  (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `uc_users_groups`(`user_id`, `group_id`) USING BTREE,
  INDEX `fk_users_groups_users1_idx`(`user_id`) USING BTREE,
  INDEX `fk_users_groups_groups1_idx`(`group_id`) USING BTREE,
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 1, 1);
INSERT INTO `users_groups` VALUES (2, 1, 2);
INSERT INTO `users_groups` VALUES (3, 2, 2);
INSERT INTO `users_groups` VALUES (4, 3, 2);
INSERT INTO `users_groups` VALUES (5, 4, 2);

-- ----------------------------
-- View structure for vwconcentrado
-- ----------------------------
DROP VIEW IF EXISTS `vwconcentrado`;
CREATE ALGORITHM = UNDEFINED SQL SECURITY DEFINER VIEW `vwconcentrado` AS select `ma_menus`.`fecha_menu` AS `fecha_menu`,`de_menu`.`NoPlatillos` AS `NoPlatillos`,`de_menu`.`descripcion` AS `notas`,`de_menu`.`id_tipo` AS `id_tipo`,`ma_pedidos`.`FPedido` AS `FPedido`,`ma_pedidos`.`id_comensal` AS `id_comensal`,`ma_pedidos`.`Descripcion` AS `Descripcion`,`ma_menus`.`Status` AS `Status` from (((`ma_pedidos` join `de_pedidos` on(`ma_pedidos`.`id` = `de_pedidos`.`id_ma_pedido`)) join `ma_menus` on(`ma_pedidos`.`id_menu` = `ma_menus`.`id`)) join `de_menu` on(`ma_menus`.`id` = `de_menu`.`id_ma_menu` and `de_pedidos`.`id_detalle_menu` = `de_menu`.`id`)) where `ma_menus`.`Status` = 1;

SET FOREIGN_KEY_CHECKS = 1;
