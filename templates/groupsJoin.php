<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<h1>%%%template.groupsJoin.header%%%</h1>

<?php if ($this->userIsInGroup): ?>
Sie sind bereits Mitglied in der Gruppe <?php print $this->model->getTitle(); ?>
<?php else: ?>
<?php $this->printFormTag('groups_join_form') ?>
%%%template.groupsJoin.message.confirmJoin%%%
<input type="hidden" name="tx_mklvcommunity_controllers_groupsJoin[group_uid]" value="<?php print $this->model->getUid() ?>">
<input type="submit" value="%%%template.groupsJoin.label.submit%%%" name="tx_mklvcommunity_controllers_groupsJoin[action][saveGroupsJoinForm]" />
<?php $this->printEndFormTag(); ?>
<?endif; ?>