<?php
   require APPROOT . '/views/includes/head.php';
?>
<?php
   require APPROOT . '/views/includes/nav.php';
?>

<div class="container-user">
    <h2>Register</h2>

    <form
        id="register-form"
        method="POST"
        action="<?php echo URLROOT; ?>/users/register"
        >
        <input type="text" placeholder="Username *" name="username">
        <span class="invalidFeedback">
            <?php echo $data['usernameError']; ?>
        </span>

        <input type="email" placeholder="Email *" name="email">
        <span class="invalidFeedback">
            <?php echo $data['emailError']; ?>
        </span>

        <input type="password" placeholder="Password *" name="password">
        <span class="invalidFeedback">
            <?php echo $data['passwordError']; ?>
        </span>

        <input type="password" placeholder="Confirm Password *" name="confirmPassword">
        <span class="invalidFeedback">
            <?php echo $data['confirmPasswordError']; ?>
        </span>

        <button class="btn-register" id="submit" type="submit" value="submit">
            Register
        </button>

    </form>
</div>