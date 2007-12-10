<?php ?>
<h1>%%%template.userprivacy.header%%%</h1>
%%%template.userprivacy.message%%%
	<?php $this->printFormTag('privacy_form'); ?>
	<?php $this->printPrivacySelect() ?>
	<input type="submit" name="tx_mklvcommunity_controllers_userPrivacy[action][saveUserPrivacyAction]" value="%%%template.userprivacy.submit%%%">
</form>