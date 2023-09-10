<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_Model extends CI_Model {

    function registerDetails($data)
    {
        $this->db->insert('user_details',$data);
        return $this->db->insert_id();
    }

    function registerTheate($data)
    {
        $this->db->insert('theatre_table',$data);
        return $this->db->insert_id();
    }

    function loginDetail($uname,$pwd)
    {
        $this->db->select('*');
        $this->db->where('username',$uname);
        $this->db->where('password',$pwd);
        $result = $this->db->get('user_details');//echo $this->db->last_query();exit;
        return $result->num_rows();
    }

    function loginValues($uname,$pwd)
    {
        $this->db->select('*');
        $this->db->where('username',$uname);
        $this->db->where('password',$pwd);
        $result = $this->db->get('user_details');
        return $result->row();
    }

    function getAllDetail($id)
    {
        $this->db->select('*');
        $this->db->where('id',$id);
        $result = $this->db->get('user_details');//echo $this->db->last_query();exit;
        return $result->row();
    }

    function getMovieList()
    {
        $this->db->select('*');
        $result = $this->db->get('show_table');
        return $result->result_array();
    }

    function insertMovie($data)
    {
        $this->db->insert('show_table',$data);
        return $this->db->insert_id();
    }

    function getAdminMovies($id)
    {
        $this->db->select('*');
        $this->db->where('user_id',$id);
        $result = $this->db->get('show_table');//echo $this->db->last_query();exit;
        return $result->result_array();
    }

    function getTheatreList($id)
    {
        $this->db->select('*');
        $this->db->where('show_id',$id);
        $this->db->join('theatre_table', 'theatre_table.theat_id = show_table.theatre_id');
        $result = $this->db->get('show_table');//echo $this->db->last_query();exit;
        return $result->result_array();
    }

    function getFilm($id)
    {
        $this->db->select('*');
        $this->db->where('show_id',$id);
        $result = $this->db->get('show_table');//echo $this->db->last_query();exit;
        return $result->row();
    }

    function insertSeat($data)
    {
        $this->db->insert('seat_book_table',$data);
        return $this->db->insert_id();
    }

    function deletemovie($movie)
    {
        $this->db->where('show_name', $movie);
        $this->db->delete('show_table');
    }

    function getAllseatList()
    {
        $this->db->select('*');
        //$this->db->where('show_id',$id);
        $result = $this->db->get('seat_table');//echo $this->db->last_query();exit;
        return $result->result_array();
    }

    function getMovieHomeList()
    {
        $this->db->select('*');
        $this->db->limit(4);
        $this->db->order_by('show_id','DESC');
        $result = $this->db->get('show_table');
        return $result->result_array();
    }

}


?>