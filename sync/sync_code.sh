#! /bin/sh
now=`date +%Y%m%d%H%M`

# create publish folder
p_folder="/Users/gangzi/Work/publish_xiaohua"
xh_folder="${p_folder}/xiaohua"
bk_folder="${p_folder}/back_${now}"

if [ -d ${xh_folder} ]; then
	echo "cp -R ${xh_folder} ${bk_folder}"
	cp -R ${xh_folder} ${bk_folder}
	rm -rf ${xh_folder}
fi

mkdir -p ${xh_folder}

# go to project git folder
cd /Users/gangzi/htdocs/xiaohua
git tag xiaohua_${now}
git archive --format=zip --output="${xh_folder}/xiaohua.zip" master

# go to publish folder and rsync
cd ${xh_folder}
echo "unzip xiao.zip"
unzip -q xiaohua.zip
rm xiaohua.zip

# rsync xiaohua project
ex_file="/Users/gangzi/Work/publish_xiaohua/exclude"
rsync -r --exclude-from=${ex_file} ${xh_folder} root@112.74.78.105:/var/www/html
echo "finish rsync"