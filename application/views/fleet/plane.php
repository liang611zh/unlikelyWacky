<div class="panel panel-default">
	<div class="panel-heading">Plane: {pagetitle}</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">

      <?php foreach($plane as $key => $val): ?>
        <tr>
          <th><?=$key?></th>
          <td><?=$val?></td>
        </tr>
      <?php endforeach; ?>

    </table>
	</div>
</div>
