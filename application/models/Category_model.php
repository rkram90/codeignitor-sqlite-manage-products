<?php
class Category_model extends CI_Model {

    public $title;
    public $content;
    public $date;
    public $table = 'Category';

    public function __construct()
    {
        parent::__construct();
    }


    public function get_entries()
    {
        $this->db->order_by('id','desc');
        $query = $this->db->get($this->table);
        return $query->result();
    }

    public function insert_entry($array)
    {

       return $this->db->insert($this->table, $array);
    }

    public function update_entry($Id,$Data)
    {
        $this->db->trans_start();
        $this->db->where('id', $Id);
        $this->db->update($this->table, $Data);
        $this->db->trans_complete();
        return  $this->db->affected_rows() == 1 || $this->db->trans_status();
    }

    public function GetCriteria($condition='')
    {
        if(!empty($condition))
        {
            $this->db->where($condition); 
        }   
        $query=$this->db->get($this->table);

        return $query->result_array();
    }
    public function delete($id){
        $this->db->where('id', $id);
        return $this->db->delete($this->table);
    }
   

}