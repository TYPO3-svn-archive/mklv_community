<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>


<h1>%%%template.groupsProfile.header%%% ::  <?php echo $this->model->getTitle() ?></h1>
<dl>
	<dt>%%%template.groupsProfile.label.title%%%:</dt>
	<dd><?php echo $this->model->getTitle() ?></dd>
	<dt>%%%template.groupsProfile.label.description%%%:</dt>
	<dd><?php echo $this->model->getDescription() ?></dd>
</dl>
<?php print $this->printEditGroupLink($this->model->getUid(),'%%%template.groupsProfile.label.editGroup%%%') ?>