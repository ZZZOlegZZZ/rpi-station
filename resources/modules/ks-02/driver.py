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


    tn.write(chr(27).encode('ascii'))
    time.sleep(1)
    tn.write("poll\n".encode('ascii'))

    data = tn.read_until(b"IM_DPG").decode('ascii')

    #tn.write("hist del\n".encode('ascii'))

    print(data)


except:
    exit()
