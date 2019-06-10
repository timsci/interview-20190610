FROM webdevops/php-nginx:7.3
MAINTAINER timscidev@gmail.com

ENV WEB_DOCUMENT_ROOT=/app/public \
    APP_KEY="00000000000000000000000000000000" \
    DB_CONNECTION=mysql \
    DB_HOST=db \
    DB_PORT=3306 \
    DB_DATABASE=contact \
    DB_USERNAME=root \
    DB_PASSWORD=password \
    LOG_CHANNEL=syslog

WORKDIR /app

# Add script to execute on boot of container
COPY ./build/setup.sh /opt/docker/provision/entrypoint.d/30-setup.sh
RUN chmod +x /opt/docker/provision/entrypoint.d/30-setup.sh

# Disable Cron Syslog output
RUN sed -i "s|not facility(auth, authpriv);|not facility(auth, authpriv, cron);|g" /opt/docker/etc/syslog-ng/syslog-ng.conf

# Install app
COPY --chown=application . /app
RUN su application -c "composer install --no-dev"
