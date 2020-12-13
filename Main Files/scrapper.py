import sys
import os


os.chdir("C:/Users/sos/AppData/Roaming/Python/Python39/site-packages/")
sys.path.append("C:/Users/sos/AppData/Roaming/Python/Python39/site-packages/")

from bs4 import BeautifulSoup
import requests
import cloudscraper

#############################

searchinput = sys.argv[1]


#############################
#scraper = cloudscraper.create_scraper()
#scraper = cloudscraper.CloudScraper()

print (searchinput)

f = requests.get("https://en.wikipedia.org/w/index.php?search="+searchinput)
s = BeautifulSoup(f.content, 'html.parser')
f.close

if (len(s.findAll("div", {"class": "mw-search-result-heading"})) > 0) :
	firsturl = s.findAll("div", {"class": "mw-search-result-heading"})[0].findAll("a")[0]["href"]
	print(firsturl)

sys.stdout.flush()
