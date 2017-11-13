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
    </li>   
	</ul>
</nav>