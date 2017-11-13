<div class="row">
	<div class="col-md-12 mt-3">
		<div class="card">
			<div class="card-header text-center bg-dark text-white lead">
				{bookingtitle}
			</div>
			<div class="card-header text-center bg-info text-light lead">
				<form method="POST" action="/">
					<div class="row">
						<div class="col-lg-5 pt-3">
							<div class="input-group">
								<span class="input-group-addon" id="departureaddon">
									Departure Airport
								</span>
								<select required class="form-control" name="departure" id="departuredropdown" aria-label="Departure" aria-describedby="departureaddon">
									<option hidden disabled selected value>Select An Airport</option>
									{departureairport}
										<option value='{uniqueAirports}'>{uniqueAirports}</option>
									{/departureairport}
								</select>
							</div>
						</div>
						<div class="col-lg-5 pt-3">
							<div class="input-group">
								<span class="input-group-addon" id="destinationaddon">
									Destination Airport
								</span>
								<select required class="form-control" name="destination" id="destinationdropdown" aria-label="Destination" aria-describedby="destinationaddon">
									<option hidden disabled selected value>Select An Airport</option>
									{destinationairport}
										<option value='{uniqueAirports}'>{uniqueAirports}</option>
									{/destinationairport}
								</select>
							</div>
						</div>
						<div class="col-lg-2 pt-3">
							<div class="form-group">
								<input type="submit" class="btn btn-primary btn-block" value="Search">
							</div>
						</div>
					</div>
					{error}
						<div class="row pt-3">
							<div class="col" style="color: red;">
								{message}
							</div>
						</div>
					{/error}
				</form>
			</div>
			<div class="card-header text-center bg-dark text-white lead">
				{searchfields}
				<h1>
					{departure}<i class="fa fa-long-arrow-right fa-fw" aria-hidden="true"></i>{destination}
				</h1>
				{/searchfields}
			</div>		
			{searchbooking}
			<div class="card-body bg-dark">
				<table class="table table-responsive">
					<thead>
						<tr class="bg-info text-light">
							<th>Plane</th>
							<th>Departure Airport</th>
							<th>Departure Time</th>
							<th>Arrival Airport</th>
							<th>Arrival Time</th>
						</tr>
					</thead>
					<tbody>
					{leg}
						<tr class="bg-light">
							<td>{planeId}</td>
							<td>{departureAirport}</td>
							<td>{departureTime}</td>
							<td>{arrivalAirport}</td>
							<td>{arrivalTime}</td>
						</tr>
					{/leg}
					</tbody>
				</table>
			</div>
			{/searchbooking}
		</div>
		<br/>
	</div>
</div>