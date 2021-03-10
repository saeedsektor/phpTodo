<?php
class Pages extends Controller {

    public function __construct() {
        $this->taskModel = $this->model('Task');
    }

    public function index() {
            $tasks = $this->taskModel->getAllTasks();
            $tasksdone = $this->taskModel->getAllDoneTasks();


            $data = [
                'tasks' => $tasks,  
                'tasksdone' => $tasksdone              
            ];

            # check the request method
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

                # get the form data
                $data = [
                    'user_id' => $_SESSION['user_id'],
                    'body' => trim($_POST['body']),
                ];

                if ($this->taskModel->store($data)) {
                    # Redirect to the index
                    header('location: ' . URLROOT . '/index');
                } else {
                    die('Something went wrong.');
                }
            }

            if(isset($_GET['task_id'])){
                # get the form data
                $data = [
                    'task_id' => $_GET['task_id'],
                ];
    
                if ($this->taskModel->makeitDone($data)) {
                    # Redirect to the index
                    header('location: ' . URLROOT . '/index');
                } else {
                    die('Something went wrong.');
                }
            }
            
        $this->view('index', $data);
    }

    public function done() {
        
        if(isset($_GET['task_id'])){
            # get the form data
            $data = [
                'task_id' => $_GET['task_id'],
            ];

            if ($this->taskModel->makeitDone($data)) {
                # Redirect to the index
                header('location: ' . URLROOT . '/index');
            } else {
                die('Something went wrong.');
            }
        }
        
    }

}
