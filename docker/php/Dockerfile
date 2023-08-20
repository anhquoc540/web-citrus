FROM php:8.1-fpm

# Install tooling we need
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        nano \
        curl \
        unzip \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev

# Install PHP ext
RUN docker-php-ext-configure gd && \
    docker-php-ext-install gd \
            mysqli \
            pdo \
            pdo_mysql
RUN apt-get install zip
RUN apt-get install libzip-dev -y
RUN docker-php-ext-install zip

# Install PHP ext mongodb
# RUN apt-get install -y libcurl4-openssl-dev pkg-config libssl-dev
# RUN pecl install mongodb && docker-php-ext-enable mongodb

# RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# COPY configuration
COPY config/php.ini /usr/local/etc/php/php.ini

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

RUN docker-php-ext-configure pcntl --enable-pcntl \
  && docker-php-ext-install \
    pcntl

# RUN apt-get install -y libmagickwand-dev --no-install-recommends
# && rm -rf /var/lib/apt/lists/*
# RUN printf "\n" | pecl install imagick
# RUN docker-php-ext-enable imagick

# RUN apt-get -y install ghostscript

# ARG imagemagic_config=/etc/ImageMagick-6/policy.xml

# RUN if [ -f $imagemagic_config ] ; then sed -i 's/<policy domain="coder" rights="none" pattern="PDF" \/>/<policy domain="coder" rights="read|write" pattern="PDF" \/>/g' $imagemagic_config ; else echo did not see file $imagemagic_config ; fi
# Install git
# RUN apt install git -y
