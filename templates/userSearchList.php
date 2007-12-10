<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>
<h1>%%%template.userSearchList.header%%%</h1>
<h2>%%%template.userSearchList.searchWord%%%: <?php echo $this->getSearchWord(); ?></h2>
<span><?php echo $this->getMessage(); ?></span>
<?php echo $this->renderFromModel(); ?>