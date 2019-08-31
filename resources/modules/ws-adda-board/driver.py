import time
import ADS1256
import RPi.GPIO as GPIO
import numpy as np

try:
    ADC = ADS1256.ADS1256()
    ADC.ADS1256_init()

    data = np.array([0,0,0,0,0,0,0,0])

    i = 0
    while i<10:
        measurement = np.array(ADC.ADS1256_GetAll())
        data=np.sum([data, measurement], axis = 0)
        i+=1

    data = (data*5.0/0x7fffff)/10
    data_string = 'AD'

    for value in data:
        data_string += ' ' + str(value)

    print (data)

except :
   GPIO.cleanup()
   exit()
