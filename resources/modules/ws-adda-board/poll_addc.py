#!/usr/bin/python
# -*- coding:utf-8 -*-

import time
import ADS1256
import RPi.GPIO as GPIO
import numpy as np
import sqlite3

conn = sqlite3.connect('/var/sqlite/rpi-station.sqlite')

#try:
x=True
while x:
    ADC = ADS1256.ADS1256()
    ADC.ADS1256_init()

    data = np.array([0,0,0,0,0,0,0,0])

    i = 0
    while i<10:
        measurement = np.array(ADC.ADS1256_GetAll())
        data=np.sum([data, measurement], axis = 0)
        i+=1

    data = (data*5.0/0x7fffff)/10
    data_insert = 'AD'

    for value in data:
        data_insert += ' ' + str(value)

    conn.execute("INSERT INTO module_raw_data (module, data) VALUES('ws-adda-board','{}')".format(data_insert))
    conn.commit()
    conn.close()
    x=False

#except :
#    GPIO.cleanup()
#    print ("\r\nProgram end     ")
#    exit()
