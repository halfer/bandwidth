<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script type="text/javascript">
	$(document).ready(function() {
		
		/**
		 * No longer used - previously had a menu to choose frequency of group reset
		 */
		function handleResetChange()
		{
			var frequency = $('#download_group_reset_chooser').val();
			frequency = parseInt(frequency);

			if (frequency)
			{
				$('.reset_rules').show();
				
				var strFreq, strFreqPlural;
				switch (frequency)
				{
					case 60 * 60:
						strFreq = 'hour';
						strFreqPlural = 'hours';
						break;
					case 60 * 60 * 24:
						strFreq = 'day';
						strFreqPlural = 'days';
						break;
					case 60 * 60 * 24 * 7:
						strFreq = 'week';
						strFreqPlural = 'weeks';
						break;
				}
				
				// Decide whether this should be plural
				var multiplier = $('#download_group_reset_multiplier').val();
				multiplier = parseFloat(multiplier);
				if (multiplier != 1)
				{
					strFreq = strFreqPlural;
				}
				$('#reset_freq_string').html(strFreq);
			}
			else
			{
				$('.reset_rules').hide();
			}			
		}
	});
</script>

<form action="<?php echo url_for('groups/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
	<?php if (!$form->getObject()->isNew()): ?>
	<input type="hidden" name="sf_method" value="put" />
	<?php endif; ?>

	<fieldset>
		<table>
			<tbody>
			  <?php echo $form->renderGlobalErrors() ?>
			  <tr>
				<th><?php echo $form['name']->renderLabel() ?></th>
				<td>
				  <?php echo $form['name']->renderError() ?>
				  <?php echo $form['name'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['rate_limit']->renderLabel() ?></th>
				<td>
				  <?php echo $form['rate_limit']->renderError() ?>
				  <?php echo $form['rate_limit'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['count_limit']->renderLabel() ?></th>
				<td>
				  <?php echo $form['count_limit']->renderError() ?>
				  <?php echo $form['count_limit'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['bandwidth_limit']->renderLabel() ?></th>
				<td>
				  <?php echo $form['bandwidth_limit']->renderError() ?>
				  <?php echo $form['bandwidth_limit'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['concurrent_limit']->renderLabel() ?></th>
				<td>
				  <?php echo $form['concurrent_limit']->renderError() ?>
				  <?php echo $form['concurrent_limit'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['concurrent_limit_per_ip']->renderLabel() ?></th>
				<td>
				  <?php echo $form['concurrent_limit_per_ip']->renderError() ?>
				  <?php echo $form['concurrent_limit_per_ip'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['valid_from']->renderLabel() ?></th>
				<td>
				  <?php echo $form['valid_from']->renderError() ?>
				  <?php echo $form['valid_from'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['valid_to']->renderLabel() ?></th>
				<td>
				  <?php echo $form['valid_to']->renderError() ?>
				  <?php echo $form['valid_to'] ?>
				</td>
			  </tr>
			  <tr>
				<th><?php echo $form['is_enabled']->renderLabel() ?></th>
				<td>
				  <?php echo $form['is_enabled']->renderError() ?>
				  <?php echo $form['is_enabled'] ?>
				</td>
			  </tr>
			</tbody>
		</table>
	</fieldset>

	<fieldset>
		<legend>Time rules</legend>
		
		<table>
			<tbody>
			  <tr>
				  <th>Reset frequency</th>
				  <td>
					<?php echo $form['reset_frequency']->renderError() ?>
					<?php echo $form['reset_frequency[weeks]'] ?> weeks
					<?php echo $form['reset_frequency[days]'] ?> days
					<?php echo $form['reset_frequency[hours]'] ?> hours
					<?php echo $form['reset_frequency[minutes]'] ?> minutes
					<?php echo $form['reset_frequency[seconds]'] ?> seconds
				  </td>
			  </tr>
			  <!--
			  This line is for a JS widget to illustrate the CURRENT block that obeys this frequency
			  
			  e.g. if now is 7 Jul 20:47 2011, and freq = 1d, then this would show:
	 
			  7 Jul 0:00:00 2011 - 8 Jul 0:0:00 2011
			  <tr>
				  <th>Base time period</th>
				  <td>(JS widget)</td>
			  </tr>
			  -->
			  <tr>
				  <th>Reset offset</th>
				  <td>
					<?php echo $form['reset_offset']->renderError() ?>
					<?php echo $form['reset_offset[weeks]'] ?> weeks
					<?php echo $form['reset_offset[days]'] ?> days
					<?php echo $form['reset_offset[hours]'] ?> hours
					<?php echo $form['reset_offset[minutes]'] ?> minutes
					<?php echo $form['reset_offset[seconds]'] ?> seconds
				  </td>
			  </tr>
			  <!--
			  This line is the above plus the offset e.g. with an offset of 3h:
	 
			  7 Jul 3:00:00 2011 - 8 Jul 3:0:00 2011			  
			  <tr>
				  <th>Modified time period</th>
				  <td>(JS widget)</td>
			  </tr>
			  -->
			</tbody>
		</table>
	</fieldset>

	<p>
		<?php echo $form->renderHiddenFields(false) ?>
		&nbsp;<a href="<?php echo url_for('@groups') ?>">Back to list</a>
		<?php if (!$form->getObject()->isNew() && !$form->getObject()->inUse()): ?>
		&nbsp;<?php echo link_to('Delete', 'groups/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
		<?php endif; ?>
		<input type="submit" value="Save" />
	</p>
</form>
