from bs4 import BeautifulSoup
import requests
import sys
import cloudscraper

#############################

#searchinput = sys.argv[1]
searchinput = "iphone max"

#############################

scraper = cloudscraper.create_scraper()
f = scraper.get("https://www.bing.com/search?q="+searchinput+"&form=QBLH&sp=-1&pq=ip&sc=0-2&qs=n&sk=")
s = BeautifulSoup(f.content, 'html.parser')
f.close
# resultsquantity = s.findAll("span", {"class": "sb_count"})[0].text
resultsquantity = s.findAll("span", {"class": "sb_count"})[0].text
print(resultsquantity)
sys.stdout.flush()
