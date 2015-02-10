<?php if (!defined('APPLICATION')) exit();

// Define the plugin:
$PluginInfo['ChooseYourOwnFormat'] = array(
	'Name' => 'Choose Your Own Format',
	'Description' => 'Lets users choose the format of their posts.',
	'Version' => '1.0',
	'Author' => "Jason Barnabe",
	'RequiredApplications' => array('Vanilla' => '2.1'),
	'AuthorEmail' => 'jason.barnabe@gmail.com',
	'AuthorUrl' => 'https://github.com/JasonBarnabe/ChooseYourOwnFormat',
	'MobileFriendly' => TRUE
);

require_once dirname(__FILE__).'/config.php';

class ChooseYourOwnFormatPlugin extends Gdn_Plugin {

	public $Config = null;

	public function __construct() {
		parent::__construct();
		$this->Config = ChooseYourOwnFormatPluginConfig();
	}

	public function Gdn_Form_BeforeBodyBox_Handler($Sender) {
		$FormatRadioList = $Sender->RadioList('Format', array('Html' => 'HTML', 'Markdown' => 'Markdown'));
		// Add our radio field and get rid of the hidden input field.
		$Sender->EventArguments['BodyBox'] = $FormatRadioList.preg_replace("/<input type=\"hidden\" id=\"Form_Format\".*>/", "", $Sender->EventArguments['BodyBox']);
	}

	private function GetDefault($Sender) {
		$Default = null;
		if (isset($this->Config['DefaultFormat'])) {
			$DefaultFormatFunction = $this->Config['DefaultFormat'];
			$Default = $DefaultFormatFunction($Sender);
		}
		if (!$Default) {
			$Default = C('Garden.InputFormatter');
		}
		return $Default;
	}

	public function PostController_BeforeDiscussionRender_Handler($Sender) {
		# Only do this for new discussions
		if (isset($Sender->Discussion)) {
			return;
		}
		$Sender->Form->SetValue('Format', $this->GetDefault($Sender));
	}

	public function DiscussionController_BeforeDiscussionRender_Handler($Sender) {
		$Sender->Form->SetValue('Format', $this->GetDefault($Sender));
	}

	public function MessagesController_BeforeMessageAdd_Handler($Sender) {
		$Sender->Form->SetValue('Format', $this->GetDefault($Sender));
	}

	public function ProfileController_BeforeStatusForm_Handler($Sender) {
		$Sender->Form->SetValue('Format', $this->GetDefault($Sender));
	}

}
