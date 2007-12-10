<?php ?>
<h1>%%%template.usersearch.header%%%</h1>
<?php $this->printSearchFormTag('privacy_form'); ?>
	%%%template.usersearch.searchword%%%:
	<input name="tx_mklvcommunity_controllers_userList[search_word]" value="<?php echo $this->searchWord ?>">
	<input type="submit" value="%%%template.usersearch.submit%%%" name="tx_mklvcommunity_controllers_userList[action][showSearchList]">
</form>