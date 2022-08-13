FROM phpdockerio/php74-fpm:latest
WORKDIR "/application"

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive

# Install selected extensions and other stuff
RUN apt-get update \
    && apt-get -y --no-install-recommends install  php-memcached php7.4-mysql php7.4-json php7.4-zip php7.4-xml php7.4-mbstring php7.4-pgsql php7.4-sqlite3 php-xdebug php7.4-gd php-gearman php7.4-gmp php-imagick php7.4-imap php7.4-intl php7.4-ldap \
    && apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*