import sys
import time
import telnetlib

host = '192.168.1.1'
port = 4002

if len(sys.argv)>1:
    host = sys.argv[1]
    port = sys.argv[2]

try:
    tn = telnetlib.Telnet(host, port)


    tn.write("0R\n".encode('ascii'))
    tn.write("0R\n".encode('ascii'))
    time.sleep(1)

    data = tn.read_until(b"Vr", timeout = 3).decode('ascii')

    print(data)


except:
    exit()
