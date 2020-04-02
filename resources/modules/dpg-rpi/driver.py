#!/usr/bin/python
#--------------------------------------
import os
data = {}
def gettemp(id):
  try:
    mytemp = ''
    filename = 'w1_slave'
    f = open('/sys/bus/w1/devices/' + id + '/' + filename, 'r')
    line = f.readline() # read 1st line
    crc = line.rsplit(' ',1)
    crc = crc[1].replace('\n', '')
    if crc=='YES':
        line = f.readline() # read 2nd line
        adr = line.split(' ')
        mytemp = line.rsplit('t=',1)
        pos = adr[2]
        cal = adr[3]
        cal = int(cal,16)
        if cal >127:
            cal = cal -256
        cal = cal / 16.0
        if abs(cal)>1:
            cal = 0
        term = round(int(mytemp[1])/1000.0 + cal,2)
        if abs(int(pos,16))<=10:
            data.update({int(pos,16):term})
    else:
        mytemp = -99
    f.close()
    return 0
  except:
    return -99
if __name__ == '__main__':
    for t in os.listdir("/sys/bus/w1/devices/"):
        if t != "w1_bus_master1":
            gettemp(t)
    for key in sorted(data.keys()):
        print("%s: \t%s" % (key, data[key]))
