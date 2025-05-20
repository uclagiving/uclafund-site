#!/bin/bash

curl -LO "https://downloads.wordpress.org/plugin/wp-ses.1.7.2.zip"
curl -LO "https://downloads.wordpress.org/plugin/all-in-one-wp-security-and-firewall.5.4.0.zip"
curl -LO "https://downloads.wordpress.org/plugin/404-to-301.3.1.4.zip"
curl -LO "https://downloads.wordpress.org/plugin/black-studio-tinymce-widget.2.7.3.zip"
curl -LO "https://downloads.wordpress.org/plugin/google-analytics-for-wordpress.9.5.3.zip"
curl -LO "https://downloads.wordpress.org/plugin/ilab-media-tools.4.6.4.zip"
curl -LO "https://downloads.wordpress.org/plugin/siteorigin-panels.2.31.8.zip"
curl -LO "https://downloads.wordpress.org/plugin/post-types-order.2.3.5.zip"
curl -LO "https://downloads.wordpress.org/plugin/redirection.5.5.2.zip"
curl -LO "https://downloads.wordpress.org/plugin/redux-framework.4.5.7.zip"
curl -LO "https://downloads.wordpress.org/plugin/remove-protected-in-title.zip"
curl -LO "https://downloads.wordpress.org/plugin/so-widgets-bundle.1.68.4.zip"
curl -LO "https://downloads.wordpress.org/plugin/smart-passworded-pages.zip"
curl -LO "https://downloads.wordpress.org/plugin/the-events-calendar.6.13.0.zip"
curl -LO "https://downloads.wordpress.org/plugin/insert-headers-and-footers.2.2.8.zip"
curl -LO "https://downloads.wordpress.org/plugin/duplicate-post.4.5.zip"

unzip -qq -d wp-content/plugins/ \*.zip
rm *.zip