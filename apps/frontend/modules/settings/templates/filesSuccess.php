<?php include_partial('menu') ?>

<h1>Files</h1>

<?php /* @var $pager sfPropelPager */ ?>
<?php /* @var $downloadFile DownloadFile */ ?>

<table>
	<thead>
		<tr>
			<th>File name</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results = $pager->getResults() as $downloadFile ): ?>
			<tr>
				<td><?php echo link_to($downloadFile->getName(), '@file?fileId=' . $downloadFile->getId()) ?></td>
			</tr>
		<?php endforeach ?>

		<?php /* If there are no result rows, print empty row */ ?>
		<?php if (!$results): ?>
			<tr>
				<td>No files defined</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>

<p>
	<?php echo link_to('New file', '@file?fileId=new') ?>
</p>