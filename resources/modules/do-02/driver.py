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

    tn.write("M0\n".encode('ascii'))

    data = tn.read_all().decode('ascii')

    print(data)


except:
    exit()
