<?php
	echo '
	<div class="content-box-header">Search Contacts</div>
	<div class="content-box">
		<form class="fields" method="post" action="' . $this->config['pages']['search'] . '">
			<input type="hidden" name="nonce" value="' . $this->nonce('search') . '" />
			<ul>
				<li>
					<label>Search by first, middle or last name: </label>
					<input class="textfield" type="text" name="search_value" value="" />
				</li>
				<li><input class="btn" type="submit" value="Search" /></li>
			</ul>
		</form>
		<br />
		<!--
		<a href="search.php?q=search">Advanced Search</a>
		-->
	</div>
	';
?>
