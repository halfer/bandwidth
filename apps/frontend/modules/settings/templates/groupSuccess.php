<?php include_partial('menu') ?>

<?php /* @var $downloadGroup DownloadGroup */ ?>

<h1>Group '<?php echo htmlspecialchars($downloadGroup->getName()) ?>'</h1>

<p><em>If we have a many-to-many thing we could have a field that says reset every X seconds, which
would achieve the daily/weekly/monthly thing? Ah no - since a month is not a static number of seconds!
OK, how about (reset_offset, reset_every_seconds, reset_every_months) columns? That would work. So, would
all the settings we intend to support work with this arrangement?</em></p>

<p><em>The offset allows us to say "reset daily at 10am", or "reset every Wednesday at 4pm" (given that a
week in PHP starts on a fixed day).</em></p>

<form method="post" name="group" action="<?php echo url_for('@group?groupId=' . $groupId) ?>">
	
	<?php /* @var $form DownloadGroupForm */ ?>
	<fieldset>
		<legend>General (new)</legend>
		<p>
			<?php echo $form['name']->renderRow() ?>	
		</p>
		
		<p>
			<?php echo $form['rate_limit']->renderRow() ?> bytes/sec
		</p>
		
		<p>
			<?php echo $form['count_limit']->renderRow() ?>
		</p>
		
		<p>
			<?php echo $form['bandwidth_limit']->renderRow() ?> bytes
		</p>
		
		<p>
			<?php echo $form['valid_from']->renderRow() ?> <br/>
			<?php echo $form['valid_to']->renderRow() ?>
		</p>
		
		<p>
			<?php echo $form['concurrent_limit']->renderRow() ?>
		</p>

		<p>
			<?php echo $form['concurrent_limit_per_ip']->renderRow() ?>
		</p>
	</fieldset>
	
	<?php echo $form['_csrf_token']->render() ?>
	
	<!--
	Old approach
	<fieldset>
		<legend>Daily limits</legend>
		
		<p>Day starts at (time)</p>
		
		<p>Daily limit</p>
		
		<p>Daily limit per IP: <?php echo input_tag('group[daily_limit_per_ip]') ?></p>
	</fieldset>
	
	<fieldset>
		<legend>Weekly limits</legend>
		
		<p>Week starts on (day)</p>
		
		<p>Weekly limit</p>
		
		<p>Weekly limit per IP: <?php echo input_tag('group[weekly_limit_per_ip]') ?></p></p>
	</fieldset>
	
	<fieldset>
		<legend>Monthly limits</legend>
		
		<p>Month starts on (date)</p>
		
		<p>Monthly limit</p>
		
		<p>Monthly limit per IP: <?php echo input_tag('group[monthly_limit_per_ip]') ?></p></p>
	</fieldset>
	-->
	
	<fieldset>
		<legend>Reset</legend>
		
		<p>Every (X) days at (time)</p>
		
		<p>Every week on (day) at (time)</p>
		
		<p>Every (X) months on (date) at (time)</p>
	</fieldset>

	<p><?php echo submit_tag('Save') ?></p>
</form>