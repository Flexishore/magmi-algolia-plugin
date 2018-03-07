Magmi Plugin For adding new / updated products to Algolia queue
================================================

This plugin allows to add imported products to algolia queue so search results will always will be in sync.

Be aware that by default we are adding products to `store_id` *1*. For custom changes please update file `plugins/extra/itemprocessors/algolia/algoliaitemprocessor.php` line 29.