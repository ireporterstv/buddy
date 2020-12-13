

import sys
import os

os.chdir("C:/Users/sos/AppData/Roaming/Python/Python39/site-packages/")
sys.path.append("C:/Users/sos/AppData/Roaming/Python/Python39/site-packages/")

import bs4

#############################
# print ("aaaaaaaaaaaaa")
if __name__ == '__main__': 
	searchinput = sys.argv[1]
	searchinput = searchinput.replace(",,,", " ")


	print (sys.path)
	print (searchinput)
