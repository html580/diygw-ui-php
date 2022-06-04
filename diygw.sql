
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for log_logins
-- ----------------------------
DROP TABLE IF EXISTS `log_logins`;
CREATE TABLE `log_logins`  (
                               `info_id` bigint(20) NOT NULL AUTO_INCREMENT,
                               `username` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '用户名',
                               `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '状态',
                               `ipaddr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ip地址',
                               `login_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '归属地',
                               `browser` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '浏览器',
                               `os` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '系统',
                               `platform` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '固件',
                               `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                               `msg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                               `create_time` datetime(0) DEFAULT NULL,
                               `update_time` datetime(0) DEFAULT NULL,
                               `delete_time` datetime(0) DEFAULT NULL,
                               PRIMARY KEY (`info_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for log_operations
-- ----------------------------
DROP TABLE IF EXISTS `log_operations`;
CREATE TABLE `log_operations`  (
                                   `oper_id` bigint(20) NOT NULL AUTO_INCREMENT,
                                   `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '操作的模块',
                                   `business_type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '0其它 1新增 2修改 3删除',
                                   `method` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '请求方法',
                                   `oper_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '操作人员',
                                   `oper_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '操作url',
                                   `oper_ip` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '操作IP',
                                   `oper_location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '操作地点',
                                   `oper_param` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '请求参数',
                                   `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '0=正常,1=异常',
                                   `create_time` datetime(0) DEFAULT NULL,
                                   `update_time` datetime(0) DEFAULT NULL,
                                   `delete_time` datetime(0) DEFAULT NULL,
                                   PRIMARY KEY (`oper_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for sys_config
-- ----------------------------
DROP TABLE IF EXISTS `sys_config`;
CREATE TABLE `sys_config`  (
                               `config_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '主键编码',
                               `config_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ConfigName',
                               `config_key` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ConfigKey',
                               `config_value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ConfigValue',
                               `config_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '是否系统内置0，1',
                               `is_frontend` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '是否前台',
                               `remark` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'Remark',
                               `create_time` datetime(0) DEFAULT NULL,
                               `update_time` datetime(0) DEFAULT NULL,
                               `delete_time` datetime(0) DEFAULT NULL COMMENT '删除状态',
                               PRIMARY KEY (`config_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_config
-- ----------------------------
INSERT INTO `sys_config` VALUES (1, '账号初始密码', 'sys.user.initPassword', '123456', '0', '0', '初始密码', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (2, '1', '1', '1', '0', NULL, '1', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (3, '1', '1', '1', '0', NULL, '1', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (4, '1', '1', '1', '0', NULL, '1', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (5, '1', '1', '1', '0', NULL, '1', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (6, '111111111123', '123qwer11', '111111', '1', NULL, '1', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (18, '123', '1', '1', '', NULL, '12', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (19, '123123123', '123', '123', '', NULL, '13123', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (20, '123', '1', '123', '', NULL, '123', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (21, '123', '123', '123', '', NULL, '123', NULL, '2022-04-19 09:54:24', '2022-04-19 09:54:24');
INSERT INTO `sys_config` VALUES (22, 'wrwqe1231', 'qwe222', 'qwer', '0', NULL, '11', NULL, '2022-04-19 09:54:27', '2022-04-19 09:54:27');
INSERT INTO `sys_config` VALUES (23, 'test2221312', 'tes', 'te', '0', NULL, '123', '2022-04-19 10:10:24', '2022-04-19 11:35:53', NULL);
INSERT INTO `sys_config` VALUES (24, 'ttt', 'tt', '123', '0', NULL, '', '2022-04-27 09:30:14', '2022-04-27 09:30:14', NULL);

-- ----------------------------
-- Table structure for sys_dept
-- ----------------------------
DROP TABLE IF EXISTS `sys_dept`;
CREATE TABLE `sys_dept`  (
                             `dept_id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `parent_id` int(11) DEFAULT NULL COMMENT '上级部门',
                             `dept_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '部门路径',
                             `dept_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '部门名称',
                             `sort` int(4) DEFAULT NULL COMMENT '排序',
                             `leader` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '负责人',
                             `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '手机',
                             `email` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '邮箱',
                             `status` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '状态',
                             `create_by` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '创建人',
                             `update_by` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '修改人',
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             PRIMARY KEY (`dept_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_dept
-- ----------------------------
INSERT INTO `sys_dept` VALUES (2, 0, '0,2', 'DIY可视化', 0, '邓志锋', '15913132246', '280160522@qq.com', '0', 'admin', 'admin', '2021-12-01 17:31:53', '2022-04-24 13:22:21', NULL);
INSERT INTO `sys_dept` VALUES (3, 2, '0,2,3', '研发部', 5, '邓志锋', '15913132246', '280160522@qq.com', '0', 'admin', 'admin', '2021-12-01 17:37:43', '2022-04-24 17:28:07', NULL);
INSERT INTO `sys_dept` VALUES (7, 2, '0,2,7', '营销部', 2, '邓志锋', '15913132246', '280160522@qq.com', '0', 'admin', 'admin', '2021-12-24 10:46:24', '2021-12-24 10:47:15', NULL);

-- ----------------------------
-- Table structure for sys_dict
-- ----------------------------
DROP TABLE IF EXISTS `sys_dict`;
CREATE TABLE `sys_dict`  (
                             `dict_id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `dict_name` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '名称',
                             `dict_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '类型',
                             `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '状态',
                             `create_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `update_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `remark` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '备注',
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             PRIMARY KEY (`dict_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 30 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_dict
-- ----------------------------
INSERT INTO `sys_dict` VALUES (1, '用户性别', 'sys_user_sex', '0', 'admin', '', '性别列表', '2021-11-30 14:02:52', '2021-11-30 14:07:55', NULL);
INSERT INTO `sys_dict` VALUES (6, '系统开关', 'sys_normal_disable', '0', 'admin', '', '开关列表', '2021-12-01 15:57:58', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (7, '菜单类型', 'sys_menu_type', '0', 'admin', '', '菜单类型列表', '2021-12-02 09:48:48', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (8, '菜单状态', 'sys_show_hide', '0', 'admin', '', '菜单状态列表', '2021-12-02 09:55:59', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (9, '数字是否', 'sys_num_yes_no', '0', 'admin', '', '数字是否列表', '2021-12-02 10:13:29', '2021-12-02 10:13:40', NULL);
INSERT INTO `sys_dict` VALUES (10, '数字是否', 'sys_num_yes_no', '0', 'admin', '', '数字是否', '2021-12-02 10:13:29', '2022-04-27 16:24:06', '2022-04-27 16:24:06');
INSERT INTO `sys_dict` VALUES (11, '状态是否', 'sys_yes_no', '0', 'admin', '', '状态是否', '2021-12-04 13:47:57', '2021-12-04 13:47:57', NULL);
INSERT INTO `sys_dict` VALUES (12, '网络请求方法', 'sys_method_api', '0', 'admin', '', '网络请求方法列表', '2021-12-08 17:21:27', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (13, '成功失败', 'sys_common_status', '0', 'admin', '', '是否成功失败', '2021-12-17 10:10:03', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (27, '操作分类', 'sys_oper_type', '0', 'admin', '', '操作分类列表', '2021-12-17 11:29:50', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (28, '任务组', 'sys_job_group', '0', 'admin', '', '系统任务，开机自启', '2021-12-24 15:14:56', '2022-04-19 13:28:28', NULL);
INSERT INTO `sys_dict` VALUES (29, '通知类型', 'sys_notice_type', '0', 'admin', '', '通知类型列表123132', '2021-12-26 15:23:26', '2022-04-19 13:28:28', NULL);

-- ----------------------------
-- Table structure for sys_dict_data
-- ----------------------------
DROP TABLE IF EXISTS `sys_dict_data`;
CREATE TABLE `sys_dict_data`  (
                                  `dict_code` bigint(20) NOT NULL AUTO_INCREMENT,
                                  `dict_sort` int(11) DEFAULT NULL COMMENT '排序',
                                  `dict_label` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '标签',
                                  `dict_value` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '值',
                                  `dict_type` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '字典类型',
                                  `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '状态（0正常 1停用）',
                                  `css_class` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'CssClass',
                                  `list_class` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ListClass',
                                  `is_default` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'IsDefault',
                                  `create_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `update_by` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                                  `remark` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '备注',
                                  `create_time` datetime(0) DEFAULT NULL,
                                  `update_time` datetime(0) DEFAULT NULL,
                                  `delete_time` datetime(0) DEFAULT NULL,
                                  PRIMARY KEY (`dict_code`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_dict_data
-- ----------------------------
INSERT INTO `sys_dict_data` VALUES (1, 0, '男', '0', 'sys_user_sex', '0', '', '', '', 'admin', '', '男', '2021-11-30 14:58:18', '2021-11-30 14:58:18', NULL);
INSERT INTO `sys_dict_data` VALUES (2, 1, '女', '1', 'sys_user_sex', '0', '', '', '', 'admin', '', '女生', '2021-11-30 15:09:11', '2021-11-30 15:10:28', NULL);
INSERT INTO `sys_dict_data` VALUES (3, 2, '未知', '2', 'sys_user_sex', '0', '', '', '', 'admin', '', '未知', '2021-11-30 15:09:11', '2021-11-30 15:10:28', NULL);
INSERT INTO `sys_dict_data` VALUES (4, 0, '正常', '0', 'sys_normal_disable', '0', '', '', '', 'admin', '', '', '2021-12-01 15:58:50', '2021-12-01 15:58:50', NULL);
INSERT INTO `sys_dict_data` VALUES (5, 1, '停用', '1', 'sys_normal_disable', '0', '', '', '', 'admin', '', '', '2021-12-01 15:59:08', '2021-12-01 15:59:08', NULL);
INSERT INTO `sys_dict_data` VALUES (6, 0, '目录', 'M', 'sys_menu_type', '0', '', '', '', 'admin', '', '', '2021-12-02 09:49:12', '2021-12-02 09:49:12', NULL);
INSERT INTO `sys_dict_data` VALUES (7, 1, '菜单', 'C', 'sys_menu_type', '0', '', '', '', 'admin', '', '', '2021-12-02 09:49:35', '2021-12-02 09:49:52', NULL);
INSERT INTO `sys_dict_data` VALUES (8, 2, '按钮', 'F', 'sys_menu_type', '0', '', '', '', 'admin', '', '', '2021-12-02 09:49:35', '2021-12-02 09:49:35', NULL);
INSERT INTO `sys_dict_data` VALUES (9, 0, '显示', '0', 'sys_show_hide', '0', '', '', '', 'admin', '', '', '2021-12-02 09:56:40', '2021-12-02 09:56:40', NULL);
INSERT INTO `sys_dict_data` VALUES (10, 0, '隐藏', '1', 'sys_show_hide', '0', '', '', '', 'admin', '', '', '2021-12-02 09:56:52', '2021-12-02 09:56:52', NULL);
INSERT INTO `sys_dict_data` VALUES (11, 0, '否', '0', 'sys_num_yes_no', '0', '', '', '', 'admin', '', '', '2021-12-02 10:16:16', '2021-12-02 10:16:16', NULL);
INSERT INTO `sys_dict_data` VALUES (12, 1, '是', '1', 'sys_num_yes_no', '0', '', '', '', 'admin', '', '', '2021-12-02 10:16:26', '2021-12-02 10:16:26', NULL);
INSERT INTO `sys_dict_data` VALUES (13, 0, '否', '0', 'sys_yes_no', '0', '', '', '', 'admin', '', '', '2021-12-04 13:48:15', '2021-12-04 13:48:15', NULL);
INSERT INTO `sys_dict_data` VALUES (14, 0, '是', '1', 'sys_yes_no', '0', '', '', '', 'admin', '', '', '2021-12-04 13:48:21', '2021-12-04 13:48:21', NULL);
INSERT INTO `sys_dict_data` VALUES (15, 0, '创建(POST)', 'POST', 'sys_method_api', '0', '', '', '', 'admin', '', '', '2021-12-08 17:22:05', '2021-12-09 09:29:52', NULL);
INSERT INTO `sys_dict_data` VALUES (16, 1, '查询(GET)', 'GET', 'sys_method_api', '0', '', '', '', 'admin', '', '', '2021-12-08 17:22:24', '2021-12-09 09:29:59', NULL);
INSERT INTO `sys_dict_data` VALUES (17, 2, '修改(PUT)', 'PUT', 'sys_method_api', '0', '', '', '', 'admin', '', '', '2021-12-08 17:22:40', '2021-12-09 09:30:06', NULL);
INSERT INTO `sys_dict_data` VALUES (18, 3, '删除(DELETE)', 'DELETE', 'sys_method_api', '0', '', '', '', 'admin', '', '', '2021-12-08 17:22:54', '2021-12-09 09:30:13', NULL);
INSERT INTO `sys_dict_data` VALUES (19, 0, '成功', '1', 'sys_common_status', '0', '', '', '', 'admin', '', '', '2021-12-17 11:01:52', '2021-12-17 11:01:52', NULL);
INSERT INTO `sys_dict_data` VALUES (20, 0, '失败', '0', 'sys_common_status', '0', '', '', '', 'admin', '', '', '2021-12-17 11:02:08', '2021-12-17 11:02:08', NULL);
INSERT INTO `sys_dict_data` VALUES (21, 0, '其他', '0', 'sys_oper_type', '0', '', '', '', 'admin', '', '', '2021-12-17 11:30:07', '2021-12-17 11:30:07', NULL);
INSERT INTO `sys_dict_data` VALUES (22, 0, '新增', '1', 'sys_oper_type', '0', '', '', '', 'admin', '', '', '2021-12-17 11:30:21', '2021-12-17 11:30:21', NULL);
INSERT INTO `sys_dict_data` VALUES (23, 0, '修改', '2', 'sys_oper_type', '0', '', '', '', 'admin', '', '', '2021-12-17 11:30:32', '2021-12-17 11:30:32', NULL);
INSERT INTO `sys_dict_data` VALUES (24, 0, '删除', '3', 'sys_oper_type', '0', '', '', '', 'admin', '', '', '2021-12-17 11:30:40', '2021-12-17 11:30:40', NULL);

-- ----------------------------
-- Table structure for sys_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_menu`;
CREATE TABLE `sys_menu`  (
                             `menu_id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `menu_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `title` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `parent_id` int(11) DEFAULT NULL,
                             `sort` int(4) DEFAULT NULL,
                             `icon` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `path` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `component` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `is_iframe` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `is_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `menu_type` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `is_hide` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `is_keep_alive` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `is_affix` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `permission` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `status` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `create_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `update_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `remark` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             PRIMARY KEY (`menu_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_menu
-- ----------------------------
INSERT INTO `sys_menu` VALUES (1, '首页', '', 0, 0, 'iconfont icon-shouye', '/home', 'home/index', '1', '', 'C', '0', '1', '1', '', '0', NULL, NULL, '', '2022-04-27 13:33:52', '2022-05-08 23:20:42', NULL);
INSERT INTO `sys_menu` VALUES (2, '系统设置', '', 0, 1, 'ele-Setting', '/system', 'layout/routerView/parent', '1', '', 'M', '0', '0', '0', '', '0', 'admin', 'admin', '', '2021-12-02 11:04:08', '2022-04-27 13:34:05', NULL);
INSERT INTO `sys_menu` VALUES (3, '用户管理', '', 2, 1, 'ele-User', '/system/user', '/system/user/index', '1', '', 'C', '0', '1', '0', 'system:user:list', '0', 'admin', 'admin', '', '2021-12-02 14:07:56', '2021-12-28 13:32:44', NULL);
INSERT INTO `sys_menu` VALUES (4, '添加用户', '', 3, 1, '', '', '', '', '', 'F', '0', '', '', 'system:user:add', '0', 'admin', '', '', '2021-12-03 13:36:33', '2021-12-03 13:36:33', NULL);
INSERT INTO `sys_menu` VALUES (5, '编辑用户', '', 3, 1, '', '', '', '', '', 'F', '0', '', '', 'system:user:edit', '0', 'admin', '', '', '2021-12-03 13:48:13', '2021-12-03 13:48:13', NULL);
INSERT INTO `sys_menu` VALUES (6, '角色管理', '', 2, 1, 'ele-UserFilled', '/system/role', 'system/role/index', '1', '', 'C', '0', '1', '0', 'system:role:list', '0', 'admin', 'admin', '', '2021-12-03 13:51:55', '2021-12-28 13:32:55', NULL);
INSERT INTO `sys_menu` VALUES (7, '菜单管理', '', 2, 2, 'iconfont icon-juxingkaobei', '/system/menu', '/system/menu/index', '1', '', 'C', '0', '1', '0', 'system:menu:list', '0', 'admin', 'admin', '', '2021-12-03 13:54:44', '2021-12-28 13:33:19', NULL);
INSERT INTO `sys_menu` VALUES (8, '部门管理', '', 2, 3, 'iconfont icon-jiliandongxuanzeqi', '/system/dept', '/system/dept/index', '1', '', 'C', '0', '1', '0', 'system:dept:list', '0', 'admin', 'admin', '', '2021-12-03 13:58:36', '2021-12-28 13:40:20', NULL);
INSERT INTO `sys_menu` VALUES (9, '岗位管理', '', 2, 4, 'iconfont icon-neiqianshujuchucun', '/system/post', '/system/post/index', '1', '', 'C', '0', '1', '0', 'system:post:list', '0', 'admin', 'admin', '', '2021-12-03 13:54:44', '2021-12-28 13:40:31', NULL);
INSERT INTO `sys_menu` VALUES (10, '字典管理', '', 2, 5, 'ele-Coin', '/system/dict', '/system/dict/index', '1', '', 'C', '0', '1', '0', 'system:dict:list', '0', 'admin', 'admin', '', '2021-12-03 13:54:44', '2022-04-27 16:25:39', NULL);
INSERT INTO `sys_menu` VALUES (11, '参数管理', '', 2, 6, 'ele-DocumentCopy', '/system/config', '/system/config/index', '1', '', 'C', '0', '1', '0', 'system:config:list', '0', 'admin', 'admin', '', '2021-12-03 13:54:44', '2021-12-28 13:41:05', NULL);
INSERT INTO `sys_menu` VALUES (12, '个人中心', '', 0, 10, 'ele-Avatar', '/personal', '/personal/index', '1', '', 'M', '0', '0', '0', '', '0', 'admin', 'admin', '', '2021-12-03 14:12:43', '2021-12-28 13:43:17', NULL);
INSERT INTO `sys_menu` VALUES (13, '添加配置', '', 11, 1, '', '', '', '', '', 'F', '', '', '', 'system:config:add', '0', 'admin', '', '', '2021-12-06 17:19:19', '2021-12-06 17:19:19', NULL);
INSERT INTO `sys_menu` VALUES (14, '修改配置', '', 11, 1, '', '', '', '', '', 'F', '', '', '', 'system:config:edit', '0', 'admin', '', '', '2021-12-06 17:20:30', '2021-12-06 17:20:30', NULL);
INSERT INTO `sys_menu` VALUES (15, '删除配置', '', 11, 1, '', '', '', '', '', 'F', '', '', '', 'system:config:delete', '0', 'admin', '', '', '2021-12-06 17:23:52', '2021-12-06 17:23:52', NULL);
INSERT INTO `sys_menu` VALUES (16, '导出配置', '', 11, 1, '', '', '', '', '', 'F', '', '', '', 'system:config:export', '0', 'admin', '', '', '2021-12-06 17:24:41', '2021-12-06 17:24:41', NULL);
INSERT INTO `sys_menu` VALUES (17, '新增角色', '', 6, 1, '', '', '', '', '', 'F', '', '', '', 'system:role:add', '0', 'admin', '', '', '2021-12-06 17:43:35', '2021-12-06 17:43:35', NULL);
INSERT INTO `sys_menu` VALUES (18, '删除角色', '', 6, 1, '', '', '', '', '', 'F', '', '', '', 'system:role:delete', '0', 'admin', '', '', '2021-12-06 17:44:10', '2021-12-06 17:44:10', NULL);
INSERT INTO `sys_menu` VALUES (19, '修改角色', '', 6, 1, '', '', '', '', '', 'F', '', '', '', 'system:role:edit', '0', 'admin', '', '', '2021-12-06 17:44:48', '2021-12-06 17:44:48', NULL);
INSERT INTO `sys_menu` VALUES (20, '导出角色', '', 6, 1, '', '', '', '', '', 'F', '', '', '', 'system:role:export', '0', 'admin', '', '', '2021-12-06 17:45:25', '2021-12-06 17:45:25', NULL);
INSERT INTO `sys_menu` VALUES (21, '添加菜单', '', 7, 1, '', '', '', '', '', 'F', '', '', '', 'system:menu:add', '0', 'admin', '', '', '2021-12-06 17:46:01', '2021-12-06 17:46:01', NULL);
INSERT INTO `sys_menu` VALUES (22, '修改菜单', '', 7, 1, '', '', '', '', '', 'F', '', '', '', 'system:menu:edit', '0', 'admin', '', '', '2021-12-06 17:46:24', '2021-12-06 17:46:24', NULL);
INSERT INTO `sys_menu` VALUES (23, '删除菜单', '', 7, 1, '', '', '', '', '', 'F', '', '', '', 'system:menu:delete', '0', 'admin', '', '', '2021-12-06 17:46:47', '2021-12-06 17:46:47', NULL);
INSERT INTO `sys_menu` VALUES (24, '添加部门', '', 8, 1, '', '', '', '', '', 'F', '', '', '', 'system:dept:add', '0', 'admin', '', '', '2021-12-07 09:33:58', '2021-12-07 09:33:58', NULL);
INSERT INTO `sys_menu` VALUES (25, '编辑部门', '', 8, 1, '', '', '', '', '', 'F', '', '', '', 'system:dept:edit', '0', 'admin', '', '', '2021-12-07 09:34:39', '2021-12-07 09:34:39', NULL);
INSERT INTO `sys_menu` VALUES (26, '删除部门', '', 8, 1, '', '', '', '', '', 'F', '', '', '', 'system:dept:delete', '0', 'admin', 'admin', '', '2021-12-07 09:35:09', '2021-12-07 09:36:26', NULL);
INSERT INTO `sys_menu` VALUES (27, '导出部门', '', 8, 1, '', '', '', '', '', 'F', '', '', '', 'system:dept:export', '0', 'admin', '', '', '2021-12-07 09:35:51', '2021-12-07 09:35:51', '2021-12-07 09:36:37');
INSERT INTO `sys_menu` VALUES (28, '添加岗位', '', 9, 1, '', '', '', '', '', 'F', '', '', '', 'system:post:add', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (29, '编辑岗位', '', 9, 1, '', '', '', '', '', 'F', '', '', '', 'system:post:edit', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (30, '删除岗位', '', 9, 1, '', '', '', '', '', 'F', '', '', '', 'system:post:delete', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (31, '导出岗位', '', 9, 1, '', '', '', '', '', 'F', '', '', '', 'system:post:export', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (32, '添加字典类型', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictT:add', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (33, '编辑字典类型', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictT:edit', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (34, '删除字典类型', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictT:delete', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (35, '导出字典类型', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictT:export', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (36, '新增字典数据', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictD:add', '0', 'admin', '', '', '2021-12-07 09:35:09', '2021-12-07 09:35:09', NULL);
INSERT INTO `sys_menu` VALUES (37, '修改字典数据', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictD:edit', '0', 'admin', '', '', '2021-12-07 09:48:04', '2021-12-07 09:48:04', NULL);
INSERT INTO `sys_menu` VALUES (38, '删除字典数据', '', 10, 1, '', '', '', '', '', 'F', '', '', '', 'system:dictD:delete', '0', 'admin', '', '', '2021-12-07 09:48:42', '2021-12-07 09:48:42', NULL);
INSERT INTO `sys_menu` VALUES (39, '登录日志', '', 43, 1, 'iconfont icon-quanxian', '/log/logins', '/log/logins/index', '0', '', 'C', '0', '0', '0', 'log:login:list', '0', 'admin', '', '', '2021-12-09 09:09:13', '2022-04-27 16:35:25', NULL);
INSERT INTO `sys_menu` VALUES (40, '添加api', '', 39, 1, '', '/system/api', '', '', '', 'F', '', '', '', 'system:api:add', '0', 'admin', '', '', '2021-12-09 09:09:54', '2022-04-27 16:36:02', '2022-04-27 16:36:02');
INSERT INTO `sys_menu` VALUES (41, '编辑api', '', 39, 1, '', '/system/api', '', '', '', 'F', '', '', '', 'system:api:edit', '0', 'admin', '', '', '2021-12-09 09:10:38', '2022-04-27 16:36:05', '2022-04-27 16:36:05');
INSERT INTO `sys_menu` VALUES (42, '操作日志', '', 43, 1, 'ele-Pointer', '/log/operations', '/log/operations/index', '0', '', 'C', '0', '0', '0', 'log:operate:list', '0', 'admin', '', '', '2021-12-09 09:11:11', '2022-04-27 16:35:56', NULL);
INSERT INTO `sys_menu` VALUES (43, '日志系统', '', 0, 2, 'iconfont icon-biaodan', '/log', 'layout/routerView/parent', '0', '', 'M', '0', '0', '0', '', '0', 'admin', 'admin', '', '2021-12-02 11:04:08', '2022-04-28 12:56:02', NULL);

-- ----------------------------
-- Table structure for sys_post
-- ----------------------------
DROP TABLE IF EXISTS `sys_post`;
CREATE TABLE `sys_post`  (
                             `post_id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `post_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '岗位名称',
                             `post_code` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '岗位代码',
                             `sort` int(4) DEFAULT NULL COMMENT '岗位排序',
                             `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '状态',
                             `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '描述',
                             `create_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `update_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             PRIMARY KEY (`post_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_post
-- ----------------------------
INSERT INTO `sys_post` VALUES (1, '首席执行官', 'CEO', 0, '0', '首席执行官', 'admin', '', '2021-12-02 09:21:44', '2021-12-02 09:24:25', NULL);
INSERT INTO `sys_post` VALUES (3, '首席技术执行官', 'CTO', 1, '0', '', 'admin', '', '2021-12-02 09:21:44', '2021-12-02 09:25:59', '2021-12-02 09:27:41');
INSERT INTO `sys_post` VALUES (4, '首席技术执行官', 'CTO', 1, '0', '', 'admin', '', '2021-12-02 09:21:44', '2021-12-02 09:25:59', NULL);
INSERT INTO `sys_post` VALUES (5, '123', '123', 0, '0', '', 'admin', '', '2021-12-18 00:33:28', '2021-12-18 00:33:28', '2021-12-28 14:11:52');

-- ----------------------------
-- Table structure for sys_role
-- ----------------------------
DROP TABLE IF EXISTS `sys_role`;
CREATE TABLE `sys_role`  (
                             `role_id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `role_name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '角色名称',
                             `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '状态',
                             `role_key` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '角色代码',
                             `data_scope` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '数据范围（1：全部数据权限 2：自定数据权限 3：本部门数据权限 4：本部门及以下数据权限）',
                             `role_sort` int(4) DEFAULT NULL COMMENT '角色排序',
                             `flag` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '删除标识',
                             `create_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `update_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             PRIMARY KEY (`role_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_role
-- ----------------------------
INSERT INTO `sys_role` VALUES (1, '超管理员', '0', 'admin', '2', 1, '', 'admin', 'admin', '', '2021-12-02 16:03:26', '2022-04-27 16:36:50', NULL);
INSERT INTO `sys_role` VALUES (2, '管理员', '0', 'manage', '2', 2, '', 'admin', 'admin', '', '2021-12-19 16:06:20', '2022-04-25 17:19:19', NULL);
INSERT INTO `sys_role` VALUES (3, '测试', '0', '123', NULL, 1, NULL, NULL, NULL, NULL, '2022-04-25 16:18:25', '2022-04-25 16:18:25', NULL);
INSERT INTO `sys_role` VALUES (4, '123', '0', '123', NULL, 1, NULL, NULL, NULL, '13', '2022-04-25 16:19:45', '2022-04-25 17:13:18', '2022-04-25 17:13:18');

-- ----------------------------
-- Table structure for sys_role_dept
-- ----------------------------
DROP TABLE IF EXISTS `sys_role_dept`;
CREATE TABLE `sys_role_dept`  (
                                  `role_id` int(11) DEFAULT NULL,
                                  `dept_id` int(11) DEFAULT NULL,
                                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_role_dept
-- ----------------------------
INSERT INTO `sys_role_dept` VALUES (2, 2, 3);
INSERT INTO `sys_role_dept` VALUES (2, 7, 4);
INSERT INTO `sys_role_dept` VALUES (1, 2, 21);
INSERT INTO `sys_role_dept` VALUES (1, 3, 22);

-- ----------------------------
-- Table structure for sys_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `sys_role_menu`;
CREATE TABLE `sys_role_menu`  (
                                  `id` bigint(20) NOT NULL AUTO_INCREMENT,
                                  `role_id` int(11) DEFAULT NULL,
                                  `menu_id` int(11) DEFAULT NULL,
                                  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1334 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_role_menu
-- ----------------------------
INSERT INTO `sys_role_menu` VALUES (959, 4, 1);
INSERT INTO `sys_role_menu` VALUES (960, 4, 39);
INSERT INTO `sys_role_menu` VALUES (961, 4, 6);
INSERT INTO `sys_role_menu` VALUES (962, 4, 42);
INSERT INTO `sys_role_menu` VALUES (963, 4, 41);
INSERT INTO `sys_role_menu` VALUES (964, 4, 20);
INSERT INTO `sys_role_menu` VALUES (1130, 2, 1);
INSERT INTO `sys_role_menu` VALUES (1131, 2, 3);
INSERT INTO `sys_role_menu` VALUES (1132, 2, 4);
INSERT INTO `sys_role_menu` VALUES (1133, 2, 5);
INSERT INTO `sys_role_menu` VALUES (1134, 2, 6);
INSERT INTO `sys_role_menu` VALUES (1135, 2, 7);
INSERT INTO `sys_role_menu` VALUES (1136, 2, 8);
INSERT INTO `sys_role_menu` VALUES (1137, 2, 9);
INSERT INTO `sys_role_menu` VALUES (1138, 2, 10);
INSERT INTO `sys_role_menu` VALUES (1139, 2, 11);
INSERT INTO `sys_role_menu` VALUES (1140, 2, 12);
INSERT INTO `sys_role_menu` VALUES (1141, 2, 13);
INSERT INTO `sys_role_menu` VALUES (1142, 2, 14);
INSERT INTO `sys_role_menu` VALUES (1143, 2, 15);
INSERT INTO `sys_role_menu` VALUES (1144, 2, 16);
INSERT INTO `sys_role_menu` VALUES (1145, 2, 17);
INSERT INTO `sys_role_menu` VALUES (1146, 2, 18);
INSERT INTO `sys_role_menu` VALUES (1147, 2, 19);
INSERT INTO `sys_role_menu` VALUES (1148, 2, 20);
INSERT INTO `sys_role_menu` VALUES (1149, 2, 21);
INSERT INTO `sys_role_menu` VALUES (1150, 2, 22);
INSERT INTO `sys_role_menu` VALUES (1151, 2, 23);
INSERT INTO `sys_role_menu` VALUES (1152, 2, 24);
INSERT INTO `sys_role_menu` VALUES (1153, 2, 25);
INSERT INTO `sys_role_menu` VALUES (1154, 2, 26);
INSERT INTO `sys_role_menu` VALUES (1155, 2, 28);
INSERT INTO `sys_role_menu` VALUES (1156, 2, 29);
INSERT INTO `sys_role_menu` VALUES (1157, 2, 30);
INSERT INTO `sys_role_menu` VALUES (1158, 2, 31);
INSERT INTO `sys_role_menu` VALUES (1159, 2, 32);
INSERT INTO `sys_role_menu` VALUES (1160, 2, 33);
INSERT INTO `sys_role_menu` VALUES (1161, 2, 34);
INSERT INTO `sys_role_menu` VALUES (1162, 2, 35);
INSERT INTO `sys_role_menu` VALUES (1163, 2, 36);
INSERT INTO `sys_role_menu` VALUES (1164, 2, 37);
INSERT INTO `sys_role_menu` VALUES (1165, 2, 38);
INSERT INTO `sys_role_menu` VALUES (1166, 2, 39);
INSERT INTO `sys_role_menu` VALUES (1167, 2, 40);
INSERT INTO `sys_role_menu` VALUES (1168, 2, 41);
INSERT INTO `sys_role_menu` VALUES (1169, 2, 42);
INSERT INTO `sys_role_menu` VALUES (1170, 2, 43);
INSERT INTO `sys_role_menu` VALUES (1171, 2, 44);
INSERT INTO `sys_role_menu` VALUES (1172, 2, 45);
INSERT INTO `sys_role_menu` VALUES (1173, 2, 46);
INSERT INTO `sys_role_menu` VALUES (1174, 2, 47);
INSERT INTO `sys_role_menu` VALUES (1175, 2, 48);
INSERT INTO `sys_role_menu` VALUES (1176, 2, 49);
INSERT INTO `sys_role_menu` VALUES (1177, 2, 50);
INSERT INTO `sys_role_menu` VALUES (1178, 2, 51);
INSERT INTO `sys_role_menu` VALUES (1179, 2, 52);
INSERT INTO `sys_role_menu` VALUES (1180, 2, 53);
INSERT INTO `sys_role_menu` VALUES (1181, 2, 54);
INSERT INTO `sys_role_menu` VALUES (1182, 2, 55);
INSERT INTO `sys_role_menu` VALUES (1183, 2, 57);
INSERT INTO `sys_role_menu` VALUES (1184, 2, 58);
INSERT INTO `sys_role_menu` VALUES (1294, 1, 1);
INSERT INTO `sys_role_menu` VALUES (1295, 1, 2);
INSERT INTO `sys_role_menu` VALUES (1296, 1, 6);
INSERT INTO `sys_role_menu` VALUES (1297, 1, 20);
INSERT INTO `sys_role_menu` VALUES (1298, 1, 19);
INSERT INTO `sys_role_menu` VALUES (1299, 1, 18);
INSERT INTO `sys_role_menu` VALUES (1300, 1, 17);
INSERT INTO `sys_role_menu` VALUES (1301, 1, 3);
INSERT INTO `sys_role_menu` VALUES (1302, 1, 5);
INSERT INTO `sys_role_menu` VALUES (1303, 1, 4);
INSERT INTO `sys_role_menu` VALUES (1304, 1, 7);
INSERT INTO `sys_role_menu` VALUES (1305, 1, 23);
INSERT INTO `sys_role_menu` VALUES (1306, 1, 22);
INSERT INTO `sys_role_menu` VALUES (1307, 1, 21);
INSERT INTO `sys_role_menu` VALUES (1308, 1, 8);
INSERT INTO `sys_role_menu` VALUES (1309, 1, 26);
INSERT INTO `sys_role_menu` VALUES (1310, 1, 25);
INSERT INTO `sys_role_menu` VALUES (1311, 1, 24);
INSERT INTO `sys_role_menu` VALUES (1312, 1, 9);
INSERT INTO `sys_role_menu` VALUES (1313, 1, 31);
INSERT INTO `sys_role_menu` VALUES (1314, 1, 30);
INSERT INTO `sys_role_menu` VALUES (1315, 1, 29);
INSERT INTO `sys_role_menu` VALUES (1316, 1, 28);
INSERT INTO `sys_role_menu` VALUES (1317, 1, 10);
INSERT INTO `sys_role_menu` VALUES (1318, 1, 38);
INSERT INTO `sys_role_menu` VALUES (1319, 1, 37);
INSERT INTO `sys_role_menu` VALUES (1320, 1, 36);
INSERT INTO `sys_role_menu` VALUES (1321, 1, 35);
INSERT INTO `sys_role_menu` VALUES (1322, 1, 34);
INSERT INTO `sys_role_menu` VALUES (1323, 1, 33);
INSERT INTO `sys_role_menu` VALUES (1324, 1, 32);
INSERT INTO `sys_role_menu` VALUES (1325, 1, 11);
INSERT INTO `sys_role_menu` VALUES (1326, 1, 16);
INSERT INTO `sys_role_menu` VALUES (1327, 1, 15);
INSERT INTO `sys_role_menu` VALUES (1328, 1, 14);
INSERT INTO `sys_role_menu` VALUES (1329, 1, 13);
INSERT INTO `sys_role_menu` VALUES (1330, 1, 43);
INSERT INTO `sys_role_menu` VALUES (1331, 1, 42);
INSERT INTO `sys_role_menu` VALUES (1332, 1, 39);
INSERT INTO `sys_role_menu` VALUES (1333, 1, 12);

-- ----------------------------
-- Table structure for sys_user
-- ----------------------------
DROP TABLE IF EXISTS `sys_user`;
CREATE TABLE `sys_user`  (
                             `user_id` bigint(20) NOT NULL AUTO_INCREMENT,
                             `username` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `salt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `nickname` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `phone` varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `role_id` int(11) DEFAULT NULL,
                             `avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `sex` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `email` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `dept_id` int(11) DEFAULT NULL,
                             `post_id` int(11) DEFAULT NULL,
                             `create_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `update_by` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `remark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `status` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             `role_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '多角色',
                             `post_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT '多岗位',
                             PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sys_user
-- ----------------------------
INSERT INTO `sys_user` VALUES (1, 'admin', '4a8fd11436e09adbf507166bb401dbb0', 'EtVSfA', 'DIY可视化', '15913132246', 1, '', '0', '280160522@qq.com', 2, 1, 'admin', '1', NULL, '0', '2021-12-03 09:46:55', '2021-12-03 10:51:34', NULL, '1', '1');
INSERT INTO `sys_user` VALUES (12, 'test', '9b0cac64f5e4e142d3d954f33f11629c', 'TnYjBp', 'test', '', NULL, '', '', '', 2, NULL, NULL, NULL, '', '', '2022-05-08 23:15:14', '2022-05-08 23:15:31', '2022-05-08 23:15:31', '', '');

DROP TABLE IF EXISTS `diy_user`;
CREATE TABLE `diy_user`  (
                             `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
                             `openid` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '用户的唯一身份ID',
                             `realname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '真实姓名',
                             `nickname` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '昵称',
                             `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT '' COMMENT '头像',
                             `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '0' COMMENT '性别',
                             `province` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '居住省份',
                             `city` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT '' COMMENT '居住城市',
                             `create_time` datetime(0) DEFAULT NULL,
                             `update_time` datetime(0) DEFAULT NULL,
                             `delete_time` datetime(0) DEFAULT NULL,
                             `type` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '用户类型',
                             PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

SET FOREIGN_KEY_CHECKS = 1;