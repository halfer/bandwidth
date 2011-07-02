<h1>DownloadFiles List</h1>

<table class="light_border">
  <thead>
    <tr>
      <th>Name</th>
      <th>Path</th>
      <th>Original URI</th>
      <th>Created at</th>
      <th>Checked at</th>
      <th>Size</th>
      <th>Is enabled</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($DownloadFiles as $DownloadFile): ?>
    <tr>
      <td>
		  <a href="<?php echo url_for('files/edit?id='.$DownloadFile->getId()) ?>">
			  <?php echo $DownloadFile->getName() ?>
		  </a>
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

<p>
	<a href="<?php echo url_for('files/new') ?>">New</a>
</p>