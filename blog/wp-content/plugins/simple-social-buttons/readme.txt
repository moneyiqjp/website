=== Plugin Name ===
Contributors: xradar
Donate link: https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=UD823RE2F623Q&lc=US&item_name=WP%20Simple%20Social%20Buttons&item_number=Support%20Open%20Source&no_note=1&no_shipping=1&currency_code=USD&bn=PP%2dDonationsBF%3abtn_donate_SM%2egif%3aNonHosted
Tags: facebook, google, twitter, pinterest, plus one, like it, like, share, pin, pin it
Requires at least: 2.8
Tested up to: 3.8
Stable tag: 1.7.8

Insert and customize social buttons: Facebook Like it, Google plus +1, Twitter share, Pinterest Pin it. Share your content with friends.

== Description ==

Simple Social Buttons adds to your posts social network buttons, such as: **Facebook "Like it!"**, **Google plus on "+1"**, **Twitter share** and **Pinterest Pin it**. Plugin is fully customizable. You can decide where to put those buttons:

- Buttons above the post content 
- Buttons under the post content
- Buttons above and under the post

That's not all. Simple Social Buttons can also add social media buttons to:

- Static Pages
- Front Page
- Posts Categories
- Date Archives
- Tags Archives

Want's more? Now you can change the **order of buttons** on your post!

Let your visitors share your content with friends and let them **promote your blog**. Facebook, Google Plus, Pinterest and Twitter are the most popular social networks nowadays. Don't miss the opportunity, and help publish your content and links to those social media networks.

Simple Social Buttons is currently in the following languages:

- Danish 
- Dutch
- English
- French 
- German
- Lithuanian
- Polish
- Serbo-Croatian
- Slovak
- Spanish
- Swedish
- Thai 
- Ukrainian 

For more information about Wordpress and SEO, visit my blog [Rabinek.pl](http://www.rabinek.pl/ "Paweł Rabinek - Blog SEO") (in polish) and my company [RedSEO](http://www.redseo.pl/ "RedSEO") (in polish).
Also check my free SEO audit tool [Seoptimer.com - Website Review](http://www.seoptimer.com/ "Free SEO Audit tool").

== Installation ==

1. Download the latest version of Simple Social Buttons
2. Upload folder named simple-social-buttons to the /wp-content/plugins/ directory
3. Activate the plugin through the 'Plugins' menu in WordPress
4. (Optional) Customize the buttons in the Settings > Simple Social Buttons menu

That's it. Buttons will show on your blog posts.

You can also use this plugin directly in your template by function `<?php get_ssb([$order]); ?>`, where `$order` is a string with args ( example: `$order = "googleplus=1&fblike=2&twitter=3"` ) or an array ( example: `$order = array('googleplus' => 1, 'fblike' => 2, 'twitter' => 3)` ). If you would like to hide a specified button, you should set order to "0".


== Frequently Asked Questions ==

= Is the plugin free? =

Yes, it's free. I hope you like it :) If so you can buy me a coffee by doing paypal donate.

= Is the plug will be developed? =

Yes. I've some plans about developing Simple Social Buttons. There will be more buttons, more customization, and more powerfull! Follow me on Twitter [@rabinek](http://twitter.com/rabinek "Paweł Rabinek na Twitter") and stay tuned.

= Why use this plugin? =

This plugin automatically adds the Facebook Like button, Google plus one +1, Twitter share button and Pinterest Pin for each post on your blog. This is the simples and effective way to promote your blog in social media networks.

= How about support? =

Use [plugin's forum](http://wordpress.org/support/plugin/simple-social-buttons "Forum") to ask about plugin or report some problems. 

= Is there a template tag for custom install? =

Yes, you can use `<?php get_ssb(); ?>` in your template file (see installation section). Default instalation don't require that. 

= Facebook button doesn't appear? =

Make sure you have set WPLANG in wp-config.php file. Correct values are "en_US" for english, "el_GR" for greek, "pl_PL" for polish etc. 

= Who helped to improve Simple Social Buttons? = 

**Big thanks to:** 

- Karol from [LigaBBVA.pl](http://www.ligabbva.pl/ "Liga hiszpańska BBVA") for PHP developement
- [@RhooManu](http://twitter.com/RhooManu "RhooManu on Twitter") for french translation
- [Usability Idealist](http://usability-idealist.de/ "Fabian Wolf - Usability Idealist") for converting code to object-oriented, adding buttons order and many fixes
- [@Dennis Schreiber](http://twitter.com/flammbar "Dennis Schreiber on Twitter") for german translation
- [@Marcos González](http://twitter.com/qmarcos "Marcos on Twitter") for spanish translation 
- [Vincent G](http://www.host1free.com/ "Web Hosting") for lithuanian translation
- [Mads Phikamphon](http://www.genvejen.dk/ "Mads blog") for danish translation 
- [Na's mad](http://nasmad.dk/ "Na's mad blog") for thai translation 
- [WebHostingGeeks.com](http://webhostinggeeks.com/blog/ "Webhosting Geeks") for slovak translation 
- [WPdiscounts](http://wpdiscounts.com/ "WPdiscounts") for dutch translation
- [Web Hosting Hub](http://www.webhostinghub.com/ "Webhostinghub") for serbo-croatian translation
- [Michael Yunat](http://getvoip.com/blog "http://getvoip.com") for ukrainian translation

== Screenshots ==

1. All buttons before the content
2. Widget in post edition
3. Plugin settings page


== Changelog ==

= 1.0 =
* First stable release.

= 1.1 =
* Added french translation
* Added language support in Facebook and Google+ JavaScript

= 1.2.1 =
* Optimized settings storage

= 1.3 =
* Converted plugin to class (requires PHP 5, because it is using the constructor auto-method)
* Added sorting options
* Added uninstall hook
* Fixed plugin settings slot not being highlighted in the admin navigation / general settings
* Added "disable regular CSS" option to let advanced users use their own CSS code
* Lots of fine-tuning

= 1.4 =
* Added custom meta to disable SSB plugin on sigle page/post (managed in admin menu)
* Function get_ssb() to directly use in template to show Simple Social Buttons in specified order
* Widget manage page in wp-admin available only for Administrator
* Added German and Spanish translation
* Fine-tuning

= 1.5 = 
* New asynchronous JS code
* Minor bug fixed


= 1.5.1 =
* Added lithuanian translation

= 1.5.2 =
* Bug fix from 1.5.1

= 1.5.4 =
* Facebook "Like it" fix (added id="fb-root" instead of class="fb-like")

= 1.5.5 =
* Added danish translation 

= 1.5.6 =
* Added thai translation
* fixed Facebook language detection 

= 1.6.0 =
* Added Twitter via @username option
* Added Pinterest button
* Some bug fixes

= 1.6.2 =
* Added slovak translation

= 1.6.3 = 
* Fixed CSS class names ("buttom" to "button")
* Fixed facebook Like box cut off

= 1.6.4 = 
* Used "Roles and Capabilities" in admin access

= 1.6.5 =
* Added dutch translation
* Added serbo-croatian translation

= 1.6.6 =
* Update for Wordpress 3.8

= 1.7.0 =
* Fixed margin-right for buttons
* Pinterest button code update

= 1.7.2 =
* New sreenshots of plugin

= 1.7.3 =
* New description and donation link
* New polish and english translation

= 1.7.4 =
* Fixed position of Facebook "Like" button

= 1.7.5 =
* Added ukrainian translation 

= 1.7.7 =
* Added swedish translation 

= 1.7.8 =
* Fixed PHP warning
