<h1 class="center">Detail Potensi Daerah</h1>
        <?php foreach ($data['potinfo'] as $ind): ?>
          <?php 
          echo $ind['nama_potensi'].'<br>';
          echo '<li style="float:none; list-style-type : lower-alpha;">'. $ind['sektor'].'</li>';
         echo $ind['deskripsi']; ?>
        <?php endforeach; ?>