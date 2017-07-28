Rules
=====

Build castle based on printable ASCII characters.

The shape of the wall is the Cantor Set (see https://en.wikipedia.org/wiki/Cantor_set).

Cantor Set is made by repeating the following N times:

- Triple the current step
- Replace the middle one with blank space
- Add a full line below it

See four steps:

Step 1:
 
```*```

Step 2: 

```
* *
***
```

Step 3: 

```
* *   * *
***   ***
*********
```

Step 4: 

```* *   * *         * *   * *
***   ***         ***   ***
*********         *********
***************************
```
