import sys
import serial
import commands
import communications
import time

port = '/dev/ttyUSB0'

if len(sys.argv)>1:
    port = sys.argv[1]


try:
    conn = communications.open_serial(port=port, baudrate=9600, parity=serial.PARITY_NONE,
        bytesize=8, stopbits=1, timeout=0.5)


    i = 0
    t = True
    while t:
        i += 1
        data = commands.instant_vcp(conn, 1)
        print data
        print len(data)
        if len(data):
            break

        if i == 5:
            exit()

        sleep(1)

    data_string = 'POWER'

    for value in data:
        data_string += ' ' + str(value)

    print data_string;

except :
   exit()
