<div class="panel panel-default">
	<div class="panel-heading">{pagetitle}</div>
	<div class="panel-body">
        <form role="form" action="/fleet/show/submit" method="post">
            {id}<br>
            {recognizedPlane}<br>
            
            {fmanufacturer}<br>
            {fmodel}<br>
            {fprice}<br>
            {fseats}<br>
            {freach}<br>
            {fcruise}<br>
            {ftakeoff}<br>
            {fhourly}<br>
            {zsubmit}<br>
        </form>
        {error}

        <a href="/fleet/cancel"><input type="button" value="Cancel"/></a>
	</div>
</div>
