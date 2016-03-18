# 使用文档

## 后端使用说明

1. 下载安装 [composer](https://getcomposer.org) 包管理软件
2. 打开翻墙软件全局翻墙
3. 本地 PHPStudy 环境切换到 PHP5.6（注意：若安装过程出现未安装 OpenSSL 扩展错误的提示，请在 PHPStudy 中安装 OpenSSL 插件。切换 PHP 环境需要重新安装 Composer）
4. 在当前文件夹运行命令行工具，执行命令 `composer install`

## 前端使用说明

> 部署前端时，不需要全局翻墙

1. 安装 [Node 4.* ](https://nodejs.org/en/)
2. 安装 `cnpm`： `npm install -g cnpm --registry=https://registry.npm.taobao.org`
3. 全局安装 `Bower`：`cnpm install -g bower`
4. 在项目根目录运行命令行工具：`bower install`，等待结束
5. 在项目根目录运行命令行工具：`cnpm install`，等待结束

## 项目目录说明

本项目以后端为基础，前端资源分别分布在 `public` 文件夹和 `resources/view` 文件夹中。前者放置 CSS、JavaScript 等静态资源文件，后者放着页面及视图文件。

本项目后端模板引擎为 `Blade`，语法说明参照：http://www.golaravel.com/laravel/docs/5.1/blade/

## 项目运行说明

1. 启动 `PHPStudy`
2. 浏览器访问 `http://localhost`
3. 依次选择项目目录，直到进入本项目根目录为止
4. 选择项目根目录下的 `public` 文件夹，即可看到 `Laravel` 欢迎界面，说明项目成功运行
