<div class="panel panel-default">
	<div class="panel-heading">{pagetitle}</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">

		<!-- table heading -->
      <tr class="info">
        <th>Plane ID</th>
        <th>Manufacturer</th>
        <th>Model</th>
      </tr>

      	<!-- table content, displaying info of planes -->
      {planes}
      <tr>
        <td><a href="/fleet/{id}"><u>{id}</u></a></td>
        <td>{manufacturer}</td>
        <td>{model}</td>
      </tr>
      {/planes}

    </table>
	</div>
</div>
