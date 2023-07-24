FROM php:8.2-fpm
COPY php.ini /usr/local/etc/php/
#linux package download to "/var/lib/apt/lists",install
#outputed message "yes" ,midleware install /compression file(zlib gzip) libraly/client app inMariaDB/textediter(vim)/compression file(zip) libraly
#Dockerでlaravelの環境を構築する時などには、要件としてPHPの拡張モジュールをダウンロード＆インストール
RUN apt-get update \
  && apt-get install -y zlib1g-dev mariadb-client vim libzip-dev curl\
  && docker-php-ext-install zip pdo_mysql

# nodeインストール
RUN curl -fsSL https://deb.nodesource.com/setup_17.x | bash -
RUN apt-get install -y nodejs
RUN npm install n -g 
RUN n 20.2.0

# xdebugのインストール
# xdebugのinstallと設定に必要なzend_extensionを生成している
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug
      # /usr/local/etc/php/conf.d/docker-php-ext-xdebug.iniに
      # zend_extension = ~ 出力される

#Composer install (PHP のプロジェクトが必要とするライブラリやパッケージを管理する「ライブラリ依存管理ツール)
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

#環境本番設定
ENV COMPOSER_ALLOW_SUPERUSER 1

ENV COMPOSER_HOME /composer

ENV PATH $PATH:/composer/vendor/bin

#Dockerfile 内で行われる命令をどのディレクトリで行うかを指定したり、
#コンテナ起動後のログインした時のディレクトリを指定する時に使っている。
WORKDIR /var/www

#laravel install
RUN composer global require "laravel/installer"
