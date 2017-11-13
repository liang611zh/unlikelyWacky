<div class="panel panel-default">
	<div class="panel-heading">{pagetitle}</div>
	<div class="panel-body">
    {add}
		<table class="table table-striped table-hover">

		<!-- table heading -->
      <tr class="info">
        <th>Plane ID</th>
        <th>Manufacturer</th>
        <th>Model</th>
        <th>Action<th>
      </tr>

      	<!-- table content, displaying info of planes -->
      {planes}
      <tr>
        <td><a href="/fleet/edit/{id}"><u>{id}</u></a></td>
        <td>{manufacturer}</td>
        <td>{model}</td>
        <td><a href="fleet/delete/{id}"><button class="btn btn-danger">Delete</button></a><a href="fleet/edit/{id}"><button class="btn btn-info">Edit</button></a></td>
      </tr>
      {/planes}

    </table>
	</div>
</div>
