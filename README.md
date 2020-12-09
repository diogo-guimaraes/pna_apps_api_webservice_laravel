# PNA Publicidade


## Comandos Láravel :D

### Passport

```shell
$ php artisan passport:install
```

### Composer

```shell
$ composer install
```

### Gerar Keys

```shell
$ php artisan key:generate
```

### Criar (Migration, Controller, Resources)

```shell
$ php artisan make:model NomeModelo -mcr
```


### Criar todos (Model, Factory, Migration, Seeder, Controller) -para api

```shell
$ php artisan make:model NomeModelo --all --api
```

### Criar Controller -para api

```shell
$ php artisan make:controller NomeController --api
```

#### OBS.: Em casos de erros

> Caso ocorra um erro semelhante de Classe do Seeder não encontrada:

```shell
> php artisan db:seed
Seeding: EmpresaTableSeeder
Seeded:  EmpresaTableSeeder (0.07 seconds)

   Illuminate\Contracts\Container\BindingResolutionException 

  Target class [FormatoTableSeeder] does not exist.
```

> Apagar a pasta VENDOR e efetuar a instalação:

```shell
$ composer install
$ php artisan db:seed

Seeding: EmpresaTableSeeder
Seeded:  EmpresaTableSeeder (0.09 seconds)
Seeding: FormatoTableSeeder
Seeded:  FormatoTableSeeder (0.04 seconds)
Database seeding completed successfully.
```
#### exemplo de ternário"

> Retorna a string caso true : retorna false caso false

```php
  $veiculo_param_value = $data[$this->veiculo_param_str_key] == $this->veiculo_param_str_value ? 
  isset(
  $data[$this->veiculo_param_str_key]) ?
  $data[$this->veiculo_param_str_key] : false : false;
```




#### Paginate
```php
  {
    $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
  }
```
#### check is_double e format R$
```php
  {
    $valor = 6999.99; //FLoat
    $valorTotal = number_format($valor, 2, '.', ''); //

    if (is_float($valor)) {
      echo "is float\n";
    } else {
      echo "is not float\n";
    }

    if (is_string($valor)) {
      echo "is string\n";
    } else {
      echo "is not string\n";
    }

    echo number_format($valorTotal, 2, ',', '.');
  }
```

#### Acessar objeto
```php
  {

  //pegar id do último registro
  $insercao_store_id = new Insercao() ;
  $insercao_store_id = $insercao_store_id->get();
  $insercao_store_id[0]->id;

  $insercao_store_id = new Insercao() ;         
  $insercao_store_id = $insercao_store_id->orderBy('id', 'desc')->first();
  $insercao_store_id['id'];

  } 
```





 


   
