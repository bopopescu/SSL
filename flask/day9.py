from flask import Flask, redirect, render_template, request, jsonify
import mysql.connector
import json
import urllib2

app = Flask(__name__)

@app.route('/')
def index():
	db=mysql.connector.connect(user='root',password='root',host='127.0.0.1',port='8889',database='fruits')
	cur=db.cursor()
	cur.execute('SELECT name, color from fruit_table')
	# data= cur.fetchall()
	data = {
		"name":"joe",
		"phone":{"primary":"1234567890"}
	}

	return jsonify(data)

@app.route('/getjson')
def jsonin():
	url = "http://maps.googleapis.com/maps/api/geocode/json?address=WinterPark,FL"
	loadurl = urllib2.urlopen(url)
	data = json.loads(loadurl.read().decode(loadurl.info().getparam('charset')))
	formatAddress = data["results"][0]["formatted_address"]

	return "<b style='font-size: 20px;''>Your location: </b>"+formatAddress

if __name__=='__main__':
	app.run(debug=True)


# import random
# print random.randint(0, 5)

# import random
# myList = [2, 109, False, 10, "Lorem", 482, "Ipsum"]
# random.choice(myList)

# import random
# print "choice([1, 2, 3, 5, 9]) : ", random.choice([1, 2, 3, 5, 9])
# print "choice('A String') : ", random.choice('A String')