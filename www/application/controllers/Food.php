<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();

		$this->load->model('food_model');
	}
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index($list = "product")
	{
		// echo $list;

		$search = $this->input->post('search');
		if ($search) {
			$allfood = $this->food_model->search($search);
			$list = '';
		}
		else {
			$allfood = $this->food_model->getAll($list);
		}
		if ($list == "product") {
			foreach ($allfood as $food) {
				$price = $this->food_model->getFoodPrice($food->id);
				$food->price = $food->price_1000g;
				$food->price_1000g = $price;
			}
		}
		
        $this->load->view('food_index', array('allfood' => $allfood, "list" => $list));
	}

	function edit()
	{
		$success = "";
		// Logic for update, insert, delete ingredient 
		$food_id = $this->input->post("food_id"); 
		if ($food_id) {
			$ing_qty = $this->input->post('quantity_g');
			if (is_array($ing_qty)) {
				foreach ($ing_qty as $id => $value) {
					$this->food_model->updateIngredient($food_id, $id, $value);
				}
				$prod = $this->food_model->getById($food_id);
				$success = "Sikeresen módosítva: ".$prod->name;
			}
		}

		$segments = $this->uri->segment_array();
		$id = array_pop($segments);
		
		if ($this->input->post('save_product')) {
			unset($_POST['save_product']);
			$result = $this->food_model->updateProduct($id, $_POST);
		}

		$food = $this->food_model->getById($id);

		$ingredients = $this->food_model->getIngredients($id);

		$formaction = $food ? site_url('edit/'.getPropVal($food, 'id')) : site_url('newitem');

		$this->load->view('food_edit', array(
			"formaction" => $formaction, 
			"food" => $food, 
			"ingredients" => $ingredients,
			"success" => $success
		));
	}

	public function newitem() 
	{
		$error = "";
		$success = "";

		if ($this->input->post('save_product')) {
			unset($_POST['save_product']);

			$exits = $this->food_model->getByName($_POST["name"]);

			if (empty($exits)) {
				$result = $result = $this->food_model->addProduct($_POST);
				if ($result) {
					$success = "Sikeresen hozzáadva: ".$_POST["name"];
				}
			}
			else {
				$error = "Már létezik: ".$_POST["name"];
			}
		}

        $this->load->view('food_edit', array(
			'formaction' => site_url('newitem'), 
			'food' => array(),
			'error' => $error,
			"success" => $success
		));
	}
}
