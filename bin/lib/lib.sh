function createDirectoryIfNotExists {
	if [ ! -d "${BASEDIR}/$1" ]; then
		mkdir "${BASEDIR}/$1"
		chown -R ${UID} "${BASEDIR}/$1"
		chmod -R 777 "${BASEDIR}/$1"
		echo "Creating $1 directory"
	else
		echo "Directory $1 exists"
	fi
}

#
# Executer docker-compose avec uid d'utilisateur local
# À la base de commandes dans container php:
# bin/composer
# bin/console
# 
function dockerComposeExec {
	#TODO validate running
	docker-compose -f ${BASEDIR}/docker-compose.yml exec -T  -u ${UID} $@
}

#
# On ajoute le path vers le dossier symfony
#
function correctNewEnvFile {
	sed -i -e "s#SYMFONY_APP_PATH=/path/symfony#SYMFONY_APP_PATH=`pwd`/symfony#" ${BASEDIR}/.env
}