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

























@[TOC]

# Ollama安装教程

## 访问Ollama官网
首先打开ollama官网 [https://ollama.com/](https://ollama.com/)。

![下载Ollama](https://i.postimg.cc/BbmCMf57/2.png)

这里使用的是Windows，直接选择下载即可。

![下载Ollama](https://i.postimg.cc/BbmCMf57/2.png)

## 安装Ollama
文件下载好后直接打开点击安装即可。

![安装Ollama](https://i.postimg.cc/Znbc85Ny/3.png)

默认会安装到C盘，请预先给C盘足够的空间来保证环境安装和模型下载所需空间充足。

## 验证安装
安装完成后打开Windows PowerShell，可以输入`ollama`来验证是否安装成功或者变量配置是否有问题。

![验证安装](https://i.postimg.cc/fTgKdZRJ/4.png)

## 模型下载
这里以`wizardlm2`模型为例，我们只需要在命令行中输入`ollama run wizardlm2:7b`即可。

![下载模型](https://i.postimg.cc/J7xK1jw3/5.png)

等待模型下载完毕即可。

## 解决VC运行库问题
纯净系统启动可能存在VC运行库缺少问题。

![VC运行库问题](https://i.postimg.cc/V6jG9hH2/image.png)

如果出现这个问题，安装VC运行库即可。

## 命令行调用模型
再次输入`ollama run 模型名称`即可启动。

![启动模型](https://i.postimg.cc/Wb48ttjB/7.png)

出现“send a message”即为启动成功。

## 输入单条文本
单条文本直接输入回车即可调用。

![输入单条文本](https://i.postimg.cc/P5gQ64ZH/8.png)

## 输入多条文本
如果涉及多条文本的输入，则需要在文本开始前和结束位置输入`"""`。

![多行内容的提示词](https://i.postimg.cc/VNXB2CBC/9.png)

（多行内容的提示词）

前后加入`"""`。

![输入多条文本](https://i.postimg.cc/mDRN4g86/10.png)

## PowerShell中的效果
输入到PowerShell后的效果。

![PowerShell效果](https://i.postimg.cc/4d5vxR04/11.png)
