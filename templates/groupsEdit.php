<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<h1>%%%template.groupsEdit.header%%%</h1>

<?php $this->printFormTag('groups_edit_form'); ?>
<? if ($this->getErrors()): ?> 
	<div style="color:red">%%%general.forms.errorMsg%%%</div>
<?endif; ?>
<input type="hidden" name="tx_mklvcommunity_controllers_groupsEdit[group_uid]" value="<?php print $this->model->getUid() ?>">
<dl>
  <dt>%%%template.groupsEdit.label.groupsTitle%%%</dt>  
  <dd>
  	<?php if ($this->getErrors('group_title')): ?>
  		<div style="color:red">%%%general.forms.notEmptyErrMsg%%%</div>
  	<?php endif; ?>
  	<input name="tx_mklvcommunity_controllers_groupsEdit[group_title]" width="30" value="<?php print $this->model->getTitle() ?>"/>
  </dd>
  <dt> %%%template.groupsEdit.label.groupsDescription%%%</dt>
  <dd>
  	<?php if ($this->getErrors('group_description')): ?>
  		<div style="color:red">%%%general.forms.notEmptyErrMsg%%%</div>
  	<?php endif; ?>
  	<textarea rows="10" cols="30" name="tx_mklvcommunity_controllers_groupsEdit[group_description]"><?php print $this->model->getDescription() ?></textarea>
  </dd>
</dl>
<input type="submit" value="%%%template.groupsEdit.label.submit%%%" name="tx_mklvcommunity_controllers_groupsEdit[action][saveGroupsEditForm]" />

<?php $this->printEndFormTag(); ?>