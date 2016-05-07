#! /bin/sh
now=`date +%Y%m%d%H%M`

# create publish folder
folder="/Users/gangzi/Work/publish_xiaohua/${now}/xiaohua"
mkdir -p ${folder}

# go to project git folder
cd /Users/gangzi/htdocs/xiaohua
git archive --format=zip --output="${folder}/xiaohua.zip" online

# go to publish folder and rsync
cd ${folder}
unzip xiaohua.zip
rm xiaohua.zip

rsync -v -r ${folder} root@112.74.78.105:/var/www/html
