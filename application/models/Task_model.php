<?php
class Task_model extends CI_Model {
    public function create_task($data) {
        $this->db->insert('tasks', $data);
        return $this->db->insert_id();
    }

    public function get_tasks_by_todo_list($todo_list_id) {
        return $this->db->get_where('tasks', array('todo_list_id' => $todo_list_id))->result();
    }

    public function update_task($task_id, $task_data) {
        $this->db->where('id', $task_id);
        $this->db->update('tasks', $task_data);
    }

    public function delete_tasks_by_todo_list($todo_list_id) {
        $this->db->where('todo_list_id', $todo_list_id);
        $this->db->delete('tasks');
    }
}
?>
