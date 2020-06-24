<div>
  <?php
  $total_website_views = $data['hal']; // Returns total website views
  foreach ($total_website_views as $tlv) {
    echo "<strong>Total Website Views:</strong> " . $tlv['total_views'];
  }
  ?>
</div>