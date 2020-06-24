<?php //error_reporting (E_ALL ^ E_NOTICE); ?>
<div>
	<label>Pilih Kecamatan</label>
	<select id="idkec" onchange="showPotensi(this.value)">
    <option selected="" disabled="" value="0">--- Pilih ---</option>
		<?php
foreach ($data['tabel'] as $table) {
    echo '<option value = "' . $table['id'] . '">' . $table['kecamatan'] . '</option>';
}
?>
	</select>
</div><br>

<div class="clear"></div>
<div id='hasil'>Tabel potensi daerah berdasarkan Kecamatan</div>
<div id="data-kecamatan"></div>
<div id="txtHint" class="container"><b>List potensi daerah akan muncul disini...</b></div>

<script>
    function showPotensi(str) {
        if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
        } else {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "http://localhost/rubah/public/tabelinformasi/tabelinfo.php?q=" + str, true);
            xmlhttp.send();
        }
    }
    </script>
