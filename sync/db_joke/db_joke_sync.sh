#! /bin/sh

now=`date +%Y%m%d%H%M`
file_sql="db_joke_struct_${now}.sql"

# dump local sql file
# mysqldump -uroot -p123456 db_joke > ${file_sql}
mysqldump --opt -d -uroot -p123456 db_joke > ${file_sql}

# upload to 112.74.78.105
host=112.74.78.105
scp ${file_sql} root@${host}:/data/sync/db_joke/




