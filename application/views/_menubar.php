<?php
/*
 * Menu navbar, just an unordered list
 */
?>
<nav id="sidebar" class="active">
	<!-- Sidebar Header -->
	<div class="sidebar-header">
		<h2>Unlikely Wacky</h2>
		<strong>UW</strong>
	</div>
	<!-- Sidebar Links -->
	<ul class="list-unstyled components">
		{menudata}
		<li>
			<a href="{link}">
				<i class="fa {icon} fa-fw" aria-hidden="true"></i>
				{name}
			</a>
		</li>
		{/menudata}
		<li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
      <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
                  <li><a href="/roles/actor/Guest">Guest</a></li>
                  <li><a href="/roles/actor/Owner">Owner</a></li>
      </ul>
    </li>   
	</ul>
</nav>