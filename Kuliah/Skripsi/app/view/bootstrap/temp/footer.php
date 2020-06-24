<div id="footer">
    <?php
    $handle = fopen("http://localhost/rubah/public/counter.txt", "r");
    if (!$handle) {
        echo "could not open the file";
    } else {
        $counter = (int)fread($handle, 20);
        fclose($handle);
        $counter++;
        echo "<strong>Visitor no. $counter</strong>";
        $handle = fopen("counter.txt", "w");
        fwrite($handle, $counter);
        fclose($handle);
    }
    ?>
    | Copyright &copy; <script>document.write(new Date().getFullYear());</script> by <span>saethnono</span>  | <a href="http://www.facebook.com/saethq94">Facebook</a>
</div>

</div>
</body>
<script src="<?php echo URL; ?>boot/js/jquery.min.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/leaflet/leaflet.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/l.ajax/leaflet.ajax.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/l.ajax/leaflet.spin.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/l.ajax/spin.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/cari/src/leaflet-search.js"></script>
<script src="<?php echo URL; ?>boot/js/popper.min.js"></script>
<script src="<?php echo URL; ?>boot/js/bootstrap.js"></script>

<!-- <script src="<?php //echo URL; ?>assetstemp/js/proses.js"></script>-->
<script src="<?php echo URL; ?>assetstemp/js/ikan.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/kebun.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/tambang.js"></script> 

<script src="<?php echo URL; ?>assetstemp/js/fungsi.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/industri.js"></script>
<script src="<?php echo URL; ?>assetstemp/js/javafoun/mapdata.js"></script>
<!-- <script src="<?php echo URL; ?>assetstemp/js/tabel.js"></script> -->

</html>