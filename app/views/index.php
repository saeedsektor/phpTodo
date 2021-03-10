<?php
   require APPROOT . '/views/includes/head.php';
?>
<?php
   require APPROOT . '/views/includes/nav.php';
?>


<?php if(isset($_SESSION['user_id'])) : ?>
    <script>
        function validateForm() {
            var body = document.forms["taskForm"]["body"].value;
            var er = document.getElementById("error");
            if (body == "") {
                // alert("body of the task must be filled out");
                er.innerHTML = "body of the task must be filled out";
                return false;
            }
        } 
    </script>
    <div class="container">
        <h3>Hi <?php echo $_SESSION['username']; ?>,</h3>
        <h4>Write your tasks below</h4>
        <form name="taskForm" class="form" onsubmit="return validateForm()"  action="<?php echo URLROOT; ?>/index" method="POST">
            <input type="text" name="body" placeholder="What's up ?" />
            <button class="btn" name="submit" type="submit">+ add</button>
        </form>
        <h5 class="error" id="error"></h5>
    </div>
    <div class="container">
        <div class="task-list">
            <div class="items">
            <h3>New Tasks</h3>
            <?php foreach($data['tasks'] as $task): ?>
                <article>
                    <p><?php echo $task->body ?></p>
                    <form name="taskForm" class="form" action="<?php echo URLROOT; ?>/index" method="GET">
                        <input type="hidden" name="task_id" value="<?php echo $task->id ?>"/>
                        <div>
                            <button class="btn-green" name="submit" type="submit">✔ </button>
                        </div>
                    </form>
                </article>
                <hr/>
                <br>
            <?php endforeach; ?>
            </div>
            <div class="items">
            <h3>Done Tasks</h3>
            <?php foreach($data['tasksdone'] as $task): ?>
                <article>
                    <p><?php echo $task->body ?></p>
                </article>
                <hr/>
                <br>
            <?php endforeach; ?>
            </div>
        </div>
    </div>

<?php else : ?>

    <div class="container">
        <h3>Please <a href="<?php echo URLROOT; ?>/users/register">Register</a> or <a href="<?php echo URLROOT; ?>/users/login">login</a>  to use the site</h3>
    </div>

<?php endif; ?>

