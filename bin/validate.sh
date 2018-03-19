#!/usr/bin/env bash

######################################################
# We do the necessary setup for running docker-compose
#
######################################################

set -e


# Thanks github moodle-docker
SOURCE="${BASH_SOURCE[0]}"
while [ -h "$SOURCE" ]; do # resolve $SOURCE until the file is no longer a symlink
  DIR="$( cd -P "$( dirname "$SOURCE" )" && pwd )"
  SOURCE="$(readlink "$SOURCE")"
  [[ $SOURCE != /* ]] && SOURCE="$DIR/$SOURCE" # if $SOURCE was a relative symlink, we need to resolve it relative to the path where the symlink file was located
done
BASEDIR="$( cd -P "$( dirname "$SOURCE" )/../" && pwd )"

. ${BASEDIR}/bin/lib/lib.sh

if [ ! -f "${BASEDIR}/.env" ]; then
	echo "There is no .env file, we are going to create it"
	cp ${BASEDIR}/.env.dist ${BASEDIR}/.env
	correctNewEnvFile
fi

# We use uqam.app... if other modify .env file and nginx/symfony.conf
# It is important to keep the final localhost to bypass security in new browsers.
HOSTS_ENTRY="127.0.0.1 uqam.app.localhost"
# Modifier /etc/hosts file
(grep "${HOSTS_ENTRY}" /etc/hosts) || echo "${HOSTS_ENTRY}" | sudo tee -a /etc/hosts

createDirectoryIfNotExists .composer
createDirectoryIfNotExists .data

createDirectoryIfNotExists logs