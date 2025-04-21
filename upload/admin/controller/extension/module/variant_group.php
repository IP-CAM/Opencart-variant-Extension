<?php
class ControllerExtensionModuleVariantGroup extends Controller {
    private $error = array();

    public function index() {
        $this->load->language('extension/module/variant_group');
        $this->document->setTitle($this->language->get('heading_title'));
        $this->load->model('extension/module/variant_group');

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            // Save the variant group settings (including associated product IDs)
            $this->model_extension_module_variant_group->saveGroup($this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('marketplace/extension', 'user_token=' . $this->session->data['user_token'], true));
        }

        $data['action'] = $this->url->link('extension/module/variant_group', 'user_token=' . $this->session->data['user_token'], true);

        // Load existing group data if editing
        if (isset($this->request->get['variant_group_id'])) {
            $group_info = $this->model_extension_module_variant_group->getGroup($this->request->get['variant_group_id']);
            $data['group'] = $group_info;
        } else {
            $data['group'] = array();
        }

        // Render the admin form view (Twig template)
        $this->response->setOutput($this->load->view('extension/module/variant_group_form', $data));
    }

    protected function validate() {
        if (!$this->user->hasPermission('modify', 'extension/module/variant_group')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }
        return !$this->error;
    }
}
