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
    tn.write(chr(27).encode('ascii'))
    tn.write(chr(27).encode('ascii'))
    tn.write(chr(27).encode('ascii'))
    tn.write("\n".encode('ascii'))

    time.sleep(1)

    tn.write("0R\n".encode('ascii'))
    time.sleep(1)

    data = tn.read_until(b"Vr=").decode('ascii')

    print(data)


except:
    exit()
