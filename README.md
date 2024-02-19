# Body Mass Index

Body Mass Index is a PHP library that accept height and weight as input and output may be healthy, underweight, overweight, obese.

## Installation

Use the composer to install.

```bash
composer require kyimyohan/body-mass-index
```

## Usage

```php
use Kyimyohan\BodyMassIndex\BodyMassIndex;

# returns 'healthy'
$height = 5.2;
$weight = 105
$bmi = BodyMassIndex::calculate($height, $weight)->getResult();
echo $bmi;
```

## Contributing

Pull requests are welcome. For major changes, please open an issue first
to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License

[MIT](./LICENSE.md)
