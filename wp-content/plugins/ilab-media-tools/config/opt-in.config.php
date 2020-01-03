<?php
// Copyright (c) 2016 Interfacelab LLC. All rights reserved.
//
// Released under the GPLv3 license
// http://www.gnu.org/licenses/gpl-3.0.html
//
// **********************************************************************
// This program is distributed in the hope that it will be useful, but
// WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
// **********************************************************************

if (!defined('ABSPATH')) { header('Location: /'); die; }

return [
	"id" => "opt-in",
	"name" => "Opt-In Settings",
	"description" => "Manage opt-in settings.",
	"class" => "ILAB\\MediaCloud\\Tools\\Permissions\\OptInTool",
	"exclude" => true,
	"dependencies" => [],
	"env" => "ILAB_MEDIA_PERMISSIONS_ENABLED",  // this is always enabled btw
	"settings" => [
		"options-page" => "media-cloud-opt-in",
		"options-group" => "media-cloud-opt-in-group",
		"groups" => [
			"media-cloud-opt-in-settings" => [
				"title" => "Opt-In Settings",
				"dynamic" => true,
				"description" => "The following options control the various permissions you are granting Media Cloud.  When you first activate the plugin and choose <strong>Accept & Continue</strong> you are granting Media Cloud these various permissions.  You can disable them, or enable them, here.",
				"options" => [
					"mcloud-opt-in-crisp" => [
						"title" => "Support Chat (Pro)",
						"description" => "When this is enabled, you can speak directly to customer support on the various settings pages by clicking on the blue icon in the bottom right corner of the screen.  Customer support chat is provided by <a href='https://crisp.chat' target='_blank'>Crisp</a>.  This option is only available for the Pro or Agency versions of the plugin.",
						"type" => "checkbox",
						"default" => false
					],
					"mcloud-opt-usage-tracking" => [
						"title" => "Feature Tracking",
						"description" => "When this is selected, we will collect completely anonymous information about which features are enabled, which storage/vision provider is being used and which batch tools are being used.  We do not collect any personally identifiable information, everything is completely anonymous.  Nor do we collect any information such as file names, access keys, etc.  We use this information to focus development efforts on features that matter most to our users.",
						"type" => "checkbox",
						"default" => false
					],
					"mcloud-opt-screen-sharing" => [
						"title" => "Screen Sharing",
						"description" => "When this is enabled, the support team can send you a screen sharing request through the support chat to help troubleshoot issues.  This option should only be enabled if and when support requests it.",
						"type" => "checkbox",
						"default" => false
					],
				]
			],
		]
	]
];