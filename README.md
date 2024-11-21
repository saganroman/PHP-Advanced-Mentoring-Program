# Framework Skeleton

## Requirements
- Docker with Docker Compose
- Composer for dependencies
- PSR-11 compatible service container
- Basic Routing with PSR-7 compliant request-response lifecycle
- Static code analyzers (PHPStan, PHP_CodeSniffer, Psalm) (not implemented yet)

## Setting Up
1. Clone the repository.
2. Run `docker-compose up --build` to start the environment.
3. Open `http://localhost:8000` in your browser.

## Registering a New Route
1. Add a new entry in `routes.php`, in the format `METHOD /path => 'Controller@action'`.
2. Create the corresponding controller in `src/controllers`.

## Static Code Analyzers
- PHPStan: `./vendor/bin/phpstan analyse src`
- PHP_CodeSniffer: `./vendor/bin/phpcs src`
- Psalm: `./vendor/bin/psalm`

## Running Tests

### Unit Tests
To run the unit tests, execute the following command:

```bash
vendor/bin/phpunit
```

### Behat Tests
To run the Behat tests, execute the following command:
- features - place your *.feature files here
- features/bootstrap - place your context classes here
- features/bootstrap/FeatureContext.php - place your definitions, transformations and hooks here

```bash
vendor/bin/behat
```