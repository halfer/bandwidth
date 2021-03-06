<?php /* @var $form sfForm */ ?>

<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('files/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@files') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Delete', 'files/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
		<?php if (!$form->getObject()->isNew()): ?>
			<tr>
				<th>Download count:</th>
				<td><?php echo $form->getObject()->getCountUsage() ?> (inc. incomplete downloads)</td>
			</tr>
			<tr>
				<th>Downloaded bandwidth:</th>
				<td><?php echo $form->getObject()->getBandwidthUsage() ?> bytes</td>
			</tr>
		<?php endif ?>
       <tr>
        <th><?php echo $form['path']->renderLabel() ?></th>
        <td>
          <?php echo $form['path']->renderError() ?>
          <?php echo $form['path'] ?>
        </td>
      </tr>
	   <tr>
        <th><?php echo $form['name']->renderLabel() ?></th>
        <td>
          <?php echo $form['name']->renderError() ?>
          <?php echo $form['name'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['original_uri']->renderLabel() ?></th>
        <td>
          <?php echo $form['original_uri']->renderError() ?>
          <?php echo $form['original_uri'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['is_enabled']->renderLabel() ?></th>
        <td>
          <?php echo $form['is_enabled']->renderError() ?>
          <?php echo $form['is_enabled'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['file_group_list']->renderLabel() ?></th>
        <td>
          <?php echo $form['file_group_list']->renderError() ?>
          <?php echo $form['file_group_list']->render(array('style' => 'height:150px;')) ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
