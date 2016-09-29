Penn Manor Speed Dial
==============
This repository contains all code related to the 'Speed Dial' quick access page.

This webpage is the default homepage for the fleet of current district computers.

About the code
--------------
- `index.html` is the current main page.
- `veritime.html` provides links for all building
staff to access the time-clock system.
- `twitter.html` provides info caching for the OAUTH
twitter widget.
- `php/twittercron.php` is the script to pull recent Twitter tweets
- `php/twittercronphp.sh` is the file to be used in a cronjob

There is a branch titled `sanitized` which does not contain any external link
references. This branch may and should be used in the event of an external
internet outage. Simply run `git checkout sanitized` to select this version.

Uploading changes
----------------
Any additional links are welcome. Changes are
encouraged to try to balance links between the
available two columns, and insert by alphebetical
order.

License
----------------
	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.
	
	This program is distributed in the hope that it will be useful, but
	WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY
	or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License
	for more details.
