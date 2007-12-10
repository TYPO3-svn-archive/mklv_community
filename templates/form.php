<?php if (!defined ('TYPO3_MODE')) 	die ('Access denied.'); ?>

<?php $this->printErrorList(); ?>
<?php $this->printFormTagStart('bananas_form'); ?>

	<dl>

		<dt><label for="bananas_title">Title</label></dt>
		<dd><input id="bananas_title" name="bananas[title]" value="<?php $this->printAsForm('title'); ?>" size="60"/></dd>

		<dt><label for="bananas_text">Text</label></dt>
		<dd><textarea id="bananas_text" name="bananas[text]" rows="5" cols="60"><?php $this->printAsForm('text'); ?></textarea></dd>

		<dt><label for="bananas_author">Author</label></dt>
		<dd><input id="bananas_author" name="bananas[author]" value="<?php $this->printAsForm('author'); ?>" size="30"/></dd>

		<dt><label for="bananas_email">Email</label></dt>
		<dd><input id="bananas_email" name="bananas[email]" value="<?php $this->printAsForm('email'); ?>" size="30"/></dd>

		<dt><label for="bananas_url">Url</label></dt>
		<dd><input id="bananas_url" name="bananas[url]" value="<?php $this->printAsForm('url'); ?>" size="30"/></dd>

	</dl>
	<input type="submit" value="%%%preview%%%" name="bananas[action][preview]" />
	<input type="submit" value="%%%save%%%" name="bananas[action][captcha]" />
	<input type="submit" value="%%%clear%%%" name="bananas[action][clear]" />
</form>
