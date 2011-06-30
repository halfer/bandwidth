<?php include_partial('menu') ?>

<?php /* @var $downloadGroup DownloadGroup */ ?>

<h1>Group '<?php echo htmlspecialchars($downloadGroup->getName()) ?>'</h1>

<p><em>If we have a many-to-many thing we could have a field that says reset every X seconds, which
would achieve the daily/weekly/monthly thing? Ah no - since a month is not a static number of seconds!
OK, how about (reset_offset, reset_every_seconds, reset_every_months) columns? That would work. So, would
all the settings we intend to support work with this arrangement?</em></p>

<p><em>The offset allows us to say "reset daily at 10am", or "reset every Wednesday at 4pm" (given that a
week in PHP starts on a fixed day).</em></p>

<form method="post" name="group" action="<?php echo url_for('@group_save?groupId=' . $groupId) ?>">
	
	<!--
	<fieldset>
		<legend>General (old)</legend>
		<p>Name: <?php echo input_tag('group[name]', $downloadGroup->getName()) ?>

		<p>Rate limit per file: <?php echo input_tag('group[rate_limit_per_file]', $downloadGroup->getRateLimit()) ?> bytes/sec</p>

		<p>Rate limit per group: <?php echo input_tag('group[rate_limit_per_group]') ?> bytes/sec</p>

		<p>Maximum number of downloads per file: <?php echo input_tag('group[count_limit_per_file]') ?></p>

		<p>Maximum number of downloads per group: <?php echo input_tag('group[count_limit_per_group]') ?></p>

		<p>Valid date range: <?php echo input_date_range_tag('group[date_range]', $dates = array(), array('rich' => true)) ?></p>

		<p>Concurrent limit per file: <?php echo input_tag('group[concurrent_per_file]', $downloadGroup->getCountLimit()) ?></p>
		
		<p>Concurrent limit per file per IP: <?php echo input_tag('group[concurrent_per_file_per_ip]', null) ?></p>

		<p>Concurrent limit per group: <?php echo input_tag('group[concurrent_per_group]') ?></p>
		
		<p>Concurrent limit per group per IP: <?php echo input_tag('group[concurrent_per_group_per_ip]', null) ?></p>
	</fieldset>
	-->

	<fieldset>
		<legend>General (new)</legend>
		<p>
			Name: <?php echo input_tag('group[name]', $downloadGroup->getName()) ?>
			<span class="error"><?php echo error_line($errors, 'name') ?></span>
		</p>

		<p>Rate limit: <?php echo input_tag('group[rate_limit]', $downloadGroup->getRateLimit()) ?> bytes/sec</p>

		<p>Count limit: <?php echo input_tag('group[count_limit]', $downloadGroup->getCountLimit()) ?></p>
		
		<p>Bandwidth limit: <?php echo input_tag('group[bandwidth_limit]', $downloadGroup->getBandwidthLimit()) ?> bytes</p>

		<p>
			Valid date range: <?php echo input_date_tag('group[valid_from]', $downloadGroup->getValidFrom(), array('rich' => true)) ?>
			to
			<?php echo input_date_tag('group[valid_to]', $downloadGroup->getValidTo(), array('rich' => true)) ?>
		</p>

		<p>Concurrent limit: <?php echo input_tag('group[concurrent_limit]', $downloadGroup->getConcurrentLimit()) ?></p>
		
		<p>Concurrent limit per IP: <?php echo input_tag('group[concurrent_limit_per_ip]', $downloadGroup->getConcurrentLimitPerIp()) ?></p>
	</fieldset>
	
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