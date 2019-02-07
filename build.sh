#! /bin/bash

function success {
    printf ' ✅ \n'
}

function failure {
    printf ' ❎ \n'
    printf 'Failure!!!\n'
    exit 1
}

printf 'Cleaning'
[ -d dist ] && rm -rf dist
[ -d dist ] || mkdir dist
success

printf 'Building'
cvSrc="src/cv.md"
cvDist="dist/Simon Bruce - Curriculum vitae"
format="markdown_phpextra"

cp "${cvSrc}" "${cvDist}.md" || failure

docker run --rm --volume `pwd`:/source jagregory/pandoc:latest "${cvSrc}" --reference-docx="src/reference.docx" -f "${format}" -o "${cvDist}.docx" -t docx || failure
success

printf 'Done'
success

exit 0
