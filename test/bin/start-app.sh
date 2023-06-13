#!/usr/bin/env bash

ROOT_DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )/.."

php -S 0.0.0.0:8080 -t "${ROOT_DIR}/Functional/app"