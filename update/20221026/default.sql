-- 建表基础字段

alter table `sys_test`
    add `create_by`   varchar(128) NOT NULL DEFAULT '' COMMENT '创建人',
    add `update_by`   varchar(128) NOT NULL DEFAULT '' COMMENT '更新人',
    add `create_time` datetime DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
    add `update_time` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
    add `delete_time` datetime DEFAULT NULL COMMENT '删除时间';

