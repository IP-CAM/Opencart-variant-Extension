<?php
// admin/model/extension/module/variant_group.php

class ModelExtensionModuleVariantGroup extends Model {
    // Add a new variant group and assign products to it
    public function addGroup($data) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "variant_group SET group_name = '" . $this->db->escape($data['group_name']) . "'");
        $group_id = $this->db->getLastId();

        if (!empty($data['products'])) {
            // Expecting a comma separated list of product IDs
            $products = explode(',', $data['products']);
            foreach ($products as $product_id) {
                $product_id = trim($product_id);
                if ($product_id) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "variant_group_product SET variant_group_id = '" . (int)$group_id . "', product_id = '" . (int)$product_id . "'");
                }
            }
        }

        return $group_id;
    }

    // Edit an existing variant group
    public function editGroup($group_id, $data) {
        $this->db->query("UPDATE " . DB_PREFIX . "variant_group SET group_name = '" . $this->db->escape($data['group_name']) . "' WHERE variant_group_id = '" . (int)$group_id . "'");

        // Remove existing product associations
        $this->db->query("DELETE FROM " . DB_PREFIX . "variant_group_product WHERE variant_group_id = '" . (int)$group_id . "'");

        if (!empty($data['products'])) {
            $products = explode(',', $data['products']);
            foreach ($products as $product_id) {
                $product_id = trim($product_id);
                if ($product_id) {
                    $this->db->query("INSERT INTO " . DB_PREFIX . "variant_group_product SET variant_group_id = '" . (int)$group_id . "', product_id = '" . (int)$product_id . "'");
                }
            }
        }
    }

    // Retrieve a variant group including its associated products
    public function getGroup($group_id) {
        $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "variant_group WHERE variant_group_id = '" . (int)$group_id . "'");
        if ($query->num_rows) {
            $group = $query->row;
            $group['products'] = $this->getGroupProducts($group_id);
            return $group;
        }
        return false;
    }

    // Helper: Get product IDs associated with a variant group
    public function getGroupProducts($group_id) {
        $query = $this->db->query("SELECT product_id FROM " . DB_PREFIX . "variant_group_product WHERE variant_group_id = '" . (int)$group_id . "'");
        $products = array();
        foreach ($query->rows as $row) {
            $products[] = $row['product_id'];
        }
        return $products;
    }
}
