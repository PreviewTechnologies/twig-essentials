###Usage
Few useful extra functionality to work with your [Twig template engine](https://twig.symfony.com/) in your PHP application.

#####Installation
`composer require previewtechs/twig-essentials:dev-master`

Add `TwigExtras` extension to your Twig environment
```php
<?php
$twig->addExtension(new \Previewtechs\TwigEssentials\Extensions\TwigExtras());
```

In your view file, start using extension and other features.

#####Extensions

- **date_tzconvert**
  
  Convert date time to any timezone.
  
  `{{ created | date_tzconvert }}` will convert your date to your application's default timezone
  
  - Optional params. `date_tzconvert($toTimezone, $fromTimezone, $format)`