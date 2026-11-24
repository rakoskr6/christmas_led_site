#!/usr/bin/python

##### This script should start the tree if running and stop if not running


import subprocess
import ast
import sys

### Tried to import the led_interface.py and run it from here 
### (so it's easy to update the dictionary while running)
### But couldn't get it to import

#sys.path.append('/home/pi/led_strips/')
#import led_interface


### Tried to do a subprocess call 
### but weird path stuff and difficult to update led_config.cfg from here

#subprocess.call("/home/pi/led_strips/led_strips.sh", shell=True)
#subprocess.call("/home/pi/led_strips/led_interface.py", shell=True)

#try:
#	with open('/home/pi/led_strips/led_config.cfg', 'r') as fd:
		# this is dangerous but whatever
#		config = ast.literal_eval(fd.read())
#except Exception as e:
#	print("Error reloading config: " + str(e))
#	raise

#config["mode"] = "static"


print("you did it!")