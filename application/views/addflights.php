<div class="panel panel-default">
  <div class="panel-heading">{pagetitle}</div>
  <div class="panel-body">
    <form role="form" action="/flights/submit" method="post">
            {id}<br>
            {fdepartureAirport}<br>
            {fdepartureTime}<br>
            {farrivalAirport}<br>
            {farrivalTime}<br>
            {fsubmit}<br>

    </form>
     <a href="cancel"><button class="btn btn-danger btn-lg btn-block">Cancel</button></a>
  </div>
</div>
