# Sistema de Gerenciamento de Usuários e Cores

CRUD desenvolvido em PHP puro para gerenciar usuários e cores, permitindo vincular múltiplas cores a cada usuário.

## Tecnologias

- PHP 8.4
- SQLite com PDO
- Tailwind CSS
- Arquitetura MVC

## Estrutura do Projeto

```
├── config/
│   └── connection.php         
├── controllers/
│   ├── UserController.php      
│   └── ColorController.php     
├── models/
│   ├── User.php                
│   └── Color.php               
├── views/
│   ├── users/                  
│   ├── colors/                 
│   └── partials/               
├── database/
│   └── db.sqlite
├── migrations/
└── seeds/
```

## O que foi implementado

**Usuários**
- Criar, editar, listar e excluir usuários
- Vincular várias cores a um usuário
- Quando salva, sincroniza automaticamente as cores
- Validação dos campos obrigatórios

**Cores**
- Gerenciamento completo de cores
- Visualização das cores em cada usuário

## Decisões técnicas

Preferi seguir o padrão MVC para organizar o código, separando bem as responsabilidades. A conexão com o banco usa PDO com prepared statements evitando SQL injection, e nas views uso `htmlspecialchars()` para impedir tentativas de XSS.

O relacionamento many-to-many entre usuários e cores é gerenciado através do método `syncColors()`, que remove e recria as associações sempre que o usuário é criado ou atualizado.

Implementei o padrão POST-Redirect-GET nos controllers para evitar reenvio de formulários, e o index.php funciona como front controller, roteando todas as requisições.

## Rotas principais

```
GET  /index.php?controller=user&action=list              
GET  /index.php?controller=user&action=form              
GET  /index.php?controller=user&action=form&id={id}      
POST /index.php?controller=user&action=save              
GET  /index.php?controller=user&action=delete&id={id}    

GET  /index.php?controller=color&action=list             
GET  /index.php?controller=color&action=form             
GET  /index.php?controller=color&action=form&id={id}     
POST /index.php?controller=color&action=save             
GET  /index.php?controller=color&action=delete&id={id}   
```

## Observações

A classe `Connection` usa o padrão Singleton para manter uma única conexão durante toda a execução. Os models implementam os métodos básicos de CRUD, e o `User` possui metodos adicionais para trabalhar o relacionamento com as cores.

O layout é responsivo e usa Tailwind via CDN. 