# HackerRank Java IP Range
https://www.hackerrank.com/challenges/java-regex/problem?isFullScreen=true
## Problema

Write a class called MyRegex which will contain a string pattern. You need to write a regular expression and assign it to the pattern such that it can be used to validate an IP address. Use the following definition of an IP address:
IP address is a string in the form "A.B.C.D", where the value of A, B, C, and D may range from 0 to 255. Leading zeros are allowed. The length of A, B, C, or D can't be greater than 3.

## Tarefa

In this problem you will be provided strings containing any combination of ASCII characters. You have to write a regular expression to find the valid IPs.
Just write the MyRegex class which contains a String pattern. The string should contain the correct regular expression.
(MyRegex class MUST NOT be public)

## Formato de Entrada

Examples: <br>
000.12.12.034 <br>
121.234.12.12 <br>
23.45.12.56 <br>
00.12.123.123123.123 <br>
122.23 <br>
Hello.IP

## Formato de Saída

Examples: <br>
true <br>
true <br>
true <br>
false <br>
false <br>
false
