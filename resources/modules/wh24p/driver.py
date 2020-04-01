import sqlite3
import json

dbconn = sqlite3.connect('/var/www/vhosts/rpi-station/database/rpi-station.sqlite')
cursor = dbconn.cursor()

power = cursor.execute("SELECT json_extract(settings, '$.power') from configurations").fetchall()[0][0]
print (power)
