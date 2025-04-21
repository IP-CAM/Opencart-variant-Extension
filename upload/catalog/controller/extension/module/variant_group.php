<?php
class ControllerExtensionModuleVariantGroup extends Controller {
    public function index() {
        // Check if product has a variant group
        $this->load->model('extension/module/variant_group');
        $product_id = (int)$this->request->get['product_id'];

        $group = $this->model_extension_module_variant_group->getGroupByProductId($product_id);

        if ($group) {
            // Retrieve all variants in this group
            $variants = $this->model_extension_module_variant_group->getProductsInGroup($group['variant_group_id']);
            
            // Pass variants data to view (including option names, values, images etc.)
            $data['variants'] = $variants;
            
            return $this->load->view('extension/module/variant_group', $data);
        }
    }
    
    // AJAX endpoint to switch variants
    public function switchVariant() {
        $this->load->model('extension/module/variant_group');
        if (isset($this->request->get['target_product_id'])) {
            $target_product_id = (int)$this->request->get['target_product_id'];
            // Optionally validate that the target product is in the same variant group as the current product
            // Get URL and any additional product details for AJAX update
            $product_info = $this->model_extension_module_variant_group->getProduct($target_product_id);
            if ($product_info) {
                // Optionally set canonical link if SEO is enabled
                $json['redirect'] = $this->url->link('product/product', 'product_id=' . $target_product_id);
            } else {
                $json['error'] = 'Variant not found.';
            }
        } else {
            $json['error'] = 'Invalid request.';
        }
        
        $this->response->addHeader('Content-Type: application/json');
        $this->response->setOutput(json_encode($json));
    }
}
