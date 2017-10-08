<div class="row">
	<div class="col">
		<div class="jumbotron jumbotron-fluid">
		<h2 class="display-3 text-center">Unlikely Wacky</h2>
		<hr class="hr-4">
		<h5 class="text-muted text-center"> - It is unlikely we will get you there - <h5>
		</div>
	</div>
</div>
<div class="row">
		<div class="col-md-4">
			<div class="card">
				<div class="card-header text-center bg-info text-light lead">
					<i class="fa fa-plane fa-fw" aria-hidden="true"></i>
						Flights
					<i class="fa fa-plane fa-fw" aria-hidden="true"></i>
				</div>
				<div class="card-body">
					<h1><small class="text-muted">Number of Flights: </small><small class="display-3">{number_flights}</small></h1>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header text-center bg-primary text-light lead">
					<i class="fa fa-plane fa-suitcase" aria-hidden="true"></i>
					Airports We Service
					<i class="fa fa-plane fa-suitcase" aria-hidden="true"></i>
				</div>
				<div class="card-body">
				<table>
				{airport}
				<tr title="Departure from {departureAirport} to {arrivalAirport}, arrival time is {arrivalTime}">
					<td class="lead">{uniqueAirports}</td>
				</tr>
				{/airport}
				</table>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-header text-center bg-info text-light lead">
					<i class="fa fa-plane fa-fw" aria-hidden="true"></i>
					Our Fleet
					<i class="fa fa-plane fa-fw" aria-hidden="true"></i>
				</div>
				<div class="card-body">
					<h1><small class="text-muted">Number of Airplanes: </small><small class="display-3">{number_fleet}</small></h1>
				</div>
			</div>
		</div>
</div>