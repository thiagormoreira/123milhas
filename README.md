<p align="center"><a href="#" target="_blank"><img src="https://aeroloy.com.br/wp-content/uploads/2019/12/Logo-123-Milhas.png" width="400"></a></p>

## Começando

Supondo que você já tenha instalado em sua máquina: PHP (> = 7.0.0).

``` bash
# Instalar dependências
composer install
```

Em seguida, inicie o servidor:

``` bash
php artisan serve
```

O projeto de teste da API de agrupamento agora está instalado e funcionando.
Acesse-o em:

``` bash
http://localhost:8000/
```


## Documentação Swagger

Para gerar a documentação, execute o seguinte comando no terminal, dentro da pasta principal do projeto.

``` bash
# Gerar documentação Swagger
php artisan l5-swagger:generate
```

Em seguida, acessa a seguinte URL:

``` bash
http://localhost:8000/api/documentation
```

# Teste Online

Conforme solicitado no teste, segue URL do teste hospedado na Heroku. Pode demorar um pouco para 
abrir pois utilizo o plano free.

``` bash
https://teste-1-2-3-milhas.herokuapp.com/
```

# Documentação online

Documentação Swagger online

``` bash
https://teste-1-2-3-milhas.herokuapp.com/api/documentation
```
