<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	function __construct() { 
		parent::__construct();
		$this->load->model('main_model','model'); 
		$this->load->library('session');
    }

	
	public function index()
	{
		$data['movies'] = $this->model->getMovieHomeList();
		$this->load->view('home',$data);
	}

	public function loginpage()
	{
		$this->load->view('loginuser');
	}

	public function movies()
	{
		$data['movies'] = $this->model->getMovieList();
		$this->load->view('movies',$data);
	}

	public function registerdata()
	{
		$data['role'] = $this->input->post('role');
		$data['username'] = $this->input->post('uname');
		$data['name'] = $this->input->post('name');
		$data['email'] = $this->input->post('email');
		$data['theatre'] = $this->input->post('theatre');
		$password = $this->input->post('pwd');
		$data['password'] = md5($password);
		if($data['role']=="Owner")
		{
			$data['usertype'] = '1';
			// $data1['theatre_name']=$data['theatre'];
			// $data1['owner_name']=$data['name'];
			// $insert_id = $this->model->registerTheate($data1);
		}
		else
		{
			$data['usertype'] = '2';
		}
		$insert_id = $this->model->registerDetails($data);
		echo "Success";
	}

	public function logindata()
	{
		$username = $this->input->post('uname');
		$passw= md5($this->input->post('pwd'));
		$checker = $this->model->loginDetail($username,$passw);
		$status = $this->model->loginValues($username,$passw);
		$_SESSION['user_id'] = $status->id;
		if($checker=='1' && $status->usertype=='1')
		{
			echo "AdminSuccess";
		}
		else if($checker=='1' && $status->usertype=='2')
		{
			echo "CustomerSuccess";
		}
		else if($checker=='0')
		{
			echo "Unsuccess";
		}
	}

	public function dashboard()
	{
		if(empty($_SESSION['user_id']))
		{
			echo "Please Login User";exit;
		}
		$user_id = $_SESSION['user_id'];//need to add usertype inorder load dashboard only for admins
		$data['details'] = $this->model->getAllDetail($user_id);
		$data['movie_slots'] = $this->model->getAdminMovies($user_id);
		//echo "hi";print_r($data['details']);exit;
		$this->load->view('dashboard',$data);
	}

	public function reservation($id)
	{
		//echo $id;exit;
		$data['theat_slots'] = $this->model->getTheatreList($id);
		$data['film_detail'] = $this->model->getFilm($id);
		//$data['movie'] = $this->model->getMovie();
		$this->load->view('reserve',$data);
	}

	public function movieInsert()
	{
		$data['show_name'] = $this->input->post('sname');
		$data['show_descr'] = $this->input->post('sdet');
		$data['price'] = $this->input->post('price');
		$data['user_id'] = $_SESSION['user_id'];
		$data['show_img'] = 'images.jpeg';
		$insert_id = $this->model->insertMovie($data);
		echo "Success";
	}

	public function seatInsert()
	{
		$data['theatre_id'] = $this->input->post('theatre');
		$data['book_date'] = $this->input->post('bdate');
		$data['no_seats'] = $this->input->post('seat');
		$data['user_id'] = $_SESSION['user_id'];
		$data['show_id'] = $this->input->post('show_id');
		$insert_id = $this->model->insertSeat($data);
		echo "Success";
	}

	public function seats()
	{
		$data['seat_slots'] = $this->model->getAllseatList();
		$this->load->view('seats',$data);
	}

	public function removemovie()
	{
		$movie = $this->input->post('movie');
		$deletemov = $this->model->deletemovie($movie);
		echo "Success";
	}

	public function logout()
	{
		session_destroy();
	}
	
}
