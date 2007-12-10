<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>
<?php $model = $this->getModel() ?>
<h1>%%%template.userBuddyAdd.header%%%</h1>

%%%template.userBuddyAdd.message%%%<br /><br />

<?php /** @todo insert captcha here */ ?>

%%%template.userBuddyAdd.username%%%: <strong><?php echo $model->getUsername(); ?></strong><br />

<?php $this->printFormtag('user_buddy_add_form'); ?>

<?php $this->printHiddenBuddyUidField(); ?><br />
<input type="submit" name="tx_mklvcommunity_controllers_buddiesAdd[action][processBuddiesAddForm]" value="%%%template.userBuddyAdd.submit%%%" />

</form>