<?php $model = $this->getModel() ?>
<h1>%%%template.userBuddyList.header%%%</h1>

<?php 

foreach ($model as $buddy) {
	print $buddy->getUsername();
	print $this->printUserDetailsLink($buddy->getUid(), '%%%template.userBuddyList.userDetailsLink%%%');
}
	
	
?>
