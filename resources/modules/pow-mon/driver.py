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
    # print("LINK OPENED")


    # tn232.write("\n".encode('ascii'))
    # time.sleep(1)
    # data = tn232.read_until(b"ENTER OPEN>").decode('ascii')
    # print("ENTER OPEN")

    tn232.write("open\n".encode('ascii'))
    time.sleep(1)
    tn232.read_until(b"PM>").decode('ascii')
    # print("PM")

    tn232.write("ALL\n".encode('ascii'))
    time.sleep(1)
    data = tn232.read_until(b"PM>").decode('ascii')
    # print("ALL")

    tn232.write(3*chr(27).encode('ascii'))
    time.sleep(1)
    tn232.read_until(b"LINK CLOSED").decode('ascii')
    # print("closed")


    tn232.close()

    print(data)
except:
    exit()
