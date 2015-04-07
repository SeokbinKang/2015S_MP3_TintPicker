# 2015S_MP3_TintPicker
Mini Project 3 - Tint Picker 
CMSC838:Tangible Interactive Computing by Jon Froehlich, University of Maryland College Park
Overview
=====
Don't miss your favorite colors on the street. Tint Picker is a tangible color picker that allows you to save any colors in your life and build your color palette to use in the future design, painting, or fun. Tink Picker is a remake of microphone toy which originally alters or exaggerates user's voice. We break down the toy and replace microphone and PCB controller with RGB sensor and Arduino Blend Micro respectively. Tint Picker sensors RGB/light value at its tip and send the data to application server through Bluetooth embedded in Arduino Blend Micro. Our application visualizes the color picked with colorful balls and presents the recent colors at your palette.

Source Code
-----
 Arduino\tcs34725autorange\tcs34725autorange.ino
   : Arduino code for sensing color and sending it to application through Bluetooth 4.0

 Webapplication\palette.php
   : User application to visualize colors collected by Tink Picker. Written in PHP

 Webapplication\update.php
   : Background color date update page. This updates color database with a http request.
  

Hardware Component
-----

Running Environment
-----
  Aruduino : Blend Micro or Any arduino board equipped with bluetooth
  Web : Php/Mysql
  
  
Test
-----
  Build on Windows8/64bit
  Tested on Readbear Blend Micro
  

