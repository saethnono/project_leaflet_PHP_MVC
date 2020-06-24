
    <h1 class="center">Potensi Daerah Kabupaten Musi Banyuasin</h1>
        <?php foreach ($data['potensi'] as $pot) : ?>
            <h2><?php echo $pot['nama']; ?></h2>
          <?php echo '<p class="infopotensi">'. $pot['deskripsi'].'</p>'; ?><a href="<?php echo URL . 'informasi/potensidaerah/' . htmlspecialchars($pot['id'], ENT_QUOTES, 'UTF-8'); ?>">Read more...</a>
            <hr><br>
        <?php endforeach; ?>
