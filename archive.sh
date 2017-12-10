#!/bin/bash

echo "Making archive for wis"

mkdir tmp

IFS='
'

for f in app composer.json composer.lock config database package.json package-lock.json resources routes webpack.mix.js; do
    name=${f//\//__}
    echo "packing file $f"
    cp -r "$f" "tmp/$name"
done

cd tmp

zip -r ../xzarsk03_140_114_src.zip *

cd ..
rm -rf tmp
