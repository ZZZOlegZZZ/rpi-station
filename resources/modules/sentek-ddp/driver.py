import serial.tools.list_ports
import serial
import time
from ctypes import *

def convert(s):
    i = int(s, 16)                   # convert from hex to a Python int
    cp = pointer(c_int(i))           # make this into a c integer
    fp = cast(cp, POINTER(c_float))  # cast the int pointer to a float pointer
    return fp.contents.value

dbconn = sqlite3.connect('/var/www/vhosts/rpi-station/database/rpi-station.sqlite')
cursor = dbconn.cursor()

config = cursor.execute("SELECT json_extract(config, '$.port') from expansion_modules where alias='sentek-ddp'").fetchall()[0]

if not config:
    exit(0)

port = config[0]
ser = serial.Serial(port, 9600, stopbits=serial.STOPBITS_TWO,bytesize=serial.SEVENBITS, parity = serial.PARITY_NONE, timeout=0.8)


ser.write(b':010600000002F7\r\n')
ser.read(100).decode('ascii')
time.sleep(1)

ser.write(b':01040180000C6E\r\n') # temperature
temperature = ser.read(100).decode('ascii')
if len(temperature)>42:
    print ('ST '
        + str(round(convert(temperature[11:15]+temperature[7:11]),2)) + ' '
        + str(round(convert(temperature[19:23]+temperature[15:19]),2)) + ' '
        + str(round(convert(temperature[27:31]+temperature[23:27]),2)) + ' '
        + str(round(convert(temperature[35:39]+temperature[31:35]),2)) + ' '
        + str(round(convert(temperature[43:47]+temperature[39:43]),2)) + ' '
        + str(round(convert(temperature[51:55]+temperature[47:51]),2)))
else:
     print ('ST -99 -99 -99 -99 -99 -99')

ser.write(b':01040100000CEE\r\n') #moisture
moisture = ser.read(100)

if len(moisture)>42:
    print ('SM '
        + str(round(convert(moisture[11:15]+moisture[7:11]),2)) + ' '
        + str(round(convert(moisture[19:23]+moisture[15:19]),2)) + ' '
        + str(round(convert(moisture[27:31]+moisture[23:27]),2)) + ' '
        + str(round(convert(moisture[35:39]+moisture[31:35]),2)) + ' '
        + str(round(convert(moisture[43:47]+moisture[39:43]),2)) + ' '
        + str(round(convert(moisture[51:55]+moisture[47:51]),2)))
else:
    print ('SM -99 -99 -99 -99 -99 -99')
