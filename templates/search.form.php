<div class="content-box-header">Search</div>
<div class="content-box">
	<form class="fields" method="post" action="<? echo $this->config['pages']['process']; ?>">
		<input type="hidden" name="nonce" value="<? echo $this->nonce('process'); ?>" />
		<ul>
			<li>
				<label>First Name: </label>
				<input class="textfield" type="text" name="search_fname" value="" />
			</li>
			<li>
				<label>Last Name: </label>
				<input class="textfield" type="text" name="search_lname" value="" />
			</li>
			<li>
				<label>Phone: </label>
				<input class="textfield" type="text" name="search_phone" value="" />
			</li>
			<li>
				<label>Email: </label>
				<input class="textfield" type="text" name="search_email" value="" />
			</li>
			<li><input class="btn" type="submit" value="Search" /></li>
		</ul>
	</form>
</div>
