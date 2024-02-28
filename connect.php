import mysql.connector

# Connect to the MySQL database
conn = mysql.connector.connect(
    host="localhost",
    user="root",
    password="",
    database="test"
)

# Create a cursor object to interact with the database
cursor = conn.cursor()

# Create the table if it doesn't exist
create_table_query = """
CREATE TABLE IF NOT EXISTS my_table (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    Cell VARCHAR(20),
    Email VARCHAR(255)
)
"""
cursor.execute(create_table_query)

# Insert 5 rows of data into the table
insert_query = """
INSERT INTO my_table (Name, Cell, Email) VALUES (%s, %s, %s)
"""
data = [
    ("John Doe", "1234567890", "john@example.com"),
    ("Jane Smith", "0987654321", "jane@example.com"),
    ("Alice Johnson", "1112223333", "alice@example.com"),
    ("Bob Brown", "4445556666", "bob@example.com"),
    ("Eve Taylor", "7778889999", "eve@example.com")
]
cursor.executemany(insert_query, data)

# Commit the transaction
conn.commit()

# Fetch all rows from the table
cursor.execute("SELECT * FROM my_table")
rows = cursor.fetchall()

# Display the fetched data
print("ID\tName\t\tCell#\t\tEmail")
for row in rows:
    print(f"{row[0]}\t{row[1]}\t{row[2]}\t{row[3]}")

# Close the cursor and connection
cursor.close()
conn.close()
