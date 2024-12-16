#!/usr/bin/env bash

set -e

# Ensure that the CWD is set to script's location
cd "${0%/*}"
CWD=$(pwd)

SERVER_DIR="" # parent directory on server to put files in, can be ""
DIST="dist" # local directory frm which to upload files
FTP_HOST="vldb.org"
if [ -z ${FTP_USER+x} ]
then
    echo "Env variable FTP_USER must be set"
    exit 1
fi
if [ -z ${FTP_PASSWORD+x} ]
then
    echo "Env variable FTP_PASSWORD must be set"
    exit 1
fi

error() {
  echo "The script encountered an error. Upload did NOT finish."
  echo "The last line before this is an attempted file upload."
  echo "Maybe: are FTP username and password correct?"
}
trap error 0

pushd $DIST

for dir in $(find . -type d)
do
    echo $dir
    ftp -n $FTP_HOST -P 21 <<EOF
user $FTP_USER $FTP_PASSWORD
mkdir $SERVER_DIR/$dir
quit
EOF
done

find . -type f -print0 | while IFS= read -r -d '' file
do
    file_url=$( echo "$file" | sed 's/ /%20/g' )
    file_unix=$( echo "$file" | sed 's/ /\ /g' )
    echo "$file_unix"
    curl -s -T "$file_unix" \
        ftp://vldb.org/"$SERVER_DIR"/"$(dirname "$file_unix")"/"$(basename "$file_url")" \
        --user "$FTP_USER":"$FTP_PASSWORD"
done

popd

trap - 0

echo "Done"
