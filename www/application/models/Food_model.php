<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Food_model extends CI_Model {

    function getAll($type = "product") {
        if ($type  == "product") {
            $sql = "SELECT distinct p.*
                FROM product p
                left outer join ingredients i ON (p.id = i.prod_1)
                where i.prod_1 is not null
                order by p.name";
        }
        elseif ($type = "base") {
            $sql = "SELECT distinct p.*
                FROM product p
                left outer join ingredients i ON (p.id = i.prod_1)
                where i.prod_1 is null
                order by p.name";
        }

        return $this->db->query($sql)->result();
    }

    function search($search) {
        $sql = "SELECT distinct p.*
            FROM product p
            where p.name like '%" . $this->db->escape_like_str($search) . "%' ESCAPE '!'
            order by p.name";
        return $this->db->query($sql)->result();
    }

    function getById($id) {
        return $this->db->query('select * from product where id = ?', array($id))->row();
    }

    function getByName($name) {
        return $this->db->query('select * from product where name = ?', array($name))->row();        
    }

    function getIngredients($id) {
        $sql = "select p1.*, i.quantity_g
        from product p1
        left outer join ingredients i on (i.prod_2 = p1.id AND i.prod_1 = ?)
        where p1.id <> ?
        order by if(i.id is null, 1, 0), p1.name ";
        return $this->db->query($sql, array($id, $id))->result();
    }

    function updateIngredient($food_id, $ingr_id, $quantity) {
        $sql = "select * from ingredients where prod_1 = ? and prod_2 = ?";
        $ingrRow = $this->db->query($sql, array($food_id, $ingr_id))->row();
        if ($ingrRow && !empty($quantity)) {
            $sql = "update ingredients set quantity_g = ? where prod_1 = ? and prod_2 = ?";
            $this->db->query($sql, array($quantity, $food_id, $ingr_id));
        }
        else if (!empty($quantity)) {
            $sql = "insert into ingredients (prod_1, prod_2, quantity_g) values (?,?,?)";
            $this->db->query($sql, array($food_id, $ingr_id, $quantity));
        }
        else {
            $sql = "delete from ingredients where prod_1 = ? and prod_2 = ?";
            $this->db->query($sql, array($food_id, $ingr_id));
        }

        return $this->db->affected_rows();
    }

    function updateProduct($id, $data) {
        $sql = "update product set ";
        $darr = array();
        foreach ($data as $key => $value) {
            $darr[] = "$key = '$value'";
        }
        $sql .= implode(',', $darr) . " where id = ? ";

        return $this->db->query($sql, array($id));
    }

    function addProduct($data) {
        $cols = array();
        $vals = array();

        $sqldata = array_filter($data);

        $sql = $this->db->insert_string('product', $sqldata);

        return $this->db->query($sql);
    }
}

/* End of file ModelName.php */
