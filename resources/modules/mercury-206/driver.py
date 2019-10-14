import serial
import commands
import communications
import utils

try:
    conn = communications.open_serial(port='/dev/ttyUSB0', baudrate=9600, parity=serial.PARITY_NONE,
        bytesize=8, stopbits=1, timeout=0.5)

    data = commands.instant_vcp(conn, 1)

    data_string = 'POWER'

    for value in data
        data_string += ' ' + str(value)

    print data_string;

except :
   exit()
