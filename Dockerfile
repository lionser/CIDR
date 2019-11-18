FROM php:7.1-cli

COPY . /usr/src/

RUN apt-get update && \
    apt-get install -y --no-install-recommends curl git zip

RUN curl --silent --show-error https://getcomposer.org/installer | php

WORKDIR /usr/src/cidr

CMD ["/bin/bash"]