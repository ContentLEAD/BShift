<?php

?>
<h1>General Settings Page</h1>
<form action="" method="post">
	<h4>Title</h4><input type="text" name="slider_title"></br>
	<h4>Delay</h4><input type="text" name="delay"></br>
	<h4>State</h4>
	<select name="state">
		<option value="draft">Draft</option>
		<option value="published">Published</option>
		<option value="pending">Pending</option>
	</select></br>
	<h4>Height</h4><input type="text" name="height">
	<select name="height_metric">
		<option value="pixels">Pixels</option>
		<option value="percent">Percent</option>
	</select></br>
	<h4>Width</h4><input type="text" name="width">
	<select name="width_metric">
		<option value="pixels">Pixels</option>
		<option value="percent">Percent</option>
	</select></br>
	<h4>Background Color</h4><input type="text" name="bgcolor"></br>
	<h4>Effect</h4>
	<select name="effect">
		<option value="fade">Fade</option>
		<option value="slide_vertical">Slide Vertical</option>
		<option value="slide_left">Slide Left</option>
		<option value="slide_right">Slide Right</option>
		<option value="toggle">Standard Toggle</option>
	</select></br>
	<input type="hidden" name="add_new_slider" value="1"></br>
	<input type="submit" name="" value="Create"></br>
</form>

