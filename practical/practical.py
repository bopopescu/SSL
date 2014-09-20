from flask import Flask, redirect, render_template, request, jsonify
import mysql.connector
import json
import urllib2

app = Flask(__name__)

@app.route('/')
def index():
	db=mysql.connector.connect(user='root',password='root',host='127.0.0.1',port='8889',database='ads')
	cur=db.cursor()
	cur.execute('SELECT image, link from additems ORDER BY rand() LIMIT 0,1')
	data= cur.fetchall()

	image = str(data[0][0])
	# link = str(data[1])

	jsonData = jsonify(data)

	return render_template('practical/index.html', d=image)

if __name__=='__main__':
	app.run(debug=True)