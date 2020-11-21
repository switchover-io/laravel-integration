# Switchover Laravel Integration

![CI](https://github.com/switchover-io/laravel-integration/workflows/CI/badge.svg)
[![codecov](https://codecov.io/gh/switchover-io/laravel-integration/branch/main/graph/badge.svg?token=IQNFOXJIWX)](https://codecov.io/gh/switchover-io/laravel-integration)

## Switchover

Switchover is a Software-As-A-Service for managing feature toggles (aka switches, flags or feature flips) in your application. Use it for Continous Integration, Continous Delivery, A/B-Testing, Canary Releases, Experementing and everything else you can think of.

__Note:__
Laravel integration of the Switchover PHP SDK. 

## Getting Started

### Install
Via composer:

```bash
composer require switchover/laravel-integration
```

### Configuration

The SDK-Key (can be found on the switchover environment page) can be specified as env variable in your `.env` file:

```bash
SWITCHOVER_SDK_KEY=<YOUR SDK KEY>
```

If you want to change the default cache time of 60 seconds you can also modify this via env variable:

```bash
SWITCHOVER_CACHE_TIME=10 # Warning: 0 will cache forever
```

### Basic Usage

The package exposes the `Switchover` facade to handle your feature toggles in the application. 

Example:
```php
class HomeController extends Controller
{

    public function index() {

        $userCtx = new Context([
            'email' => Auth::user()->email;
        ])
        
        $coolNewFeatures = Switchover::toggleValue('cool-feature', false, $userCtx);

        return //...
    }
}
```

## Advanced Configuration

You can also publish the underlying config file to get full control over the config e.g. for the Guzzle Http client:

```bash
php artisan vendor:publish --tag="switchover-config"
```

Now, you should have the `switchover.config` in your app config folder.
