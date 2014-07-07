<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=$titulo.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<table border="1">
  <tr>
  <?php foreach($header as $th){
          echo "<th>$th</th>";
        }
  echo '</tr>';
  echo $contenido;
  ?>
</table>
