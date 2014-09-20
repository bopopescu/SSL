from flask import Flask, redirect, render_template, request, session
import mysql.connector

app = Flask(__name__)
app.secret_key='tardis'

@app.route('/')
def index():
	db=mysql.connector.connect(user='root',password='root',host='127.0.0.1',port='8889',database='fruits')
	cur=db.cursor()
	cur.execute('SELECT * from fruit_table')
	data= cur.fetchall()

	return render_template('day8/index.html', pagedata=data)

@app.route('/addform')
def showform():
	return render_template('day8/add.html')

@app.route('/addaction',  methods=['GET','POST'])
def addaction():
	db=mysql.connector.connect(user='root',password='root',host='127.0.0.1',port='8889',database='fruits')
	cur=db.cursor()

	name=request.form.get("name")
	color=request.form.get("color")

	cur.execute("INSERT INTO fruit_table VALUES ('',%s,%s)",(name,color))

	db.commit()

	return redirect('/')

@app.route('/delete',  methods=['GET','POST'])
def delete():
	db=mysql.connector.connect(user='root',password='root',host='127.0.0.1',port='8889',database='fruits')
	cur=db.cursor()

	fruitId=request.args['id']
	fruitIdStr=str(fruitId)

	delete="DELETE FROM fruit_table WHERE id="+fruitIdStr

	cur.execute(delete)

	db.commit()

	return redirect('/')

@app.route('/edit',  methods=['GET','POST'])
def edit():
	editName=request.args['name']
	editColor=request.args['color']
	editId=request.args['id']

	return render_template('day8/edit.html', id=editId, name=editName, color=editColor)

@app.route('/editaction',  methods=['GET','POST'])
def editaction():
	db=mysql.connector.connect(user='root',password='root',host='127.0.0.1',port='8889',database='fruits')
	cur=db.cursor()

	name=request.form.get("name")
	color=request.form.get("color")
	id=request.form.get("id")

	cur.execute("UPDATE fruit_table SET name=%s, color=%s WHERE id=%s",(name,color,id))

	db.commit()

	return redirect('/')

if __name__=='__main__':
	app.run(debug=True)