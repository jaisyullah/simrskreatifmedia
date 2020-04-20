<?php

class scProgressBar {

	private $file_root;
	private $file_path;
	private $pb_md5;
	private $pb_message;
	private $pb_title;
	private $download_link;
	private $download_md5;
	private $return_url;
	private $return_option;
	private $step_count;
	private $step_total;
	private $complete;
	private $buttons;
	private $operation;
	private $debug = false;

	public function initialize() {
		$this->operation     = 'initialize';
		$this->step_count    = 0;
		$this->step_total    = 0;
		$this->pb_message    = '';
		$this->pb_title      = '';
		$this->download_link = '';
		$this->download_md5  = '';
		$this->return_url    = '';
		$this->return_option = '';
		$this->complete      = false;
		$this->buttons       = array();

		$this->saveState();
	} // initialize

	public function setDebug($debug) {
		$this->debug = $debug;
	} // setDebug

	public function createProgressbarMd5() {
		$this->pb_md5 = md5(rand(1, 99999) . microtime());
	} // createProgressbarMd5

	public function setRoot($dir) {
		$this->file_root = $dir;
	} // setRoot

	public function setDir($dir) {
		$this->file_path = $dir;
	} // setDir

	public function setProgressbarMd5($md5) {
		$this->pb_md5 = $md5;
	} // setProgressbarMd5

	public function setProgressbarMessage($message) {
		$this->pb_message = $message;
	} // setProgressbarMessage

	public function setProgressbarTitle($title) {
		$this->pb_title = $title;
	} // setProgressbarTitle

	public function setButtons($buttons) {
		$this->buttons = $buttons;
	} // setButtons

	public function setDownloadLink($link) {
		$this->download_link = $link;
	} // setDownloadLink

	public function setDownloadMd5($md5) {
		$this->download_md5 = $md5;
	} // setDownloadMd5

	public function setReturnUrl($url) {
		$this->return_url = $url;
	} // setReturnUrl

	public function setReturnOption($option) {
		$this->return_option = $option;
	} // setReturnOption

	public function setTotalSteps($total) {
		$this->step_total = $total;
	} // setTotalSteps

	public function addSteps($count) {
		$this->operation   = 'addSteps';
		$this->step_count += $count;

		$this->saveState();
	} // addSteps

	public function getProgressbarMd5() {
		return $this->pb_md5;
	} // getProgressbarMd5

	public function completed() {
		$this->operation = 'completed';
		$this->complete  = true;

		$this->saveState();
	} // completed

	public function getJavascript() {
		$jsCode = <<<JS
function scPB_update() {

JS;
		if ($this->debug) {
			$jsCode .= <<<JS
	console.log("Progress bar call");

JS;
		}
		$jsCode .= <<<JS
	\$.ajax({
		url: "{$this->file_path}sc_pb_{$this->pb_md5}.txt",
		method: "GET",
		dataType: "json",
		cache:false
	}).done(function(data, textStatus, jqXHR) {

JS;
		if ($this->debug) {
			$jsCode .= <<<JS
	console.log("Progress bar done");
	console.log(data);

JS;
		}
		$jsCode .= <<<JS
		if ("" != data.returnUrl) {
			document.F0.action = data.returnUrl;
			document.F0.nmgp_opcao.value = data.returnOption;
		}

		if (!data.complete) {
			var progress;

			if (0 == data.count) {
				progress = 0;
			}
			else if (data.count >= data.steps) {
				progress = 99;
			}
			else {
				progress = Math.round((data.count / data.steps) * 100);

				if (100 <= progress) {
					progress = 99;
				}
			}

			\$("#pb_bar-{$this->pb_md5}").progressbar("value", progress);
			\$("#pb_perc-{$this->pb_md5}").html(progress + "%");
			\$("#pb_msg-{$this->pb_md5}").html(data.message);

			setTimeout(scPB_update, 100);
		}
		else {
			\$("#pb_bar-{$this->pb_md5}").progressbar("value", 100);
			\$("#pb_perc-{$this->pb_md5}").html("100%");
			\$("#pb_msg-{$this->pb_md5}").html(data.message);

			document.Fview.action = data.link;
			document.Fdown.nm_name_doc.value = data.md5;

			scPB_enableButton("{$this->buttons['view']['id']}");
			scPB_enableButton("{$this->buttons['download']['id']}");
		}
	}).fail(function(jqXHR, textStatus, errorThrown) {

JS;
		if ($this->debug) {
			$jsCode .= <<<JS
	console.log("Progress bar fail");
	console.log(textStatus);
	console.log(errorThrown);

JS;
		}
		$jsCode .= <<<JS
			setTimeout(scPB_update, 100);
	});
} // scPB_update

function scPB_disableButton(buttonId) {
	$("#" + buttonId).addClass("disabled").prop("disabled", true);
} // scPB_disableButton

function scPB_enableButton(buttonId) {
	$("#" + buttonId).removeClass("disabled").prop("disabled", false);
} // scPB_enableButton

$(function() {
	$("#pb_bar-{$this->pb_md5}").progressbar({
		classes: {
			"ui-progressbar": "scExportBar scExportBarRest",
			"ui-progressbar-value": "scExportBarDone",
			"ui-progressbar-complete": "scExportBarDone"
		}
	});

	scPB_disableButton("{$this->buttons['view']['id']}");
	scPB_disableButton("{$this->buttons['download']['id']}");

	scPB_update();
});


JS;

		return $jsCode;
	} // getJavascript

