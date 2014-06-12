Creates a web page that lists HTML links to videos inside a directory of your choosing. I suggest creating a symlink from your video directory into your webroot or location accessible by your web server, and then set the proper FollowSymLinks options. I use Apache2, but I don't see any reason for this to not work with other web servers such an Nginx or Lighttpd.

Please note that there are options at the beginning of the file to set your page Title and the directory for video files.

I created this script because I wanted a very easy way to stream videos from my file server to my Android tablet. I recommend the VLC Android app, but this also works decently well with the streaming features of most browsers. Of course, it works equally as well for streaming to regular computers (again, my preferred media player is VLC)

Screenshot:
![Screenshot](https://raw.githubusercontent.com/mstathers/video-list-website/master/screenshot.png)
