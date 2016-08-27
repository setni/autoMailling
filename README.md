About
=====

This script is using for growth hacking to do a mailing campaign.<br/>
It use the mail function of PHP.<br/>
It's done to simulate human behavior.<br/>

Usage
=====

- Add the name of the people your get from Linkedin in the text file. Separe items with ** as it's done on the example.<br/>
- Change the Variable below<br/>
```php
$nameFile = 'traitement.txt';
$yourAdress = 'name@domain.com';
$object = 'Object of your email';
$text = 'Text of your email (Better if it\'s HTML)';
$domain = '@companyDomain.com';

```
<br/>
- Launch the shell<br/>

```shell
$>cd /path/to/the/program/folder
$>php launch.php
```
<br/>
- 40 seconds separate each sending to simulate humain behavior.

