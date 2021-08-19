import sys
import time
import telnetlib

host = '192.168.1.1'
port = 4002
remote = False

if len(sys.argv)>1:
    host = sys.argv[1]
    port = sys.argv[2]

if len(sys.argv)>3:
    remote = sys.argv[3]

try:
    tn = telnetlib.Telnet(host, port)


    # tn.write(chr(27).encode('ascii'))
    # time.sleep(1)
    if remote:
        tn.write("@4 MES\n".encode('ascii'))
    else:
        tn.write("@3 MES\n".encode('ascii'))
    time.sleep(1)
    data = tn.read_very_eager().decode('ascii')

    print(data)


except:
    exit()
