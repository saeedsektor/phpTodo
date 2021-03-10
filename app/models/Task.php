<?php

class Task {
    private $db;
    
    public function __construct() {
        $this->db = new Database;
    }

    public function getAllTasks() {
        if(isLoggedIn()){
            $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id AND status = 0 ORDER BY id DESC');
            $this->db->bind(':user_id', $_SESSION['user_id']);
            
            $result = $this->db->resultSet();
            return $result;
        }

    }

    public function getAllDoneTasks() {
        if(isLoggedIn()){
            $this->db->query('SELECT * FROM tasks WHERE user_id = :user_id AND status = 1 ORDER BY id DESC');
            $this->db->bind(':user_id', $_SESSION['user_id']);

            
            $result = $this->db->resultSet();
            return $result;
        }
    }

    public function store($data){
        $this->db->query('INSERT INTO tasks (user_id, body) VALUES(:user_id, :body)');

        $this->db->bind(':user_id', $data['user_id']);
        $this->db->bind(':body', $data['body']);

        # execute the query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function makeitDone($data){
        $task_id = $data['task_id'];
        $this->db->query('UPDATE tasks SET status = 1 WHERE id = :task_id');
        $this->db->bind(':task_id', $task_id);
        # execute the query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }
}