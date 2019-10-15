import sys
import time
import telnetlib

host = '192.168.1.1'
port485 = 4002
port232 = 4001

if len(sys.argv)>1:
    host = sys.argv[1]
    port232 = sys.argv[2]
    port485 = sys.argv[3]

try:
    tn232 = telnetlib.Telnet(host, port232)
    tn485 = telnetlib.Telnet(host, port485)


    tn485.write("0@reset\n".encode('ascii'))
    time.sleep(2)
    tn485.close()

    tn232.write("link 1\n".encode('ascii'))
    time.sleep(1)
    data = tn232.read_until(b"LINK OPENED").decode('ascii')

    # tn232.write("open\n".encode('ascii'))
    # time.sleep(1)
    # tn232.read_until(b"PM>").decode('ascii')
    #
    # tn232.write("ALL\n".encode('ascii'))
    # time.sleep(1)
    # data = tn232.read_until(b"PM>").decode('ascii')


    tn232.close()

    print(data)


except:
    exit()
