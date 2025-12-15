#!/bin/bash

curl -LO "https://downloads.wordpress.org/plugin/wp-ses.1.7.2.zip"
curl -LO "https://downloads.wordpress.org/plugin/all-in-one-wp-security-and-firewall.5.4.4.zip"
curl -LO "https://downloads.wordpress.org/plugin/404-to-301.3.1.5.zip"
curl -LO "https://downloads.wordpress.org/plugin/black-studio-tinymce-widget.2.7.3.zip"
curl -LO "https://downloads.wordpress.org/plugin/google-analytics-for-wordpress.9.10.1.zip"
curl -LO "https://downloads.wordpress.org/plugin/ilab-media-tools.4.6.4.zip"
curl -LO "https://downloads.wordpress.org/plugin/siteorigin-panels.2.33.4.zip"
curl -LO "https://downloads.wordpress.org/plugin/post-types-order.zip"
curl -LO "https://downloads.wordpress.org/plugin/redirection.5.5.2.zip"
curl -LO "https://downloads.wordpress.org/plugin/redux-framework.4.5.9.zip"
curl -LO "https://downloads.wordpress.org/plugin/remove-protected-in-title.zip"
curl -LO "https://downloads.wordpress.org/plugin/so-widgets-bundle.1.70.3.zip"
curl -LO "https://downloads.wordpress.org/plugin/smart-passworded-pages.zip"
curl -LO "https://downloads.wordpress.org/plugin/the-events-calendar.6.15.12.2.zip"
curl -LO "https://downloads.wordpress.org/plugin/insert-headers-and-footers.2.3.1.zip"
curl -LO "https://downloads.wordpress.org/plugin/duplicate-post.4.5.zip"

unzip -qq -d wp-content/plugins/ \*.zip
rm *.zip