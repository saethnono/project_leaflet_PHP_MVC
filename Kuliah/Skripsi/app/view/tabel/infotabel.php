<?php
echo "<table>
<tr>
<th>No.</th>
<th>Sektor</th>
<th>Potensi</th>
<th>Jenis</th>
<th>Kecamatan</th>
<th>X</th>
<th>Y</th>
</tr>";
$no = 1;
foreach ($data['kecid'] as $row) {
    echo "<tr>";
    echo "<td>" . $no . "</td>";
    echo "<td>" . $row['sektor'] . "</td>";
    echo "<td>" . $row['potensi'] . "</td>";
    echo "<td>" . $row['jenis'] . "</td>";
    echo "<td>" . $row['kecamatan'] . "</td>";
    echo "<td>" . $row['x'] . "</td>";
    echo "<td>" . $row['y'] . "</td>";
    echo "</tr>";
    $no++;
}
echo "</table>";