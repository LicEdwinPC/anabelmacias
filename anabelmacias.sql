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

 Date: 27/04/2023 16:02:53
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
) ENGINE = MyISAM AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = MyISAM AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of de_pedidos
-- ----------------------------
INSERT INTO `de_pedidos` VALUES (1, 1, 25, 2, NULL, '2023-04-27 21:59:31.000000', NULL, b'1');
INSERT INTO `de_pedidos` VALUES (2, 1, 26, 2, NULL, '2023-04-27 21:59:31.000000', NULL, b'1');

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
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

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
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

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
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of ma_pedidos
-- ----------------------------
INSERT INTO `ma_pedidos` VALUES (1, 12, '2023-04-27 21:59:31.000000', 2, 2, NULL, '2023-04-27 21:59:31.000000', NULL, b'1', '');

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
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '127.0.0.1', 'administrator', '$2y$10$AlnhaiJgQ6EAHZYOhib8.ui1bnm7t327j7IdXb7r0iwYW/03qEPQe', 'admin@admin.com', NULL, '', NULL, NULL, NULL, 'f4b9d9de127187cabb544817357e34916964b0ba', '$2y$10$38fdBhpwYJuu5JJ2hv9CKufaeQfdfJj2ko.zw3CjhQJsc.YRHImV2', 1268889823, 1682613692, 1, 'Admin', 'istrator', NULL, 'ADMIN', '0');
INSERT INTO `users` VALUES (2, '::1', 'edwinpc', '$2y$10$MHIFK1ypqsyqzjZfnXJ3QuAPuAMSzYmMpCKkEAQLYRiG6NXk31Kzu', 'lic.edwin.perez@gmail.com', NULL, NULL, NULL, NULL, NULL, 'cc8a223419ed8522ecb88a3a78c6c84bb06bdde3', '$2y$10$2oQ94uGT086qJbtZ5Evz0OvNKwdSrHb86LVj4XuujTd8czjIeNlCq', 1681493356, 1682629406, 1, 'edwin', 'perez', 'castrejon', 'deportes', '3125500636');

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
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES (1, 1, 1);
INSERT INTO `users_groups` VALUES (2, 1, 2);
INSERT INTO `users_groups` VALUES (3, 2, 2);

SET FOREIGN_KEY_CHECKS = 1;
