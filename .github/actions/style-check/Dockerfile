FROM php:7.3.31-cli-alpine

LABEL version="7.3"

COPY ruleset.xml /var/lib/phpcs/ruleset.xml
COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

RUN curl -L https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar -s -o /usr/bin/phpcs.phar

ENTRYPOINT ["/entrypoint.sh"]
