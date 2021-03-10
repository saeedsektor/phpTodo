<?php
   require APPROOT . '/views/includes/head.php';
?>
<?php
   require APPROOT . '/views/includes/nav.php';
?>

<div class="container-user">
    <h2>Login</h2>

    <form
        id="register-form"
        method="POST"
        action="<?php echo URLROOT; ?>/users/login"
        >
        <input type="text" placeholder="Username *" name="username">
        <span class="invalidFeedback">
            <?php echo $data['usernameError']; ?>
        </span>

        <input type="password" placeholder="Password *" name="password">
        <span class="invalidFeedback">
            <?php echo $data['passwordError']; ?>
        </span>

        <button class="btn-register" id="submit" type="submit" value="submit">
            Login
        </button>

    </form>
    <h4>if you have not registered, do it <a href="<?php echo URLROOT; ?>/users/register">HERE</a></h4>
</div>