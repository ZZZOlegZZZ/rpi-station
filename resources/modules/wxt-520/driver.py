import sys
import time
import telnetlib

host = '192.168.1.1'
# host = '37.29.36.37'
port = 4002


if len(sys.argv)>1:
    host = sys.argv[1]
    port = sys.argv[2]

try:
    tn = telnetlib.Telnet(host, port)

    tn.write((chr(27)+chr(27)+chr(27)+"\r\n").encode('ascii'))
    time.sleep(1)
    tn.write("0R\r\n".encode('ascii'))
    time.sleep(2)


    data = tn.read_very_eager().decode('ascii')
    print(data)


except:
    exit()
