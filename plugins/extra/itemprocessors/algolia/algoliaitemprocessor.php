<?php

/**
 * Algolia queue processor
 * @author Rafał Kos
 *
 * This processor add update products to algolia queue
 */
class AlgoliaQueueImported extends Magmi_ItemProcessor
{
    public function getPluginInfo()
    {
        return array(
            "name"    => "Algolia Queue import",
            "author"  => "Kos Rafał",
            "version" => "0.0.1"
        );
    }

    public function processItemAfterImport(&$item, $params = null)
    {
        if (count($item) > 0) {
            $pid=$params["product_id"];

            $sql = "
                INSERT INTO algoliasearch_queue (created, class, method, data, max_retries, retries, data_size)
                VALUES (NOW(), 'algoliasearch/observer', 'rebuildProductIndex', ?, 3, 0, 1)
            ";
            $data = array('store_id' => 1, 'product_ids' => array($pid));
            $this->insert($sql, json_encode($data));
        }

        return true;
    }
}
