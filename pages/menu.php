<ul class="nav">
	<li id="hotels-anchor">
		Look for Hotel
	</li>
	<li id="comments-anchor">
		Read the comments
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