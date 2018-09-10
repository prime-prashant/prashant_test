<?php
class Mdl_loginprocess extends CI_Model{

    function __construct()
    {
        parent::__construct();
        $this->load->database();
       
    }


    public function index($data)
    {

        if ($this->db->insert("stud", $data)) {
            return true;
         }
        else{
            
        }
    }
    public function delete($roll_no) {
        if ($this->db->delete("stud", "roll_no = ".$roll_no)) {
            return true;
        }
    }
    public function edit($data,$old_roll_no)
    {
        $this->db->set($data);
        $this->db->where("roll_no", $old_roll_no);
        $this->db->update("stud", $data);

    }


}

?>
