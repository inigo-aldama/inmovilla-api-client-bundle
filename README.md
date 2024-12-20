
# Inmovilla API Client Bundle

[![Latest Version](https://img.shields.io/badge/version-1.0.0-blue)]()
[![PHP](https://img.shields.io/badge/php-%5E7.4%20%7C%7C%20%5E8.0-blue)]()
[![Symfony](https://img.shields.io/badge/symfony-%5E5.4%20%7C%7C%20%5E6.0-green)]()
[![License](https://img.shields.io/badge/license-MIT-green)](LICENSE)

`inmovilla-api-client-bundle` is a Symfony package designed to integrate and simplify the use of the [`inmovilla-api-client`](https://github.com/inigo-aldama/inmovilla-api-client) library within Symfony applications. It provides simplified configuration and pre-configured services to interact with the Inmovilla API.

> **Note:** This project is not affiliated with Inmovilla.

---

## Features

- Direct integration with `inmovilla-api-client`.
- Simplified configuration through Symfony configuration files.
- Ready-to-use dependency injection for services and controllers.
- Predefined repositories for entities like cities, zones, and properties.

---

## Requirements

- **PHP**: 7.4 or higher.
- **Symfony**: 5.4 or higher.
- **Composer**: For dependency management.

---

## Installation

Install the package using Composer:
```bash
composer require inigo-aldama/inmovilla-api-client-bundle
```

Register the bundle automatically (Symfony Flex will handle it by default) or add it manually in `config/bundles.php`:
```php
return [
    // Other bundles...
    Inmovilla\ApiClientBundle\InmovillaApiClientBundle::class => ['all' => true],
];
```

---

## Configuration

Configure the API parameters in the `config/services.yaml` file or `.env`:

### YAML Configuration
Add the following parameters in `config/packages/inmovilla_api_client.yaml`:
```yaml
inmovilla_api_client:
    api_url: "https://api.inmovilla.com/v1"
    domain: "your-domain.com"
    agency: "your-agency"
    password: "your-password"
    language: 1
```

### .env Configuration
Alternatively, use environment variables in `.env`:
```env
INMOVILLA_API_URL="https://api.inmovilla.com/v1"
INMOVILLA_DOMAIN="example.com"
INMOVILLA_AGENCY="my-agency"
INMOVILLA_PASSWORD="my-password"
INMOVILLA_LANGUAGE=1
```

The `inmovilla.api_client_config` service will be created automatically with this configuration.

---

## Usage

### Repository Injection

Repositories are ready to use in your services and controllers:
```php
namespace App\Controller;

use Inmovilla\Repository\CiudadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MyController extends AbstractController
{
    private CiudadRepository $ciudadRepository;

    public function __construct(CiudadRepository $ciudadRepository)
    {
        $this->ciudadRepository = $ciudadRepository;
    }

    public function index()
    {
        $cities = $this->ciudadRepository->findAll();
        // Do something with the cities
    }
}
```

### Customizing Repositories

You can extend existing repositories to add specific logic:
```php
namespace App\Repository;

use Inmovilla\Repository\PropiedadRepository;

class CustomPropertyRepository extends PropiedadRepository
{
    public function findWithGarage(): array
    {
        return $this->findBy(['garage' => true]);
    }
}
```

---

## Available Services

The following services are available in the container:
- `Inmovilla\ApiClient\ApiClientInterface`: Main API client.
- `Inmovilla\Repository\CiudadRepository`: Repository for cities.
- `Inmovilla\Repository\ZonaRepository`: Repository for zones.
- `Inmovilla\Repository\PropiedadRepository`: Repository for properties.
- `Inmovilla\Repository\PropiedadFichaRepository`: Repository for property details.

---

## Testing

Run the tests to validate the bundle:
```bash
./vendor/bin/phpunit --testdox
```

---

## Contribution

1. Fork the repository.
2. Create a new branch (`git checkout -b feature/new-feature`).
3. Commit your changes (`git commit -m 'Add new feature'`).
4. Push to your branch (`git push origin feature/new-feature`).
5. Open a pull request.

---

## License

This project is licensed under the [MIT License](LICENSE).

---

## Credits

- **Author**: Iñigo Aldama Gómez
- **Repository**: [inmovilla-api-client-bundle](https://github.com/inigo-aldama/inmovilla-api-client-bundle)
