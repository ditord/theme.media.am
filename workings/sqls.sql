/*UPDATE md_options
SET option_value = REPLACE(option_value,"134.209.90.159","media.am")
WHERE option_value LIKE "%134.209.90.159%";

UPDATE md_postmeta
SET meta_value = REPLACE(meta_value,"134.209.90.159","media.am")
WHERE meta_value LIKE "%134.209.90.159%";


UPDATE md_posts
SET `guid` = REPLACE(`guid`,"134.209.90.159","media.am")
WHERE `guid` LIKE "%134.209.90.159%";

UPDATE md_posts
SET `post_content` = REPLACE(`post_content`,"134.209.90.159","media.am")
WHERE `post_content` LIKE "%134.209.90.159%";

UPDATE md_toolset_post_guid_id
SET `guid` = REPLACE(`guid`,"134.209.90.159","media.am")
WHERE `guid` LIKE "%134.209.90.159%";

UPDATE md_usermeta
SET meta_value = REPLACE(meta_value,"134.209.90.159","media.am")
WHERE meta_value LIKE "%134.209.90.159%";


SELECT * FROM md_postmeta WHERE meta_value LIKE "%134.209.90.159%";

 104.248.205.211 */

/*UPDATE md_options
#SET option_value = REPLACE(option_value,"http://media.am","https://media.am")
#WHERE option_value LIKE "%http://media.am%";

SELECT * FROM md_options
WHERE option_value LIKE "%http://media.am%";


SELECT * 
FROM md_postmeta
WHERE meta_value LIKE "%http://media.am%";

UPDATE md_postmeta
SET meta_value = REPLACE(meta_value,"http://media.am","https://media.am")
WHERE meta_value LIKE "%http://media.am%";


UPDATE md_posts
SET `guid` = REPLACE(`guid`,"http://media.am","https://media.am")
WHERE `guid` LIKE "%http://media.am%";


UPDATE md_posts
SET `post_content` = REPLACE(`post_content`,"http://media.am","https://media.am")
WHERE `post_content` LIKE "%http://media.am%";

SELECT * 
FROM `md_usermeta` 
WHERE meta_value LIKE "%http://media.am%";
*/

/*
UPDATE `md_usermeta` 
SET `meta_value` = REPLACE(`meta_value`,"http://media.am","https://media.am")
WHERE meta_value LIKE "%http://media.am%";

UPDATE md_toolset_post_guid_id
SET `guid` = REPLACE(`guid`,"http://media.am","https://media.am")
WHERE `guid` LIKE "%http://media.am%";



SELECT * 
FROM `md_posts`
WHERE post_excerpt LIKE "%http://media.am%";


UPDATE `md_posts`
SET `post_excerpt` = REPLACE(`post_excerpt`,"http://media.am","https://media.am")
WHERE `post_excerpt` LIKE "%http://media.am%";
*/

scp root@138.197.182.149:/var/www/html/sites/default/files/discoverly.jpg ․

    SELECT *
    FROM md_posts
    WHERE post_content = guid
    AND post_type="post"
    AND post_status = "publish"
    AND post_date BETWEEN '2019-01-01' AND '2019-11-01'
    ORDER BY md_posts.post_title DESC

SELECT * FROM node WHERE title LIKE "%Մարտի 1, 2008. Օրվա քրոնիկոնը%"
SELECT * FROM `field_data_body` WHERE `entity_id` = 4236    
SELECT * FROM `story` WHERE `nid` = 1926
SELECT * FROM `node` WHERE `story` = 473




INSERT INTO md_fg_redirect(id,old_url,type,activated) VALUES(19713
,"/yerekoyan-yerevan-1991-september-ayo-logo/","post",1)



UPDATE  `md_posts` set `post_content` = "Media.am" WHERE `guid` = "https://media.am/armenias-public-tv-and-radio-council-no-violations-in-h1-broadcasting/"  

SELECT * FROM `md_posts`  WHERE `guid` = "https://media.am/armenias-public-tv-and-radio-council-no-violations-in-h1-broadcasting/"

SELECT * FROM md_posts WHERE CHAR_LENGTH(post_content) < 200 ORDER BY `md_posts` AND `post_type` = "post_type"  
SELECT * FROM `md_fg_redirect` WHERE `old_url` LIKE "%soviet-press%"


SELECT * FROM `md_posts` WHERE `post_content` LIKE "%yerevan-municipality-letter-to-a1-and-azatutyun%"

SELECT * FROM `md_posts` WHERE `post_name` LIKE "%yerevan-municipality-letter-to-a1-and-azatutyun%"
SELECT * FROM `md_posts` WHERE `post_title` LIKE "%Pashinyan On Fake News%"
SELECT * FROM `md_posts` WHERE `post_title` LIKE "%%"
SELECT * FROM `md_posts` WHERE `guid` LIKE "%/hy/category/verified/%"

2645

SELECT * FROM `md_fg_redirect` WHERE `old_url` LIKE "%/en/սոցցանցերում-սերունդների-միջև-անդու/%"

SELECT * FROM node WHERE `type` = "front_page_feautured" 



279

7947