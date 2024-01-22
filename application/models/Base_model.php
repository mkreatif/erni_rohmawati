<?php
class Base_model extends CI_Model
{

    protected $table; // Set the table name in your child models

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_all()
    {
        return $this->db->get($this->table)->result();
    }

    public function get_by_id($id)
    {
        return $this->db->get_where($this->table, array('id' => $id))->row();
    }

    // Condition are array with keys
    public function get_by_conditions($conditions)
    {
        $this->db->where($conditions);
        return $this->db->get($this->table)->result();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    public function delete($id)
    {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    /**
     * Delete records from the database based on a condition.
     *
     * @param array $condition An associative array representing the condition for deletion.
     * Example: array('column_name' => 'value')
     *
     * @return bool Returns TRUE on success or FALSE on failure.
     */
    public function delete_by_condition($condition)
    {
        // Ensure that the condition is provided
        if (empty($condition)) {
            return false;
        }

        // Example: $condition = array('column_name' => 'value');
        $this->db->where($condition);
        $this->db->delete($this->table);

        // Check if the delete operation was successful
        return $this->db->affected_rows() > 0;
    }
}