	public function getHtml() {
		$htmlCode = <<<HTML
<table style="border-collapse: collapse; border-width: 0; height: 100%; width: 100%"><tr><td style="padding: 0; text-align: center; vertical-align: middle">
<table class="scExportTable" align="center">
	<tr>
		<td class="scExportTitle" style="height: 25px">{$this->pb_title}</td>
	</tr>
	<tr>
		<td class="scExportLine" style="width: 100%">
			<table style="border-collapse: collapse; border-width: 0; width: 100%">
				<tr>
					<td class="scExportLineFont" style="padding: 3px 0 10px 0" colspan="2">
						<div style="width: 100%; display: flex; flex-direction: row; align-items: center; justify-content: center">
							<div id="pb_bar-{$this->pb_md5}" style="display: inline-block; flex-grow: 1"></div>
							<div id="pb_perc-{$this->pb_md5}" style="display: inline-block; text-align: right; min-width: 40px; padding-left: 5px"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="scExportLineFont" style="padding: 0 15px 0 0">
						<span id="pb_msg-{$this->pb_md5}"></span>
						<span id="pb_link-{$this->pb_md5}" style="display: none"></span>
					</td>
					<td class="scExportLineFont" style="text-align:right; padding: 0; white-space: nowrap">
						{$this->buttons['view']['code']}
						{$this->buttons['download']['code']}
						{$this->buttons['back']['code']}
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>
</td></tr></table>

HTML;

		return $htmlCode;
	} // getHtml

	public function getIframeParams() {
		$postParams = array();
		$ignore     = array('nm_proc_barr');

		foreach ($_POST as $name => $value) {
			if (!in_array($name, $ignore)) {
				$postParams[] = "$name=$value";
			}
		}

		$postParams[] = "pbmd5={$this->pb_md5}";

		return implode('&', $postParams);
	} // getIframeParams

	private function saveState() {
		$json = array(
			'steps'        => $this->step_total,
			'count'        => $this->step_count,
			'message'      => $this->pb_message,
			'link'         => $this->download_link,
			'md5'          => $this->download_md5,
			'returnUrl'    => $this->return_url,
			'returnOption' => $this->return_option,
			'complete'     => $this->complete,
		);

		@file_put_contents("{$this->file_root}{$this->file_path}sc_pb_{$this->pb_md5}.txt", json_encode($json));

		$this->saveDebugInfo();
	} // saveState

	private function saveDebugInfo() {
		if (!$this->debug) {
			return;
		}

		$debug = <<<EOT
file_root={$this->file_root}
file_path={$this->file_path}
pb_md5={$this->pb_md5}
pb_message={$this->pb_message}
pb_title={$this->pb_title}
download_link={$this->download_link}
download_md5={$this->download_md5}
return_url={$this->return_url}
return_option={$this->return_option}
step_count={$this->step_count}
step_total={$this->step_total}
complete={$this->complete}
operation={$this->operation}
-------------------------

EOT;

		@file_put_contents("{$this->file_root}{$this->file_path}sc_pb_{$this->pb_md5}_debug.txt", $debug, FILE_APPEND);
	} // saveDebugInfo

} // scProgressBar

?>