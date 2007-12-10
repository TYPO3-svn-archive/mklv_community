<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>
<?php $userData = $this->model->get('userData'); ?>
<?php $userUid = tx_mklvcommunity_helper::getLoggedInUid(); ?>

<h1>%%%template.userdetails.header%%%: <?php print $userData->getUsername()?></h1>
	<dl>
		<dt>%%%template.userdetails.label.username%%%</dt>
		<dd><?php print $userData->getUsername() ?></dd>
		<dt>%%%template.userdetails.label.name%%%</dt>
		<dd><?php print $userData->getName() ?>
	</dl>
	
<?php if ($userUid != $userData->getUid()): ?>
<?php print $this->printAddBuddyLink($userData->getUid()); ?>
<?php endif; ?>