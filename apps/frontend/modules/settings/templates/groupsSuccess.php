<?php include_partial('menu') ?>

<h1>Groups</h1>

<?php /* @var $pager sfPropelPager */ ?>
<?php /* @var $downloadGroup DownloadGroup */ ?>

<table>
	<thead>
		<tr>
			<th>Group name</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results = $pager->getResults() as $downloadGroup ): ?>
			<tr>
				<td><?php echo link_to($downloadGroup->getName(), '@group?groupId=' . $downloadGroup->getId()) ?></td>
			</tr>
		<?php endforeach ?>

		<?php /* If there are no result rows, print empty row */ ?>
		<?php if (!$results): ?>
			<tr>
				<td>No groups defined</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>

<p>
	<?php echo link_to('New group', '@group?groupId=new') ?>
</p>