# parameters
Pacote para Laravel 5+ de parâmetros de aplicação

## instalação

- Crie uma pasta packages na raíz do projeto
- Clone este em packages/**AQUI**

##### Adicione o namespane no PSR-4

```
"autoload": {
        "psr-4": {
            ...
            "Blit\\": "packages/"
        },
```

##### Adicione o service provider config > app.php

```
Blit\Parameters\Providers\ParametersServiceProviders::class,
```

##### Migrate

```
php artisan migrate
```

##### Publique o arquivo de configuração e views (opcional)

```
php artisan vendor:publish --provider="Blit\Parameters\Providers\ParametersServiceProviders"
```

##### Aquivo de configuração

- Veja config/parameters.php

##### Views

- Veja resources/views/vendor/blit/parameters