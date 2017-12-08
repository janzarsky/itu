#!/bin/bash

echo "Making archive for wis"

FILES=$(git diff --name-only HEAD 628a36ff630cca6730ae81b903d293f1e28a2e0d \
    | grep -v 'composer.json' \
    | grep -v 'composer.lock' \
    | grep -v '.htaccess' \
    | grep -v 'archive.sh' \
    | grep -v '.gitignore')

echo "Creating temp directory"

mkdir tmp

IFS='
'

for f in $FILES ; do
    name=${f//\//__}
    echo "packing file $f"
    cp "$f" "tmp/$name"
done

cd tmp

zip ../xzarsk03_140_114_src.zip *

cd ..
rm -rf tmp
