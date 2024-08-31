# Brute force equation solver

![Screen](screen.png)

## Usage

```shell
php solve.php EQUATION [UNIQUE_ONLY = 0]
```

```shell
php solve.php "d + cd + bcd + abcd == 6666"

9 + 19 + 319 + 6319 == 6666
9 + 19 + 819 + 5819 == 6666
```

```shell
php solve.php "a + b == 2" 0

0 + 2 == 2
1 + 1 == 2
2 + 0 == 2
```

```shell
php solve.php "a + b == 2" 1

0 + 2 == 2
2 + 0 == 2
```
