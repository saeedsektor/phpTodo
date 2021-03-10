<nav class="top-nav">
    <a href="<?php echo URLROOT; ?>/index">
        <img src="<?php echo URLROOT; ?>/public/img/logo.png" />
    </a>
    <ul>
        <li>
            <a href="<?php echo URLROOT; ?>/index">Home</a>
        </li>

        <li class="btn-login">
            <?php if(isset($_SESSION['user_id'])) : ?>
                <a href="<?php echo URLROOT; ?>/users/logout">Log out</a>
            <?php else : ?>
                <a href="<?php echo URLROOT; ?>/users/login">Login</a>
            <?php endif; ?>
        </li>
    </ul>
</nav>