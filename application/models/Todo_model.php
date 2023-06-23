<?php
class Todo_model extends CI_Model {
    public function create_todo_list($data) {
        $this->db->insert('todo_lists', $data);
        return $this->db->insert_id();
    }

    public function get_todo_lists($user_id) {
        return $this->db->get_where('todo_lists', array('user_id' => $user_id))->result();
    }

    public function get_todo_list($user_id, $todo_list_id) {
        return $this->db->get_where('todo_lists', array('user_id' => $user_id, 'id' => $todo_list_id))->row();
    }

    public function update_todo_list($todo_list_id, $data) {
        $this->db->where('id', $todo_list_id);
        $this->db->update('todo_lists', $data);
    }

    public function delete_todo_list($todo_list_id) {
        $this->db->where('id', $todo_list_id);
        $this->db->delete('todo_lists');
    }

      var $table = "todo_lists";  
      var $select_column = array("id", "user_id", "title", "description","completed", "created_at");  
      var $order_column = array(null, "title", "description","completed", "created_at", null);  
      function make_query()  
      {  
           $this->db->select($this->select_column);  
           $this->db->from($this->table); 
           $this->db->where("user_id", $this->session->userdata('user_id'));
           if(isset($_POST["search"]["value"]))  
           {  
                $this->db->like("title", $_POST["search"]["value"]);  
                $this->db->or_like("description", $_POST["search"]["value"]); 
                $this->db->or_like("completed", $_POST["search"]["value"]); 
                $this->db->or_like("created_at", $_POST["search"]["value"]);  
           }  
           if(isset($_POST["order"]))  
           {  
                $this->db->order_by($this->order_column[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);  
           }  
           else  
           {   
                $this->db->order_by('id', 'DESC');  
           }  
      } 

      function make_datatables(){  
           $this->make_query();  
           if(isset($_POST["length"]) && $_POST["length"] != -1)  
           {  
               
                $this->db->limit($_POST['length'], $_POST['start']);  
           }
           
           $query = $this->db->get();  
           return $query->result();  
      }  
      function get_filtered_data($user_id){  
           $this->make_query();
           $query = $this->db->get();  
           return $query->num_rows();  
      }       
      function get_all_data($user_id)  
      {  
           $this->db->select("*");  
           $this->db->from($this->table); 
           $this->db->where("user_id", $user_id);
           return $this->db->count_all_results();  
      }  
}
?>
