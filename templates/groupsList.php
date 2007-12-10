<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>


<h1>%%%template.groupsList.header%%%</h1>
<table>
	<?php foreach( $this->model as $group ): ?>
		<tr>
			<td>
				<?php print $group->getTitle(); ?>
			</td>
			<td>
				<?php print $this->createGroupDetailsLink($group->getUid()); ?>
			</td>
			<td>
				<?php print $this->createJoinGroupLink($group->getUid()); ?>
			</td>
		</tr>
	<?php endforeach; ?>
</table>