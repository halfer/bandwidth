<?php use_helper('PagerNavigation') ?>

<?php include_partial('settings/menu') ?>

<h1>Files</h1>

<table class="light_border">
  <thead>
    <tr>
      <th>Name</th>
	  <th>Download link</th>
      <th>Path</th>
      <th>Original URI</th>
      <th>Created at</th>
      <th>Checked at</th>
      <th>Size</th>
      <th>Enabled?</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($results = $pager->getResults() as $DownloadFile): ?>
    <tr>
      <td>
		  <a href="<?php echo url_for('files/edit?id='.$DownloadFile->getId()) ?>">
			  <?php echo $DownloadFile->getName() ?>
		  </a>
	  </td>
	  <td>
		<?php echo link_to('Download', '@download?filename=' . $DownloadFile->getName()) ?>
	  </td>
      <td><?php echo $DownloadFile->getPath() ?></td>
      <td><?php echo $DownloadFile->getOriginalUri() ?></td>
      <td><?php echo $DownloadFile->getCreatedAt() ?></td>
      <td><?php echo $DownloadFile->getCheckedAt() ?></td>
      <td><?php echo $DownloadFile->getSize() ?></td>
      <td><?php echo $DownloadFile->getIsEnabled() ? 'Yes' : 'No' ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php echo pager_navigation($pager, '@files') ?>

<p>
	<a href="<?php echo url_for('files/new') ?>">New</a>
</p>