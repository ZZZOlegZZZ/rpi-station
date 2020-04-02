import sqlite3
import json

dbconn = sqlite3.connect('/var/www/vhosts/rpi-station/database/rpi-station.sqlite')
cursor = dbconn.cursor()

power = cursor.execute("SELECT json_extract(settings, '$.power') from configurations").fetchall()[0][0]

print (type(int(power)))


# if power>0:
#     last_data = cursor.execute(
#         """SELECT
#             measured_at,
#             json_extract(data, '$.t_air'),
#             json_extract(data, '$.humidity'),
#             json_extract(data, '$.pressure'),
#             json_extract(data, '$.uv'),
#             json_extract(data, '$.light')
#         from plugin_wh24p"""
#     ).fetchall[0]
#     print(last_data)
