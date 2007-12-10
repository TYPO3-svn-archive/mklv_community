<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<h1>%%%template.groupsJoinDelete.header%%%</h1>

<?php $this->printFormTag('groups_join_delete_form') ?>
	<input type="hidden" name="tx_mklvcommunity_controllers_groupsJoin[group_uid]" value="<?php print $this->model->getUid(); ?>" />
	Press 'submit' to leave the group <?php print $this->model->getTitle(); ?>
	<input type="submit" name="tx_mklvcommunity_controllers_groupsJoin[action][performGroupsJoinDeleteAction]" value="%%%template.groupsJoinDelete.label.submit%%%" />
<?php $this->printEndFormTag(); ?>