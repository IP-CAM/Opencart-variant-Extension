<?php
// catalog/model/extension/module/variant_group.php

class ModelExtensionModuleVariantGroup extends Model {
    // Get the variant group for a given product
    public function getGroupByProductId($product_id) {
        $query = $this->db->query("SELECT vg.* FROM " . DB_PREFIX . "variant_group vg LEFT JOIN " . DB_PREFIX . "variant_group_product vgp ON (vg.variant_group_id = vgp.variant_group_id) WHERE vgp.product_id = '" . (int)$product_id . "'");
        return $query->num_rows ? $query->row : false;
    }

    // Get all products associated with a variant group
    public function getProductsInGroup($group_id) {
        $query = $this->db->query("SELECT p.product_id, p.name, p.image FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "variant_group_product vgp ON (p.product_id = vgp.product_id) WHERE vgp.variant_group_id = '" . (int)$group_id . "'");
        return $query->rows;
    }
}
