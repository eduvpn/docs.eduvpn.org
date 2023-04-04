#!/bin/sh

set -e

# Add these lines to ${HOME}/.ssh/known-hosts (without leading "#")
#eduvpn-cdn.deic.dk ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAINW1eYR9jWYdzDok4hCm8TfbNYkxhZzvxbiUuveYHOqJ
#ams-cdn.eduvpn.org ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIJXDSpq0Q17KijNPTEvhKPDSnx6WC73giHaYidD8eZk2

UPLOAD_SERVER_PATH_LIST="
    docs@eduvpn-cdn.deic.dk:/var/www/docs.eduvpn.org
    docs@ams-cdn.eduvpn.org:/var/www/docs.eduvpn.org
"

for UPLOAD_SERVER_PATH in ${UPLOAD_SERVER_PATH_LIST}; do
	echo "${UPLOAD_SERVER_PATH}..."
	rsync -e ssh -rltO --delete output/* "${UPLOAD_SERVER_PATH}" --progress --exclude '.git' || echo "FAIL ${SERVER}"
done
