<?php include_partial('settings/menu') ?>

<h1>Groups</h1>

<table class="light_border">
  <thead>
    <tr>
      <th>Name</th>
      <th>Rate limit</th>
      <th>Count limit</th>
      <th>Bandwidth limit</th>
      <th>Concurrent limit</th>
      <th>Concurrent limit per ip</th>
      <th>Valid from</th>
      <th>Valid to</th>
      <th>Is use landing</th>
      <th>Is use captcha</th>
      <th>Is enabled</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($DownloadGroups as $DownloadGroup): ?>
    <tr>
      <td>
		  <a href="<?php echo url_for('groups/edit?id='.$DownloadGroup->getId()) ?>">
			<?php echo $DownloadGroup->getName() ?>
		  </a>
	  </td>
      <td><?php echo $DownloadGroup->getRateLimit() ?></td>
      <td><?php echo $DownloadGroup->getCountLimit() ?></td>
      <td><?php echo $DownloadGroup->getBandwidthLimit() ?></td>
      <td><?php echo $DownloadGroup->getConcurrentLimit() ?></td>
      <td><?php echo $DownloadGroup->getConcurrentLimitPerIp() ?></td>
      <td><?php echo $DownloadGroup->getValidFrom() ?></td>
      <td><?php echo $DownloadGroup->getValidTo() ?></td>
      <td><?php echo $DownloadGroup->getIsUseLanding() ?></td>
      <td><?php echo $DownloadGroup->getIsUseCaptcha() ?></td>
      <td><?php echo $DownloadGroup->getIsEnabled() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('groups/new') ?>">New</a>
