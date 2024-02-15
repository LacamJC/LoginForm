# LoginForm

### Descrição do Projeto

Este projeto é um sistema CRUD desenvolvido em PHP, utilizando a extensão PDO (PHP Data Objects) para estabelecer conexão com um banco de dados. O CRUD oferece operações básicas de manipulação de dados, incluindo criação, leitura, atualização e exclusão de registros.

### Funcionalidades Principais

- **Criação de Usuário**: Permite adicionar novos usuários ao sistema, fornecendo informações como nome de usuário, senha, etc.

- **Remoção de Usuário**: Possibilita a exclusão de usuários do banco de dados, removendo suas informações do sistema.

- **Lista de Todos os Usuários para Perfil de Administrador**: Exibe uma lista completa de todos os usuários registrados no sistema, proporcionando uma visão geral para usuários com privilégios administrativos.

- **Edição de Dados**: Permite a modificação de informações de usuários já existentes, possibilitando a atualização de dados como senha, nome, idade, etc.

## Usuarios Root e Default já existentes 
```bash
    // Perfil adminstrador
    Username = Root
    Password = 000000

    // Perfil Comum
    Username = JbDefault
    Password = 123456
```

## Para rodar este projeto localmente

- Caso use o xampp, procure a pasta htdocs e coloque a pasta deste projeto nela.
- Você precisa de permissões de root no seu banco para melhor eficiência.

## Altere os dados no arquivo connection.php

```php
$username = '<nome_do_seu_usuario>'; // Geralmente é root
$password = '<senha_do_seu_banco>';
$dbName = 'LoginForm'; // Mantenha este para criar automaticamente a tabela e o banco
$port = '3306'; // Esta é a porta padrão, mas caso use outra, altere.
$host = '127.0.0.1'; // Este está configurado para o localhost, mas caso possua um IP, coloque-o aqui.
```

## Aviso sobre os arquivos

Quando coloco este projeto no ar, utilizo o Railway, o que me faz ter que mudar certas configurações em alguns arquivos. Certifique-se de que não deixei estas configurações aqui.

### Verifique o arquivo verificaLogin.php

O arquivo deve estar configurado para a URL local desta maneira:

```php
//$url = 'https://loginform-production.up.railway.app//';
$url = 'http://localhost/LoginForm/';
```

### Verifique o arquivo home.php

```javascript
//url = 'https://loginform-production.up.railway.app//';
url = 'http://localhost/LoginForm/';
```