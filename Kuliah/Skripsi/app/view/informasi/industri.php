<h1 class="center">Potensi Industri</h1>
        <?php foreach ($data['industri'] as $ind) : ?>
            <li><?php echo $ind->nama; ?></li>
        <?php endforeach; ?>