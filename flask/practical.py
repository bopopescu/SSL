from flask import Flask, redirect, render_template, request, jsonify
import mysql.connector
import json
import urllib2

app = Flask(__name__)

@app.route('/')
def index():
	url = "http://localhost:8888/ssl/flask/practical.php"
	loadurl = urllib2.urlopen(url)
	data = json.loads(loadurl.read())
	image = data[0]["image"]
	link = data[0]["link"]

	return render_template('practical/index.html', d=image, l=link)

	url = ""
	loadurl = urllib2.urlopen(url)
	data = json.loads(loadurl.read().decode(loadurl.info().getparam('charset')))
	formatAddress = data["results"][0]["formatted_address"]


if __name__=='__main__':
	app.run(debug=True)