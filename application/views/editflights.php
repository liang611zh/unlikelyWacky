<div class="panel panel-default">
  <div class="panel-heading">{pagetitle}</div>
  <div class="panel-body">
    <form role="form" action="/flights/editsubmit" method="post">
            {id}<br>
            {fdepartureAirport}<br>
            {fdepartureTime}<br>
            {farrivalAirport}<br>
            {farrivalTime}<br>
            {fsubmit}<br>
    </form>
     <a href="../canceledit"><input type="buton" class="btn btn-danger btn-lg btn-block" value="Cancel"></a>
  </div>
</div>
