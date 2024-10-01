#!/usr/bin/env bash

args=($@)
command=${args[0]}
additionalArgs=${args[@]:1}

PROJECT_PATH=/var/www/proj

case ${command} in
  lint)
    if [ -z "$(docker images -q php7.3-lint 2> /dev/null)" ]; then
      docker build -t php7.3-lint -f ./.github/actions/lint/Dockerfile ./.github/actions/lint/
    fi
    docker run -v $(pwd):$PROJECT_PATH -w $PROJECT_PATH -t php7.3-lint
  ;;
  cs-check)
    if [ -z "$(docker images -q php7.3-cs 2> /dev/null)" ]; then
      docker build -t php7.3-cs -f ./.github/actions/style-check/Dockerfile ./.github/actions/style-check/
    fi
    docker run -v $(pwd):$PROJECT_PATH -w $PROJECT_PATH -t php7.3-cs
  ;;
  *)
    echo $"Usage: $0 {lint|cs-check}"
    exit 0
  ;;
esac