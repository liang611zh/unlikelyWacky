<div class="panel panel-default">
  <div class="panel-heading">{pagetitle}</div>
  <div class="panel-body">
    {pagination}
    <table class="table table-striped table-hover table-responsive">
      <tr class="info">
        <th>Plane ID</th>
        <th>Departure Airport</th>
        <th>Departure Time</th>
        <th>Arrival Airport</th>
        <th>Arrival Time</th>
        <th>Action<th>
      </tr>
      {flights}
      <tr title="Departure from {departureAirport} to {arrivalAirport}, arrival time is {arrivalTime}">
        <td>{planeId}</td>
        <td>{departureAirport}</td>
        <td>{departureTime}</td>
        <td>{arrivalAirport}</td>
        <td>{arrivalTime}</td>
        <td><a href="flights/delete/{id}"><button class="btn btn-danger">Delete</button></a><a href="flights/edit/{id}"><button class="btn btn-info">Edit</button></a></td>
      </tr>
      {/flights}
    </table>
  </div>
</div>