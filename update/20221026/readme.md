根据表结构自动生成增删查改接口

自建表需包含 default.sql 文件中默认字段

1.数据库中建表

2.命令： php think diygw:api {表名}@{controller名}  将自动生成list get save del 接口

例：
```
php think sys_user@SysUser
```