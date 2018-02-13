import time
from flask import *
import sys
import psycopg2

    
#NE PAS MODIFIER LA LIGNE SUIVANTE
app = Flask(__name__)
     
#Hello world basique
@app.route("/")
def hello(error=None):
    #return app.send_static_file("form.html")
    return render_template("form.html", hasError=error, rows=liste_mail())
    

#Hello world avec récupération de paramètres
@app.route("/hello/<name>")
def hello_name(name):
	data= "<b>Hello "+name+"</b>. Nous sommes le " + time.strftime("%d/%m/%Y")
	return data

@app.route("/after_form",methods=['POST'])
def after_form():
    print("I got it!")
    tabclient = display_client(request.form['prenom'])
    page = ''
    print("tabclient= ", tabclient)
    for i in tabclient:
        print(i)
        page += 'Nom: ' + i[1] + '<br />Prenom: ' + i[2] + '<br/>Adresse mail: ' + i[3] + '<br /><br />'
    return page

@app.route("/load")
def load():
    return app.send_static_file("nvclient.html")

@app.route("/load/sendData", methods=['POST'])
def saveData():
    nom = request.form['nom']
    prenom = request.form['prenom']
    mail = request.form['mail']

    test = nouveau_client(nom,prenom,mail)
    return "Ouah c'est sauvegardé Ôo"
    
def display_client(mail):
    # Try to connect to an existing database
    print('Trying to connect to the database')
    try:
        conn = psycopg2.connect("host=dbserver dbname=gdelacour user=gdelacour")
        print('Connected to the database')
        cur = conn.cursor()
        command = 'select * from hotel.client where mail = \'' + mail + '\';'
        print('Trying to execute the command: ' + command)
        try:
            # Query the database and obtain data as Python objects
            cur.execute(command)
            print("execute ok")
            #retrieve all tuple
            rows = cur.fetchall() #rows => tableau (les lignes du résultat) de listes (les différents attributs du resultat)
            print("fetchall ok")

            tabclient = rows
            
            #Close communication with the database
            cur.close()
            conn.close()
            return tabclient
        except Exception as e:
            return "error when running command: " + command + " : " + str(e)
    except Exception as e:
        return "Cannot connect to database: " + str(e)

def liste_mail():
    conn = psycopg2.connect("host=dbserver dbname=gdelacour user=gdelacour")
    try:
        print('Connected to the database')
        cur = conn.cursor()
        command = 'select mail from hotel.client'
        print('Trying to execute the command: ' + command)
        try:
            # Query the database and obtain data as Python objects
            cur.execute(command)
            print("execute ok")
            #retrieve all tuple
            rows = cur.fetchall() #rows => tableau (les lignes du résultat) de listes (les différents attributs du resultat)
            print("fetchall ok")

            tabclient = rows
            
            #Close communication with the database
            cur.close()
            conn.close()
            return tabclient
        except Exception as e:
            return "error when running command: " + command + " : " + str(e)
    except Exception as e:
        return "Cannot connect to database: " + str(e)

def nouveau_client(nom,prenom,mail):
    conn = psycopg2.connect("host=dbserver dbname=gdelacour user=gdelacour")
    try:
        cur = conn.cursor()
        try:
            cur.execute('INSERT INTO hotel.client (nom, prenom, mail) VALUES(%s,%s,%s)',(nom,prenom,mail))
            conn.commit()
            cur.close()
            conn.close()
        except Exception as e:
            return "error when adding a new client :" + str(e)
    except Exception as e:
        return "Cannot connect to database : " + str(e)

    
#NE SURTOUT PAS MODIFIER     
if __name__ == "__main__":
   app.run(debug=True)
