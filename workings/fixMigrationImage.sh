# #!/bin/bash
href="http://161.35.16.103"$2"/node/"$1
echo $href
curl $href >./site.html
grep -oP '(?<= src="http://media.am/sites/default/files/).*?(?=")' ./site.html >./table.html
grep -oP '(?<= src="https://media.am/sites/default/files/).*?(?=")' ./site.html >>./table.html
grep -oP '(?<= src="/sites/default/files/).*?(?=")' ./site.html >>./table.html

for LN in $(cat ./table.html); do

    echo $LN
    scp root@138.197.182.149:/var/www/html/sites/default/files/$LN .

    # scp root@138.197.182.149:/var/www/html/sites/default/files/$LN root@134.209.90.159:/var/www/html/sites/default/files/
    # scp root@138.197.182.149:/var/www/html/sites/default/files/$LN .
done
