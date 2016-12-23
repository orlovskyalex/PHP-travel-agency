<ul class="nav">
	<li id="hotels-anchor">
		Hotels
	</li>
	<li id="comments-anchor">
		Comments
	</li>
<?php
if ($_COOKIE['isadmin'] == '1')
{
?>
	<li>
		<a href="/admin.php">Admin</a>
	</li>
<?php
}
?>
</ul>