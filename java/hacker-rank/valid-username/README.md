# HackerRank Java IP Range
https://www.hackerrank.com/challenges/valid-username-checker/problem?isFullScreen=true
## Problema

You are updating the username policy on your company's internal networking platform. According to the policy, a username is considered valid if all the following constraints are satisfied:
* The username consists of 8 to 30 characters inclusive. If the username consists of less than 8 or greater than 30 characters, then it is an invalid username.
* The username can only contain alphanumeric characters and underscores (_). Alphanumeric characters describe the character set consisting of lowercase characters [a-z], uppercase characters [A-Z], and digits [0-9].
* The first character of the username must be an alphabetic character, i.e., either lowercase character [a-z] or uppercase character [A-Z].

## Tarefa

In this problem you will be provided strings containing any combination of ASCII characters. You have to write a regular expression to find the valid IPs.
Just write the MyRegex class which contains a String pattern. The string should contain the correct regular expression.
(MyRegex class MUST NOT be public)

## Formato de Entrada

The first line of input contains an integer n, describing the total number of usernames. Each of the next n lines contains a string describing the username. The locked stub code reads the inputs and validates the username. <br>

![image](https://github.com/user-attachments/assets/c145021c-1142-4a34-8128-90bcd91297b9)

Examples: <br>
8 <br>
Julia <br>
Samantha <br>
Samantha_21 <br>
1Samantha <br>
Samantha?10_2A <br>
JuliaZ007 <br>
Julia@007 <br>
_Julia007

## Formato de Saída

Invalid <br>
Valid <br>
Valid <br>
Invalid <br>
Invalid <br>
Valid <br>
Invalid <br>
Invalid
