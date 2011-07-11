<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<script type="text/javascript">
	$(document).ready(function() {
		
		// Hide the time block to start with
		$('#frequency_demo').hide();
		
		$('.frequency_inputs input').change(function()
		{
			// Only send frequency values if there is some input to analyse!
			var inputs = $('.frequency_inputs input');
			var send = false;
			inputs.each(function(index, element)
			{
				if (element.value)
				{
					send = true;
				}
			});
			
			// Let's hide time block if there's no input
			if (!send)
			{
				$('#frequency_demo').hide();
			}
			
			if (send)
			{
				// @todo Strip out only the field we want - currently sending the whole form!
				var data = $('#group_form').serialize();
				
				// OK, make ajax request to server
				$.ajax({
					type: 'POST',
					url: '<?php echo url_for('@groups_get_freq') ?>',
					data: data,
					success: function(data)
					{
						$('#frequency_demo').show();
						if (data.error)
						{
							// @todo Highlight in an error colour
							$('#frequency_demo_cell').html(data.error);
						}
						else
						{
							
							$('#frequency_demo_cell').html(data.result);
						}
					},
					dataType: 'json'
				});
			}
		})
		
	});
</script>

<form action="<?php echo url_for('groups/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>"
	  method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>
	  id="group_form">
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
			  <tr class="frequency_inputs">
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
			  <tr id="frequency_demo">
				  <th>Current period</th>
				  <td id="frequency_demo_cell">&nbsp;</td>
			  </tr>
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
