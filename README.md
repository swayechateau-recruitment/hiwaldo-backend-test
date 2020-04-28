# Waldo Backend PHP Developer Test

These scripts present a problem related to sorting large datasets in PHP 7.
To execute the task, you should use your console to execute `script.php` using the PHP CLI.

In the data directory, you will find two files with junk personal data in them, `junk-data.json` and `junk-data-full.json`.
These files are referenced in the `$dataFiles` array in `script.php`. The `script.php` file utilizes the `BrokenSort` class,
which implements the `SortInterface` interface. `script.php` expects the class to read data from either one of these files,
and sort the values according to the `registered` attribute, in ascending order.

The `BrokenSorter` class is successfully able to sort and parse the `junk-data.json`, however, it will fail when using
`junk-data-full.json`.

Your task is to create a new implementation of the `SortInterface`, that is able to successfully
read and parse the `junk-data-full.json` data file (100,000 records) and dump each item to the console, in ascending
order, according to the `registered` attribute. You should not change the max memory allocation.

**Note:** Try to imagine how you would solve this problem if you encountered it in real life. You are free to use any
PHP bolt-ons / additions you find via composer, or any external software applications.  If you do so, please note which
ones and why you've chosen to use them.

Please direct any questions to callum@hiwaldo.com

## Estimated Time To Complete
1-2 Hours. Please let us know how long you spent on the task when submitting your code.
