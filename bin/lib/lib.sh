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

function dockerComposeExec {
	#TODO validate running
	docker-compose -f ${BASEDIR}/docker-compose.yml exec -T  -u ${UID} $@
}