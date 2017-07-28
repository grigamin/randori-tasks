Rules
======

Let's say you are provided with a string of printable ASCII characters (without new lines).

E.g. the string `abcd` has the following rotations:
`abcd, bcda, cdab, dabc`
(each character is moved to the end until we reach the last character).

How to draw the stairs?
-----------------------
1. Place each rotation on top of each other:
`abcd
bcda
cdab
dabc`

2. Add the required number of spaces to each rotation in order to build the stairs:
`
abcd   
 bcda   
  cdab   
   dabc  
`

3. Final step - build the stairs in the opposite side in reverse order. Notice the spaces!

```
abcd      dcba
 bcda    adcb 
  cdab  badc  
   dabccbad   
```
