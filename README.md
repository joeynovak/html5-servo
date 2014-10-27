html5-servo
===========

Javascript Library build on riffwave.js to allow you to control hobby servos connected via the headphone jack of a computer or mobile device via HTML5

Note: I hacked this out in 90 minutes 'cause I needed it and couldn't find anything like it.  It is definitly not up to my level of quality and completness.  But I figured it woudl be better to share what I have even though it's ghetto then to not share it 'cause it ain't perfect.

Special Thanks to Pedro Ladaria over at http://www.codebase.es/  Without his work on riffwav.js, this wouldn't exist.

If you use this to make something, PLEASE drop me a note and/or pics.  Not much in this life makes me happier then knowing I helped someone else make something cool.

Usage
===========

>   ServoJs.moveTo(channel, position (0-100));

(Channels aren't implemented yet...  Right now it's mono, and the channel is ignored)

Hardware
===========
See: http://makezine.com/projects/make-34/smartphone-servo/
All the devices I tested didn't produce enough voltage at full volume to manipulate the servo, so I connected the internal audio amp from a cheap set of powered speakers between my phone, and the servos.
  
History
-----------
I created this project for a Halloween Carnival our Church put on.  The idea, was that kids would shoot a diy safe crossbow at a target and if they hit the target, flames would shoot out the top. (By triggering a servo that was connected to a spray can of electronics fluid pointed at a pilot light).  The ondevicemotion js event was used to detect a sudden movement of an old Android phone and move the servo.
I crash coded, and got it to it's current state in about 90 minutes.  I would have gotten more done, but my laptop had some "sound enhancement" thing from Toshiba turned on that was turning my 1.5ms square wave into a 1.5ms long tone..

Current State
-----------

None of the options in ServoJS work.  They are there, some of them are respected, but it really only works for a single channel.

Servo's don't like an intermitent pwm signal.  They want to be continuously told what position they should be in.  Re-writing this into a worker perhaps, and some way to instantly start and stop different pwm waves would be nice.

ToDo
-----------
* Refactor settings to a settings object, and implement all settings.
* Implement Multiple Channels
* Implement a continuous pwm signal.