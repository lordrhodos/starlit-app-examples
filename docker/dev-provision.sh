#!/bin/bash
appContainer="starlit-app"
if [[ -z "$appContainer" ]]; then
    appContainer="$( cd "$( dirname "${BASH_SOURCE[0]}" )/" >/dev/null && echo "${PWD##*/}" )-app"
fi

# Set application root as the working dir (relative to the scripts location)
cd "$( dirname "$0" )/../"

# If any commands fail - stop this script
abort()
{
    tput setab 9 && tput setaf 7 && tput bold
    echo && echo && echo "An error occurred on line $1. Exiting..." >&2
    tput sgr0 && echo
    exit 1
}

trap 'abort $LINENO' ERR
set -e

# Just adding some colors to the echo's
tput setab 5 && tput setaf 7 && tput bold
echo && echo && echo "Setting up docker for the Starlit App Examples"
tput sgr0 && echo

echo "Setting up docker starlit network"
docker network create starlit || true

echo "Recreating docker images and containers:"
docker-compose up -d --force-recreate

echo "Composer install:"
docker exec $appContainer composer install

echo "Setting up permissions:"
docker exec $appContainer usermod -u 1000 www-data

echo "Copying the .env file if it does not exist:"
if [ ! -e ".env" ]; then
       cp .env.example .env
fi

# Just adding some colors to the echo's
tput setab 5 && tput setaf 7 && tput bold
echo && echo && echo "Docker has been setup for the Starlit App Examples and can be reached at."
tput sgr0 && echo