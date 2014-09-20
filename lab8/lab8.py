from flask import Flask, redirect, render_template, request, session
app = Flask(__name__)
app.secret_key='tardis'
#routing

user = dict()
user['username'] = "admin"
user['password'] = "admin"

@app.route('/')
def index():
    sessname='na'

    if session.has_key('loggedin'):
        sessname = session['loggedin']

    return render_template('lab8/landing.html',error="")

@app.route('/login', methods=['GET','POST'])
def login():
    uname = request.args['name']
    password = request.args['password']
    if(uname == user['username'] and password == user['password']):
        return render_template('lab8/user.html',name = user['username'])
    else:
        return render_template('lab8/landing.html',error = "Something isn't right")

@app.route('/logout')
def logout():
    return render_template('lab8/landing.html',error="")


if __name__=='__main__':
    app.run(debug=True)