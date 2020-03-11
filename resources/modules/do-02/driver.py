import sys
import time
import telnetlib

host = '192.168.1.1'
port = 4001

if len(sys.argv)>1:
    host = sys.argv[1]
    port = sys.argv[2]

try:
    tn = telnetlib.Telnet(host, port)

    tn.write("M0\r\n".encode('ascii'))
    time.sleep(3)

    data = tn.read_very_eager().decode('ascii')

    print(data)
    tn.write("r\r\n".encode('ascii'))


except:
    exit()
