<div class="panel panel-default">
	<div class="panel-heading">{pagetitle}</div>
	<div class="panel-body">
        <form role="form" action="/fleet/show/submit" method="post">
            {id}<br>
            {recognizedPlane}<br>
            
<!--             {fmanufacturer}<br>
            {fmodel}<br>
            {fprice}<br>
            {fseats}<br>
            {freach}<br>
            {fcruise}<br>
            {ftakeoff}<br>
            {fhourly}<br> -->
            {zsubmit}<br>
        </form>
        <br><br>
        <h3>Details</h3>

        <div id="infotable">
        {infoPlaneTable}
        </div>     
           
        {error}

        <a href="/fleet/show/cancel"><input type="button" value="Cancel"/></a>
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script>
        $(document).ready(function () {
            $("#wackyselect").change(function () {
                var end = this.value;
                var id = $('#wackyselect').val();
                console.log(id);
                jQuery.ajax({
                type:'GET',
                dataType: "html",
                url:'<?php echo base_url("ajaxcall/fleetAjax/wackyPlane/"); ?>' + id,

                success:function(data){
                    $('#infotable').html(data);
                }
            });
             });
        });
    </script>
