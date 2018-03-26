TWITTER2HTML 1.0
http://www.twitter2html.com/

This script is designed to be a simple way to get your tweets onto your own site.
The options are few, but the installation is simple.

Copyright MickMel, Inc. -- http://www.mickmel.com/

This script is completely free to use.

The feed parsing portion of this script based off of EasyFeeder from CalendarScripts:
http://calendarscripts.info

The Twitter API piece came from the Twitter Development Talk group on Google Groups:
http://groups.google.com/group/twitter-development-talk


-------------------
SERVER REQUIREMENTS
-------------------

PHP with cURL enabled.  Most hosts have that enabled by default, but if not you're out of luck.


------------
INSTALLATION
------------
Upload the entire twitter2html folder to your webserver


-------------
CONFIGURATION
-------------

Edit the twitter2html.php file and modify the first four items:

- USERNAME -- your username on twitter
- PASSWORD -- your password on twitter
- MAXITEMS -- how many items you want the script to output
- SCRIPTURL -- the exact location where you load this script, including "http://" and the trailing slash ("/") at the end.
It should look something like "http://www.yoursite.com/twitter2html/".


--------
TEMPLATE
--------

By default, the template will show the date/time of the tweet, followed by the tweet text.
If you don't like messing with templates, it should do fine for you.  However, if you want,
you can also have it include a link to the tweet or rearrange the other items.

The three variables you can use are:
- {itemlink} -- This will put out something like "http://twitter.com/username/statuses/12341234" that link to the tweet in question
- {created_at} -- Date and time of the tweet
- {text} -- The text of the tweet


-----
USAGE
-----

Just use PHP include to put the twitter2html output on any page that you'd like.

If your page name ends with ".php", you can just do this wherever you want your tweets to appear:


<?php
include("twitter2html/twitter2html.php");
?>



So, in the middle of your code it might look something like this:


<html>
<head>
<title>your page</title>
</head>
<body>
Welcome to my page!  Check out my latest tweets!<br /><br />

<?php
include("twitter2html/twitter2html.php");
?>

View my twitter profile <a href="http://twitter.com/myusername/">here</a>

</body>
</html>


If you have any questions, contact us on our site:
http://www.twitter2html.com/