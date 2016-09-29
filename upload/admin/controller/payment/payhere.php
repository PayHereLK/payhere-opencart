<?php
class ControllerPaymentPayHere extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('payment/payhere');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('setting/setting');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$this->model_setting_setting->editSetting('payhere', $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$this->response->redirect($this->url->link('extension/payment', 'token=' . $this->session->data['token'], true));
		}

		$data['heading_title'] = $this->language->get('heading_title');

		$data['text_edit'] = $this->language->get('text_edit');
		$data['text_enabled'] = $this->language->get('text_enabled');
		$data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_yes'] = $this->language->get('text_yes');
		$data['text_no'] = $this->language->get('text_no');
		$data['text_all_zones'] = $this->language->get('text_all_zones');

		$data['entry_merchant_id'] = $this->language->get('entry_merchant_id');
        $data['entry_test'] = $this->language->get('entry_test');
		$data['entry_total'] = $this->language->get('entry_total');
		$data['entry_order_status'] = $this->language->get('entry_order_status');
		$data['entry_pending_status'] = $this->language->get('entry_pending_status');
		$data['entry_canceled_status'] = $this->language->get('entry_canceled_status');
		$data['entry_failed_status'] = $this->language->get('entry_failed_status');
		$data['entry_chargeback_status'] = $this->language->get('entry_chargeback_status');
		$data['entry_geo_zone'] = $this->language->get('entry_geo_zone');
		$data['entry_status'] = $this->language->get('entry_status');
		$data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$data['entry_payhere_id'] = $this->language->get('entry_payhere_id');
		$data['entry_secret'] = $this->language->get('entry_secret');
		$data['entry_custnote'] = $this->language->get('entry_custnote');

		$data['help_test'] = $this->language->get('help_test');
        $data['help_total'] = $this->language->get('help_total');

		$data['button_save'] = $this->language->get('button_save');
		$data['button_cancel'] = $this->language->get('button_cancel');

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/dashboard', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_payment'),
			'href' => $this->url->link('extension/payment', 'token=' . $this->session->data['token'], true)
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('payment/payhere', 'token=' . $this->session->data['token'], true)
		);

		$data['action'] = $this->url->link('payment/payhere', 'token=' . $this->session->data['token'], true);

		$data['cancel'] = $this->url->link('extension/payment', 'token=' . $this->session->data['token'], true);

		if (isset($this->request->post['payhere_merchant_id'])) {
			$data['payhere_merchant_id'] = $this->request->post['payhere_merchant_id'];
		} else {
			$data['payhere_merchant_id'] = $this->config->get('payhere_merchant_id');
		}

		if (isset($this->request->post['payhere_secret'])) {
			$data['payhere_secret'] = $this->request->post['payhere_secret'];
		} else {
			$data['payhere_secret'] = $this->config->get('payhere_secret');
		}
        
        if (isset($this->request->post['payhere_status'])) {
			$data['payhere_status'] = $this->request->post['payhere_status'];
		} else {
			$data['payhere_status'] = $this->config->get('payhere_status');
		}
        
        if (isset($this->request->post['payhere_test'])) {
			$data['payhere_test'] = $this->request->post['payhere_test'];
		} else {
			$data['payhere_test'] = $this->config->get('payhere_test');
		}

		if (isset($this->request->post['payhere_total'])) {
			$data['payhere_total'] = $this->request->post['payhere_total'];
		} else {
			$data['payhere_total'] = $this->config->get('payhere_total');
		}

		if (isset($this->request->post['payhere_order_status_id'])) {
			$data['payhere_order_status_id'] = $this->request->post['payhere_order_status_id'];
		} else {
			$data['payhere_order_status_id'] = $this->config->get('payhere_order_status_id');
		}

		if (isset($this->request->post['payhere_pending_status_id'])) {
			$data['payhere_pending_status_id'] = $this->request->post['payhere_pending_status_id'];
		} else {
			$data['payhere_pending_status_id'] = $this->config->get('payhere_pending_status_id');
		}

		if (isset($this->request->post['payhere_canceled_status_id'])) {
			$data['payhere_canceled_status_id'] = $this->request->post['payhere_canceled_status_id'];
		} else {
			$data['payhere_canceled_status_id'] = $this->config->get('payhere_canceled_status_id');
		}

		if (isset($this->request->post['payhere_failed_status_id'])) {
			$data['payhere_failed_status_id'] = $this->request->post['payhere_failed_status_id'];
		} else {
			$data['payhere_failed_status_id'] = $this->config->get('payhere_failed_status_id');
		}

		if (isset($this->request->post['payhere_chargeback_status_id'])) {
			$data['payhere_chargeback_status_id'] = $this->request->post['payhere_chargeback_status_id'];
		} else {
			$data['payhere_chargeback_status_id'] = $this->config->get('payhere_chargeback_status_id');
		}

		$this->load->model('localisation/order_status');

		$data['order_statuses'] = $this->model_localisation_order_status->getOrderStatuses();

		if (isset($this->request->post['payhere_geo_zone_id'])) {
			$data['payhere_geo_zone_id'] = $this->request->post['payhere_geo_zone_id'];
		} else {
			$data['payhere_geo_zone_id'] = $this->config->get('payhere_geo_zone_id');
		}

		$this->load->model('localisation/geo_zone');

		$data['geo_zones'] = $this->model_localisation_geo_zone->getGeoZones();

		if (isset($this->request->post['payhere_sort_order'])) {
			$data['payhere_sort_order'] = $this->request->post['payhere_sort_order'];
		} else {
			$data['payhere_sort_order'] = $this->config->get('payhere_sort_order');
		}

		if (isset($this->request->post['payhere_rid'])) {
			$data['payhere_rid'] = $this->request->post['payhere_rid'];
		} else {
			$data['payhere_rid'] = $this->config->get('payhere_rid');
		}

		if (isset($this->request->post['payhere_custnote'])) {
			$data['payhere_custnote'] = $this->request->post['payhere_custnote'];
		} else {
			$data['payhere_custnote'] = $this->config->get('payhere_custnote');
		}

		$data['header'] = $this->load->controller('common/header');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['footer'] = $this->load->controller('common/footer');

		$this->response->setOutput($this->load->view('payment/payhere', $data));
	}

	protected function validate() {
		if (!$this->user->hasPermission('modify', 'payment/payhere')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->request->post['payhere_merchant_id']) {
			$this->error['email'] = $this->language->get('error_email');
		}

		return !$this->error;
	}
}