<?php use_helper('PagerNavigation') ?>

<?php include_partial('menu') ?>

<h1>Status</h1>

<?php /* @var $pager sfPropelPager */ ?>
<?php /* @var $downloadLog DownloadLog */ ?>

<table class="light_border">
	<thead>
		<tr>
			<th>IP</th>
			<th>File</th>
			<th>Started at</th>
			<th>Last accessed</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($results = $pager->getResults() as $downloadLog ): ?>
			<tr>
				<td><?php echo $downloadLog->getIp() ?></td>
				<td><?php echo $downloadLog->getDownloadFile()->getName() ?></td>
				<td><?php echo $downloadLog->getStartedAt() ?></td>
				<td><?php echo $downloadLog->getAccessedAt() ?></td>
				<td>
					<?php
					switch ($status = $downloadLog->getIsAborted()):
						case false:
							echo "Finished";
							break;
						case true:
							echo "Aborted";
							break;
						default:
							echo "In progress";
							break;
					endswitch ?>
				</td>
			</tr>
		<?php endforeach ?>

		<?php /* If there are no result rows, print empty row */ ?>
		<?php if (!$results): ?>
			<tr>
				<td colspan="5">No logs to see</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>

<?php echo pager_navigation($pager, "@index?page=$page&sort=$sort") ?>
