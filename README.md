
# Desafio HOSTCHE


### Instalação e configuração do Sistema

Clone o projeto que está na branch Master e logo após instale as dependências com o seguinte comando :
```bash
  composer install 
```
Configure o banco de dados, adicionando um arquvio .env com os seguintes campos:
```
  database.default.hostname = localhost
  database.default.database = agro
  database.default.username = [sua configuração]
  database.default.password = [sua configuração]
  database.default.DBDriver = [sua configuração]
  database.default.port = [sua configuração]
```

E logo após, crie um banco de dados chamado "agro" e adicione suas tabelas a partir dos seguintes comandos:
```
    php spark db:create agro
    php spark migrate
```

Logo após, populeo banco de dados na seguinte ordem:

```
  php spark db:seed
    categorias
    clientes
    empresas
    produtos
```

Logo após, execute o comando:
```
  php spark serve
```
Para inicializar servidor php do projeto.


## Execução
Todas as rotas para utilizar a parte do usuário está em: http://localhost:8080/pages  Devido que os arquivos html's estão salvos na pasta public/pages.

No sistema é possível fazer:
- Registro
- Login
- Busca de empresas que vendem seus produtos agrícolas
- Cadastro da própria empresas
- Adicionar, Remover e Editar produtos
- Vizualizar os produtos através de uma tabela dinâmica
- Extrair para formato de PDF os registros dos produtos
- Dados de compradores que compraram produtos na empresa do usuário logado
- Adicionar produtos ao carrinho de compras
- Comprar o produto

# Possíveis melhorias futuras
- Extração mais aprofundada de dados de comprantes
- Gráficos de monitoramento das vendas da empresa
- Contratação de funcionários
