FROM nimmis/apache-php5
MAINTAINER Nilo Júnior (aka nilohouse) <nilo.jr@gmail.com>

ADD code-club-matching.conf /etc/apache2/sites-available/

RUN rm /bin/sh && ln -s /bin/bash /bin/sh

RUN echo 'debconf debconf/frontend select Noninteractive' | debconf-set-selections

RUN apt-get update && apt-get install -y -q --no-install-recommends \
		vim \
        apt-transport-https \
        build-essential \
        ca-certificates \
        curl \
        git \
        libssl-dev \
        python \
        rsync \
        software-properties-common \
        wget \
    && rm -rf /var/lib/apt/lists/*

ENV NVM_DIR /usr/local/nvm
ENV NODE_VERSION 0.10.33

# Install nvm with node and npm
RUN curl https://raw.githubusercontent.com/creationix/nvm/v0.20.0/install.sh | bash \
    && source $NVM_DIR/nvm.sh \
    && nvm install $NODE_VERSION \
    && nvm alias default $NODE_VERSION \
    && nvm use default

ENV NODE_PATH $NVM_DIR/v$NODE_VERSION/lib/node_modules
ENV PATH      $NVM_DIR/v$NODE_VERSION/bin:$PATH

RUN apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN echo "export PATH=${PATH}:/var/www/laravel/vendor/bin" >> ~/.bashrc

RUN a2enmod rewrite
RUN a2ensite code-club-matching

RUN useradd -ms /bin/bash laravel
USER laravel

WORKDIR /var/www/laravel