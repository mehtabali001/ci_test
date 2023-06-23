<?php
class User_model extends CI_Model {
    public function create_user($data) {
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    function select_single_field($select,$table,$where)
	{
		$this->db->select( $select );
		$this->db->from( $table );
		$this->db->where( $where );
		$qry = $this->db->get();
		$rr	=	$qry->row_array();
		if(!empty($rr))
		return	$rr[$select];
	    //return FALSE;
    }

    public function get_user_by_username($username) {
        return $this->db->get_where('users', array('username' => $username))->row();
    }

    public function register($data) {
        // Insert user data into the database
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }

    public function login($username, $password) {
        // Retrieve user data based on username
        $this->db->where('username', $username);
        $query = $this->db->get('users');

        $user = $query->row();

        if ($user) {
            // Verify password
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }

        return false;
    }

    public function get_user($user_id) {
        // Retrieve user data based on user ID
        $this->db->where('id', $user_id);
        $query = $this->db->get('users');
        return $query->row();
    }
}
?>
