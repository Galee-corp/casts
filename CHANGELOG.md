# Changelog

All notable changes to `casts` will be documented in this file.

## 1.0.0 - 2022-10-03

Includes the following Data types classes :

- **Amount** :
- 
- - Can be positive or negative
- - Converts from : `string`, `float`, `int`
- - Returns : `float` (with 2 decimals) or `int` when decimal is `0`
- 
- **ShortAmount** :
- 
- - Can be positive or negative
- - Converts from : `string`, `float`, `int`
- - Returns : `string` (with K,M,B,T suffix when value >= 1000)
- 
- **Percentage** :
- 
- - Can be positive or negative
- - Number rounded with 2 decimals
- - Converts from : `string`, `float`, `int`
- - Returns : `string` (with % suffix)
- 
- **Ratio** :
- 
- - Can be positive or negative
- - Number rounded with 2 decimals
- - Converts from : `string`, `float`, `int`
- - Returns : `float`
- 
