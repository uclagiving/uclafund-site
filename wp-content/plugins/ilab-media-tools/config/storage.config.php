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
    "id" => "storage",
    "name" => "Cloud Storage",
	"description" => "Automatically uploads media to Amazon S3, Google Cloud Storage, Backblaze, DigitalOcean Spaces and others.",
	"class" => "ILAB\\MediaCloud\\Tools\\Storage\\StorageTool",
	"env" => "ILAB_MEDIA_S3_ENABLED",
	"dependencies" => [],
    "related" => ["media-upload", "crop"],
    "dynamic-config-option" => "mcloud-storage-provider",
    "compatibleImageOptimizers" => include 'image-optimizers.config.php',
    "incompatiblePlugins" => [
	    "Photo Gallery" => [
		    "plugin" => "photo-gallery/photo-gallery.php",
		    "description" => "If someone were to ask me for a statement about this photo gallery plug-in, the only thing I could say that would be remotely positive is that it doesn't work with Media Cloud.  We'll just leave it at that."
	    ],
	    "Webcraftic Robin Image Optimizer" => [
		    "plugin" => "robin-image-optimizer/robin-image-optimizer.php",
		    "description" => "The image optimization process is a black box with no available way for Media Cloud to hook into it.  So while it will optimize your images, Media Cloud will be unaware that any optimizations occurred and will not transfer the result to cloud storage."
	    ],
	    "TranslatePress - Multilingual" => [
		    "plugin" => "translatepress-multilingual/index.php",
		    "description" => "There is a library conflict with TranslatePress that may prevent Media Cloud's background tasks from running.  We are working on a compatibility fix for the next release of Media Cloud."
	    ],
    ],
    "badPlugins" => [
	    "OptiMole" => [
		    "plugin" => "optimole-wp/optimole-wp.php",
		    "description" => "Optimole uploads and hosts your images on their servers and is fundamentally incompatible with Media Cloud."
	    ],
    ],
	"CLI" => [
		"\\ILAB\\MediaCloud\\Tools\\Storage\\CLI\\StorageCommands"
	],
	"storageDrivers" => [
		's3' => [
			'name' => 'Amazon S3',
			'class' => "\\ILAB\\MediaCloud\\Storage\\Driver\\S3\\S3Storage",
			'config' => '/storage/s3.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 's3' ],
				[ 'title' => 'Watch Tutorial', 'video_url' => 'https://www.youtube.com/watch?v=kjFCACrPRtU' ],
				[ 'title' => 'Read Documentation', 'url' => 'https://support.mediacloud.press/articles/documentation/cloud-storage/setting-up-amazon-s3' ],
			]
		],
		'google' => [
			'name' => 'Google Cloud Storage',
			'class' => "\\ILAB\\MediaCloud\\Storage\\Driver\\GoogleCloud\\GoogleStorage",
			'config' => '/storage/google.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 'google' ],
				[ 'title' => 'Read Documentation', 'url' => 'https://support.mediacloud.press/articles/documentation/cloud-storage/setting-up-google-cloud-storage' ],
			]
		],
		'do' => [
			'name' => 'DigitalOcean Spaces',
			'class' => "\\ILAB\\MediaCloud\\Storage\\Driver\\S3\\DigitalOceanStorage",
			'config' => '/storage/do.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 'do' ],
				[ 'title' => 'Read Documentation', 'url' => 'https://support.mediacloud.press/articles/documentation/cloud-storage/setting-up-digitalocean-spaces' ],
			]
		],
		'minio' => [
			'name' => 'Minio',
			'class' => "\\ILAB\\MediaCloud\\Storage\\Driver\\S3\\MinioStorage",
			'config' => '/storage/minio.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 'minio' ]
			]
		],
		'wasabi' => [
			'name' => 'Wasabi',
			'class' => "\\ILAB\\MediaCloud\\Storage\\Driver\\S3\\WasabiStorage",
			'config' => '/storage/wasabi.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 'wasabi' ],
				[ 'title' => 'Read Documentation', 'url' => 'https://support.mediacloud.press/articles/documentation/cloud-storage/setting-up-wasabi' ],
			]
		],
		'other-s3' => [
			'name' => 'Other S3 Compatible Service',
			'class' => "\\ILAB\\MediaCloud\\Storage\\Driver\\S3\\OtherS3Storage",
			'config' => '/storage/other-s3.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 'other-s3' ],
			]
		],
		'backblaze' => [
			'name' => 'Backblaze',
			'class' => \ILAB\MediaCloud\Storage\Driver\Backblaze\BackblazeStorage::class,
			'config' => '/storage/backblaze.config.php',
			'help' => [
				[ 'title' => 'Setup Wizard', 'wizard' => 'backblaze' ],
				[ 'title' => 'Read Documentation', 'url' => 'https://support.mediacloud.press/articles/documentation/cloud-storage/setting-up-backblaze' ],
			]
		],
	],
	"settings" => [
		"options-page" => "media-tools-s3",
		"options-group" => "ilab-media-s3",
        "watch" => true,
		"groups" => [
            "ilab-media-cloud-provider" => [
                "title" => "Cloud Provider",
                "description" => "To get Cloud Storage working, select a provider and supply the requested credentials.  For Amazon S3, this <a target='_blank' href='https://gist.github.com/jawngee/9cc2031f5ad154558b14e1fb395414cf'>IAM Policy</a> is the minimum policy you will need (remember to replace YOURBUCKET in the example with the actual name of your bucket).",
                "help" => [
                	'target' => 'footer',
                	'watch' => 'mcloud-storage-provider',
	                'data' => 'providerHelp',
                ],
	            "options" => [
	                "mcloud-storage-provider" => [
		                "title" => "Storage Provider",
		                "type" => "select",
		                "options" => "providerOptions",
	                ],
                ],
	            "hide-save" => true
            ],
			"ilab-media-cloud-provider-settings" => [
				"title" => "Provider Settings",
				"dynamic" => true,
				"options" => [],
			],
			"ilab-media-cloud-upload-handling" => [
				"title" => "Upload Handling",
                "dynamic" => true,
				"doc_link" => 'https://support.mediacloud.press/articles/documentation/cloud-storage/upload-handling-settings',
				"description" => "The following options control how the storage tool handles uploads.",
                "options" => [
	                "mcloud-storage-prefix" => [
		                "title" => "Upload Path",
		                "display-order" => 10,
		                "description" => "This will set the upload path to store uploads both locally and on cloud storage.  Leave blank to use the WordPress default of <code>Month/Day</code>.  For dynamically created paths, you can use the following variables: <code>@{date:format}</code>, <code>@{site-name}</code>, <code>@{site-host}</code>, <code>@{site-id}</code>, <code>@{versioning}</code>, <code>@{user-name}</code>, <code>@{unique-id}</code>, <code>@{unique-path}</code>, <code>@{type}</code>.  For the date token, format is any format string that you can use with php's <a href='http://php.net/manual/en/function.date.php' target='_blank'>date()</a> function.  WordPress's default upload path would look like: <code>@{date:Y/m}</code>.",
		                "type" => "upload-path"
	                ],
	                "mcloud-storage-subsite-prefixes" => [
		                "title" => "Subsite Upload Paths",
		                "display-order" => 11,
		                "description" => "This allows you to override the default upload path for individual subsites in your multisite network.  If left blank, that subsite will use your default upload path.  As with the <strong>Upload Path</strong> setting, you can use the following variables: <code>@{date:format}</code>, <code>@{site-name}</code>, <code>@{site-host}</code>, <code>@{site-id}</code>, <code>@{versioning}</code>, <code>@{user-name}</code>, <code>@{unique-id}</code>, <code>@{unique-path}</code>, <code>@{type}</code>.",
		                "type" => "subsite-upload-paths",
		                "multisite" => true,
	                ],
	                "mcloud-storage-upload-images" => [
		                "title" => "Upload Images",
		                "description" => "Upload image files to cloud storage.",
		                "display-order" => 12,
		                "type" => "checkbox",
		                "default" => true
	                ],
	                "mcloud-storage-upload-videos" => [
		                "title" => "Upload Video Files",
		                "description" => "Upload video files to cloud storage.",
		                "display-order" => 13,
		                "type" => "checkbox",
		                "default" => true
	                ],
	                "mcloud-storage-upload-audio" => [
		                "title" => "Upload Audio Files",
		                "description" => "Upload audio files to cloud storage.",
		                "display-order" => 14,
		                "type" => "checkbox",
		                "default" => true
	                ],
	                "mcloud-storage-upload-documents" => [
		                "title" => "Upload Documents",
		                "description" => "Upload non-image files such as Word documents, PDF files, zip files, etc.",
		                "display-order" => 15,
		                "type" => "checkbox",
		                "default" => true
	                ],
                    "mcloud-storage-ignored-mime-types" => [
                        "title" => "Ignored MIME Types",
                        "description" => "List of MIME types to ignore.  Any files with matching MIME types will not be uploaded.  You can also use wildcards.  For example <code>image/*</code> would disable uploading for any image.",
                        "display-order" => 16,
                        "type" => "text-area"
                    ],
                    "mcloud-storage-delete-uploads" => [
                        "title" => "Delete Uploaded Files",
                        "description" => "Deletes uploaded files from the WordPress server after they've been uploaded.",
                        "display-order" => 30,
                        "type" => "checkbox"
                    ],
	                "mcloud-storage-queue-deletes" => [
		                "title" => "Queue Deletes",
		                "description" => "When this option is enabled, uploads won't be deleted right away, they will be queued for deletion two to five minutes later.  This allows other plugins the ability to process any uploads before they are deleted from your WordPress server.  If <strong>Delete From Storage</strong> is disabled, this setting is ignored.",
		                "display-order" => 31,
		                "type" => "checkbox",
		                "default" => false
	                ],
	                "mcloud-storage-delete-from-server" => [
		                "title" => "Delete From Storage",
		                "description" => "When you delete from the media library, turning this on will also delete the file from cloud storage.",
		                "display-order" => 32,
		                "type" => "checkbox"
	                ],
	                "mcloud-storage-enable-big-size-threshold" => [
		                "title" => "Enable Big Size Threshold",
		                "description" => "WordPress 5.3 introduced a new feature that automatically resizes large image uploads to be 'web-ready'.  It essentially replaces your uploaded master image with a version scaled down to 2560x2560.  Use this toggle to enable or disable this feature.",
		                "display-order" => 40,
		                "wp_version" => ['>=', "5.3"],
		                "type" => "checkbox",
		                "default" => true,
	                ],
	                "mcloud-storage-big-size-threshold" => [
		                "title" => "Big Size Threshold",
		                "description" => "WordPress 5.3 introduced a new feature that automatically resizes large image uploads to be 'web-ready'.  Use this setting to control the threshold that triggers the resize.",
		                "display-order" => 41,
		                "wp_version" => ['>=', "5.3"],
		                "type" => "number",
		                "min" => 1024,
		                "max" => 100000,
		                "default" => 2560,
	                ],
	                "mcloud-storage-big-size-upload-original" => [
		                "title" => "Upload Original",
		                "description" => "WordPress 5.3 introduced a new feature that automatically resizes large image uploads to be 'web-ready'.  Use this setting to upload the unscaled original image to cloud storage.  If this is disabled and you have <strong>Delete Uploads</strong> enabled, the original file will not be deleted.",
		                "display-order" => 42,
		                "wp_version" => ['>=', "5.3"],
		                "type" => "checkbox",
		                "default" => true,
	                ],
	                "mcloud-storage-skip-import-other-plugin" => [
		                "title" => "Skip Importing From Other Plugins",
		                "description" => "Skip importing from other plugins like WP Offload Media, WP-Stateless and other cloud storage plugins.",
		                "display-order" => 50,
		                "type" => "checkbox",
		                "default" => false,
	                ],
                ]
			],
			"ilab-media-cloud-signed-urls" => [
				"title" => "Secure URL Settings",
				"description" => "These settings control how pre-signed URLs work.",
				"doc_link" => 'https://support.mediacloud.press/articles/documentation/cloud-storage/pre-signed-url-settings/',
				"dynamic" => true,
				"options" => [],
			],
            "ilab-media-cloud-cdn-settings" => [
                "title" => "CDN Settings",
	            "dynamic" => true,
	            "doc_link" => 'https://support.mediacloud.press/articles/documentation/cloud-storage/cdn-settings',
                "description" => "If you are using CloudFront, Fastly or another CDN, enter the CDN domain here.  If you are using Imgix, the <b>CDN Base URL</b> setting is ignored, but the <b>Document CDN Base URL</b> is not.  If both are left blank, Media Tools will use the cloud storage URLs.",
                "options" => [
                    "mcloud-storage-cdn-base" => [
                        "title" => "CDN Base URL",
                        "description" => "This is the base URL for your CDN for serving images, including the scheme (meaning the http/https part).  If you don't have a CDN, you can simply use the AWS S3 URL, eg <strong>https://s3-ap-southeast-1.amazonaws.com/your-bucket-name/</strong>.",
                        "type" => "text-field"
                    ],
                    "mcloud-storage-doc-cdn-base" => [
                        "title" => "Document CDN Base URL",
                        "description" => "This is the base URL for your CDN for serving non-image files, including the scheme (meaning the http/https part).  This is separated for your convenience.  If you don't specify a document CDN, it'll use the media/image CDN.",
                        "type" => "text-field"
                    ]
                ]
            ],
			"ilab-media-cloud-performance-settings" => [
				"title" => "Performance Settings",
				"description" => "",
				"options" => [
					"mcloud-storage-cache-lookups" => [
						"title" => "Cache Attachment Lookups",
						"description" => "When this is enabled, Media Cloud will cache the results of any database queries it performs to map a URL to an attachment ID so that it can dynamically generate the correct URL.  This should be left on as some of the queries that Media Cloud uses can be slow on sites with a large number of rows in the <code>wp_post</code> database table.  But, if you are having problems, you can turn it off to restore the previous behavior.",
						"type" => "checkbox",
						"default" => true
					],
				]
			],
			"ilab-media-cloud-display-settings" => [
				"title" => "Display Settings",
				"doc_link" => 'https://support.mediacloud.press/articles/documentation/cloud-storage/media-library-integration',
				"description" => "",
				"options" => [
					"mcloud-storage-display-badge" => [
						"title" => "Display Cloud Icon",
						"description" => "When this is selected, a cloud icon will be overlayed on items in the media library grid that have been uploaded to cloud storage.",
						"type" => "checkbox",
						"default" => true
					],
					"mcloud-storage-display-media-list" => [
						"title" => "Media List Integration",
						"description" => "When this is selected, an extra column will be added to the media library's list view, as well as bulk actions for importing.",
						"type" => "checkbox",
						"default" => true
					]
				]
			],
			"ilab-media-cloud-srcset-settings" => [
				"title" => "Responsive Image Settings",
				"description" => "Controls how responsive image tags are generated.",
				"options" => [
					"mcloud-storage-disable-srcset" => [
						"title" => "Disable srcset on image tags",
						"description" => "Gutenberg's image block, before WordPress 5.3, had a lot of issues and problems.  For example, which is still an issue in 5.3, WordPress omits the width and height attributes which is a really bad practice.  And it's also because of this that it's impossible to calculate a <code>srcset</code> that is realistic.  If you are using WordPress prior to 5.3, we recommend disabling <code>srcset</code> on image tags - <strong>but only if you use Gutenberg and WordPress version 5.2 or lower</strong>.  If you are using the Classic Editor, you do not need to disable this!",
						"type" => "checkbox",
						"default" => false
					],
					"mcloud-storage-replace-srcset" => [
						"title" => "Replace srcset on image tags",
						"description" => "MediaCloud can generate a more optimal <code>srcset</code> for image tags with WordPress versions greater than 5.3.  This is enabled by default, however if you are having issues, you should disable it to use WordPress's default <code>srcset</code> generation.  If <strong>Disable srcset on image tags</strong> is enabled, this setting will have no effect.  This setting only has an effect with post content via the classic editor or gutenberg blocks, it has no effect for image tags generated with <code>wp_get_attachment_image()</code>.",
						"type" => "checkbox",
						"wp_version" => ['>=', "5.3"],
						"default" => true
					]
				]
			]
		]
	]
];

