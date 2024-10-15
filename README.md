# cloud-AIART
基于腾讯云aiart
使用步骤
  安装Tencent Cloud SDK 3.0 for PHP
  步骤1：安装 Composer
  Windows 环境请访问 Composer 官网下载安装包安装。
  Unix 环境在命令行中执行以下命令安装：
  curl -sS https://getcomposer.org/installer | php
  sudo mv composer.phar /usr/local/bin/composer
  步骤2：添加镜像源
  中国大陆地区的用户可以使用腾讯云镜像源提高下载速度，在打开的命令窗口执行以下命令：

  composer config -g repos.packagist composer https://mirrors.tencent.com/composer/
  步骤3：添加依赖
  在打开的命令窗口执行命令安装 SDK（安装到指定位置），例如安装到C:\Users\···>目录下，则在指定的位置打开命令窗口，并执行以下命令：

  composer require tencentcloud/tencentcloud-sdk-php
安装完毕后将文件放到域名任意目录
然后终端进入该文件夹并使用
composer install
然后访问该文件并带参数
如:xxx.com/Sample.php?prompt=一个人在舞台上跳舞&logoadd=0&negativeprompt=不要画手
目前参数有
        Prompt：提示词
        Styles：画风
        NegativePrompt：反向提示词
        LogoAdd：水印（0关1开）

























