<?php include_partial('menu') ?>

<h1>Add new files</h1>

<form method="post" enctype="">

	<p>URL: <?php echo input_tag('url') ?>
	
	<p>File: <?php echo input_file_tag('upload_file') ?></p>
	
	<?php echo submit_tag('Go') ?>

</form>