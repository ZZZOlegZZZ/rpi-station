import sqlite3
import json

dbconn = sqlite3.connect('/var/www/vhosts/rpi-station/database/rpi-station.sqlite')
cursor = dbconn.cursor()

power = cursor.execute("SELECT json_extract(settings, '$.power') from configurations").fetchall()[0][0]

if int(power)>0:
    last_data = cursor.execute(
        """SELECT
            measured_at,
            json_extract(data, '$.t_air'),
            json_extract(data, '$.humidity'),
            json_extract(data, '$.pressure'),
            json_extract(data, '$.uv'),
            json_extract(data, '$.light')
        from plugin_wh24p
        order by measured_at desc limit 1"""
    ).fetchall()[0]

    accumulated_data = cursor.execute(
        """SELECT
            avg(json_extract(data, '$.wind_dir')),
            avg(json_extract(data, '$.wind_speed')),
            max(json_extract(data, '$.wind_gusts')),
            sum(json_extract(data, '$.rainfall'))
        from plugin_wh24p
        where measured_at > DATETIME(datetime("now","-%s minute"))""" % (power)
    ).fetchall()[0]

print("t_air " + str(round(float(last_data[1]), 1)))
print("humidity " + str(round(float(last_data[2]), 1)))
print("pressure " + str(round(float(last_data[3])/1.333, 1)))
print("uv " + str(round(float(last_data[4]), 0)))
print("light " + str(round(float(last_data[5]), 1)))
print("wind_dir " + str(round(float(accumulated_data[0]), 0)))
print("wind_speed " + str(round(float(accumulated_data[1]), 1)))
print("wind_gusts " + str(round(float(accumulated_data[2]), 1)))
print("precipitation_type " + "1" if float(accumulated_data[3]) > 0 else "0")
print("precipitation_amount " + str(round(float(accumulated_data[3]), 1)))
