<?php if (!defined('APPLICATION')) exit();

function ChooseYourOwnFormatPluginConfig() {
	$Config = [];

	// What's the default format? 'Html' or 'Markdown'?
	$Config['DefaultFormat'] = function($Sender) {

		// Load from DB example
		/*
		$DiscussionModel = new DiscussionModel();
		$prefix = $DiscussionModel->SQL->Database->DatabasePrefix;
		$DiscussionModel->SQL->Database->DatabasePrefix = '';
		$DiscussionModel->SQL
			->Select('users.preferred_markup', '', 'PreferredMarkup')
			->From('GDN_UserAuthentication')
			->Join('users', 'users.id = GDN_UserAuthentication.ForeignUserKey')
			->Where('UserID', Gdn::Session()->UserID);
		$DiscussionModel->SQL->Database->DatabasePrefix = $prefix;

		$Row = $DiscussionModel->SQL->Get()->FirstRow();
		switch ($Row->PreferredMarkup) {
			case 'html':
				return 'Html';
			case 'markdown':
				return 'Markdown';
			default:
				return null;
		}
		*/

		// Hardcode
		return 'Markdown';
	};

	return $Config;
}
?>
