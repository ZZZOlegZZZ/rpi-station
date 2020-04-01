import serial
import sqlite3
import json
import sys
# from datetime import datetime, date, time

port = '/dev/ttyUSB0'

if len(sys.argv)>1:
    port = sys.argv[1]

conn = serial.Serial(port, 9600, timeout=0.1)

dbconn = sqlite3.connect('/var/www/vhosts/rpi-station/database/rpi-station.sqlite')
cursor = dbconn.cursor()

cursor.execute('SELECT json_extract(data, "$.accumulation_rainfall") FROM plugin_wh24p ORDER BY id DESC LIMIT 1;')
lastData = cursor.fetchall()
last_acc_rainfall = lastData[0][0];


cursor.execute('DELETE from plugin_wh24p;')
dbconn.commit()

while True:
    result = conn.readline().hex()

    if len(result) == 42:

        print(result)


        wind_bits=''
        wind_bytes = result[4:7]
        for i in range(len(wind_bytes)):
            wind_bits+=bin(int(wind_bytes[i],16))[2:].zfill(len(wind_bytes[i])*4)
        wind_bits = wind_bits[8] + wind_bits[:8]
        wind_dir = int(wind_bits,2)

        t_air = (int(result[7:10], 16) - 400)/10

        humidity = int(result[10:12], 16)

        wind_speed = (int(result[12:14], 16)/8)*1.12

        wind_gusts = int(result[14:16], 16)*1.12

        accumulation_rainfall = int(result[16:20], 16) * 0.3

        uv = int(result[20:24], 16)

        light = int(result[24:30], 16)/10

        pressure = int(result[34:40], 16)/100

        rainfall = 0 if last_acc_rainfall==None else accumulation_rainfall-last_acc_rainfall

        print('wind_dir =', wind_dir)
        print('t_air =', t_air)
        print('humidity =', humidity)
        print('wind_speed =', wind_speed)
        print('wind_gusts =', wind_gusts)
        print('accumulation_rainfall =', accumulation_rainfall)
        print('uv =', uv)
        print('light =', light)
        print('pressure =', pressure)

        data = {
            "t_air": t_air,
            "humidity": humidity,
            "wind_speed": wind_speed,
            "wind_gusts": wind_gusts,
            "wind_dir": wind_dir,
            "uv": uv,
            "light": light,
            "pressure": pressure,
            "accumulation_rainfall": accumulation_rainfall,
            "rainfall": rainfall
        }

        last_acc_rainfall = accumulation_rainfall

        cursor.execute("insert into plugin_wh24p (data) VALUES(?)",
            [json.dumps(data)]
        )
        dbconn.commit()
