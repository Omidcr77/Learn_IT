import mysql.connector

# Connect to database
servername = "localhost"
username = "root"
password = "hope22"
dbname = "IT_tables"

conn = mysql.connector.connect(
    host=servername,
    user=username,
    password=password,
    database=dbname
)

if conn.is_connected():
    # Get user input from form
    firstname = input("Enter your first name: ")
    lastname = input("Enter your last name: ")
    gender = input("Enter your gender: ")
    email = input("Enter your email: ")
    password = input("Enter your password: ")

    # Insert user data into table
    cursor = conn.cursor()
    sql = "INSERT INTO tabels (name, lastname, gender, email, password) VALUES (%s, %s, %s, %s, %s)"
    val = (firstname, lastname, gender, email, password)
    cursor.execute(sql, val)
    conn.commit()
    print(cursor.rowcount, "record inserted.")

    cursor.close()
    conn.close()
else:
    print("Connection failed.")
