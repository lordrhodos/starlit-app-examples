#!/bin/sh

appContainer="starlit-app"
xdebugInstalled="$(docker exec ${appContainer} pecl list|grep xdebug)"

if [[ ${xdebugInstalled} ]]; then
    echo "xdebug is installed"
else
    echo "Installing xdebug"
    docker exec ${appContainer} pecl install xdebug-2.6.1
    docker exec ${appContainer} /usr/local/bin/docker-php-ext-enable xdebug
    docker exec ${appContainer} touch /usr/local/etc/php/conf.d/xdebug.ini
    docker exec ${appContainer} sh -c "echo \"xdebug.remote_enable=0\" >> /usr/local/etc/php/conf.d/xdebug.ini"
    docker exec ${appContainer} sh -c "echo \"xdebug.remote_autostart=0\" >> /usr/local/etc/php/conf.d/xdebug.ini"
    docker exec ${appContainer} sh -c "echo \"xdebug.remote_connect_back=0\" >> /usr/local/etc/php/conf.d/xdebug.ini"
    docker exec ${appContainer} sh -c "echo \"xdebug.remote_port=9002\" >> /usr/local/etc/php/conf.d/xdebug.ini"
    docker exec ${appContainer} sh -c "echo \"xdebug.remote_host=10.254.254.254\" >> /usr/local/etc/php/conf.d/xdebug.ini"
fi

xdebugOn="$(docker exec ${appContainer} grep "xdebug.remote_autostart=0" /usr/local/etc/php/conf.d/xdebug.ini)"

if [ "${xdebugOn}" ]; then
    echo "Enabling xdebug"
    docker exec ${appContainer} sed -r -i "s/.*xdebug.remote_autostart.*/xdebug.remote_autostart=1/g" /usr/local/etc/php/conf.d/xdebug.ini
    docker exec ${appContainer} sed -r -i "s/.*xdebug.remote_enable.*/xdebug.remote_enable=1/g" /usr/local/etc/php/conf.d/xdebug.ini
else
    echo "Disabling xdebug"
    docker exec ${appContainer} sed -r -i "s/.*xdebug.remote_autostart.*/xdebug.remote_autostart=0/g" /usr/local/etc/php/conf.d/xdebug.ini
    docker exec ${appContainer} sed -r -i "s/.*xdebug.remote_enable.*/xdebug.remote_enable=0/g" /usr/local/etc/php/conf.d/xdebug.ini
fi

docker exec ${appContainer} /etc/init.d/apache2 reload