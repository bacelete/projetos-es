# HackerRank Java Currency Formatter
https://www.hackerrank.com/challenges/java-currency-formatter/problem?isFullScreen=true
## Problema

Given a double-precision number, payment, denoting an amount of money, use the NumberFormat class' getCurrencyInstance method to convert payment into the US, Indian, Chinese, and French currency formats. 
Then print the formatted values as follows: <br>

![image](https://github.com/user-attachments/assets/f804abb8-74ef-4f6c-b723-392823cb37c5)

where formattedPayment is payment formatted according to the appropriate Locale's currency. <br>
Note: India does not have a built-in Locale, so you must construct one where the language is en (i.e., English).

## Formato de Entrada

A single double-precision number denoting payment. <br><br>
Example: <br>
12324.134

## Formato de Saída

On the first line, print US: u where is payment formatted for US currency. <br>
On the second line, print India: i where is payment formatted for Indian currency. <br>
On the third line, print China: c where is payment formatted for Chinese currency. <br>
On the fourth line, print France: f, where is payment formatted for French currency. <br><br>
Example: <br>
![image](https://github.com/user-attachments/assets/f5783974-17a0-4e46-b7f0-620e41d46cb4)
