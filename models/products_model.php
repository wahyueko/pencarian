<?php
class Products_model extends CI_Model {

    var $ProductName  = '';
    var $ProductID = '';
    

    function __construct()
    {        
        parent::__construct();
    }
    
    function get_products()
    {
        $query = $this->db->get('products');
        return $query->result();
    }

    function get_products_by_id($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->get('products');
        return $query->row();
    }

// fungsi pencarian data berdasarkan CategoryID & ProductName
		public function caridata($a, $b){		
		$this->db->like('CategoryID', $a);
		$this->db->like('ProductName', $b);
		
		$query = $this->db->get ('products');
		return $query->result(); 
	}
 //
	


	
    function insert_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->SupplierID   = $this->input->post('SupplierID',true);         
        return $this->db->insert('products', $this);
    }

    function update_entry()
    {
        $this->ProductName  = $this->input->post('ProductName',true); 
        $this->SupplierID   = $this->input->post('SupplierID',true);         
        return $this->db->update('products', $this, array('ProductID' => $this->input->post('id',true)));
    }

    function hapus($id)
    {
        $this->db->where('ProductID',$id);
        return $this->db->delete('products');
    }

    function cek_dependensi($id)
    {
        $this->db->where('ProductID',$id);
        $query = $this->db->count_all('products');
        return ($query==0) ? true : false;
    }
}