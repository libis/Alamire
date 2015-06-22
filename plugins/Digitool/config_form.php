<div class="field">
	<label>CGI</label>
	<div class="inputs">
		<input type="text" name="cgi" size="60" value="<?php echo(get_option('digitool_cgi'));?>">	
	</div>
	<p class="explanation">Fill in the CGI link (used to find the images)</p>
</div>
<div class="field">
	<label>Proxy</label>
	<div class="inputs">
		<input type="text" name="proxy" size="60" value="<?php echo(get_option('digitool_proxy'));?>">	
	</div>
	<p class="explanation">Just enter the url of the proxy server (giving the portnumber doesn't hurt either) e.g. testproxy.cc.example.be:8080</p>
</div>

<div class="field">
	<label>Resolver url</label>
	<div class="inputs">
		<input type="text" name="resolver" size="60" value="<?php echo(get_option('digitool_resolver'));?>">	
	</div>
</div>
