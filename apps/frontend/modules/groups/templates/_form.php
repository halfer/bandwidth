<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('groups/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('@groups') ?>">Back to list</a>
          <?php if (!$form->getObject()->isNew() && !$form->getObject()->inUse()): ?>
            &nbsp;<?php echo link_to('Delete', 'groups/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Save" />
        </td>
      </tr>
    </tfoot>
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
</form>
