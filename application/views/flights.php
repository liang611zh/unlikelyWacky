<div class="panel panel-default">
	<div class="panel-heading">Flights</div>
	<div class="panel-body">
		<table class="table table-striped table-hover">
      <tr class="info">
        <th>Plane ID</th>
        <th>Departure Airport</th>
        <th>Arrival Airport</th>
        <th>Departure Time</th>
        <th>Arrival Time</th>
      </tr>
      {flights}
      <tr>
        <td>{planeId}</td>
        <td>{departureAirport}</td>
        <td>{departureTime}</td>
        <td>{arrivalAirport}</td>
        <td>{arrivalTime}</td>
      </tr>
      {/flights}
    </table>
	</div>
</div>