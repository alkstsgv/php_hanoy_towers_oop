#!/bin/sh
set -e

echo "##### PHPCS Action #####"

PHP_VERSION=$(php -r "echo phpversion();")

if [ -z "$1" ]; then
  TARGET_DIR="."
else
  TARGET_DIR="$1"
fi

echo ":: Running PHP Style Checker on ${TARGET_DIR}"
echo ":: PHP Version : ${PHP_VERSION}"

if [ ! -d "${TARGET_DIR}" ] && [ ! -f "${TARGET_DIR}" ]; then
  echo -e "\nInvalid directory or file: ${TARGET_DIR}"
  exit 2
fi

if [ -z "$2" ]; then
  STANDARD_FILE="/var/lib/phpcs/ruleset.xml"
else
  STANDARD_FILE="$2"
fi

php /usr/bin/phpcs.phar -d memory_limit=512M --extensions='php' --colors --standard="${STANDARD_FILE}" --ignore='./vendor/,./.idea/' "${TARGET_DIR}"
EXIT_CODE=$?

exit $EXIT_CODE
