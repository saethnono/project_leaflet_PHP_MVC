<div class="jumbotron">
    <?php
    $hashed = '$2y$10$SOOq544UDZMzZmrrh8nK3usWUaenF5bNWJ71UVJzrwjD0FBcJuwD6';
    if (password_verify('5437hnono', $hashed)) {
        echo 'password valid';
    } else {
        echo 'tidak valid';
    }
    ?>
</div>