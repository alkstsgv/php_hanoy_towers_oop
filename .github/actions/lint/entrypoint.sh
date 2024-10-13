#!/bin/sh
set -e

echo "##### PHP Lint Action #####"

PHP_VERSION=$(php -r "echo phpversion();")

if [ -z "$1" ]; then
  TARGET_DIR="."
else
  TARGET_DIR="$1"
fi

echo ":: Running PHP Syntax Checker (lint) on ${TARGET_DIR}"
echo ":: PHP Version : ${PHP_VERSION}"

if [ ! -d "${TARGET_DIR}" ] && [ ! -f "${TARGET_DIR}" ]; then
  echo -e "\nInvalid directory or file: ${TARGET_DIR}"
  exit 2
fi

EXIT_CODE=0
for file in $(find ${TARGET_DIR} -type f -name "*.php" | fgrep -v ".idea"); do
  RESULT=$(php -l ${file} || true)

  if [ "${RESULT}" != "No syntax errors detected in ${file}" ]; then
    echo -e "\n${RESULT}\n"
    EXIT_CODE=1
  fi
done

if [ $EXIT_CODE = 0 ]; then
    echo ":: No syntax errors detected"
fi

exit "${EXIT_CODE}"
