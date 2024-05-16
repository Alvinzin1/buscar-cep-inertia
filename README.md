# Sistema de Busca de CEP com Laravel, Inertia, Bootstrap, Vue.js e Vite

Este é um sistema web desenvolvido utilizando PHP com o framework Laravel, juntamente com as tecnologias Inertia.js, Bootstrap, Vue.js e Vite, para realizar consultas à API ViaCep (https://viacep.com.br/). O objetivo principal é permitir que os usuários verifiquem se um CEP é válido e, opcionalmente, possam armazenar esse CEP em um banco de dados.

Este projeto foi desenvolvido como parte do curso da [Digital Innovation One (DIO)](https://digitalinnovation.one/), onde os alunos aprenderam a construir aplicações web modernas com as tecnologias mais recentes. Acesse meu [Perfil](https://www.dio.me/users/gabrielsouzacontato_99)

## Funcionalidades

1. **Consulta de CEP**: Os usuários podem inserir um CEP no campo de busca e o sistema realizará uma consulta à API ViaCep para verificar se o CEP é válido e trará informações detalhadas sobre o endereço correspondente.

2. **Armazenamento de CEP**: Após a verificação de validade, os usuários têm a opção de salvar o CEP no banco de dados do sistema para referência futura. Isso pode ser útil para registrar endereços de entrega frequentemente utilizados ou para análises estatísticas.

## Requisitos de Instalação

- PHP (compatível com Laravel)
- Composer
- Node.js
- npm ou Yarn

## Como Instalar

1. Clone este repositório para o seu ambiente local.
2. Execute `composer install` para instalar as dependências do Laravel.
3. Copie o arquivo `.env.example` para `.env` e configure as variáveis de ambiente, incluindo a conexão com o banco de dados.
4. Execute `php artisan key:generate` para gerar a chave de aplicativo.
5. Execute `npm install` ou `yarn install` para instalar as dependências do Node.js.
6. Execute `npm run dev` ou `yarn dev` para compilar os assets do frontend.
7. Execute `php artisan migrate` para migrar as tabelas do banco de dados.
8. Inicie o servidor Laravel executando `php artisan serve`.

## Tecnologias Utilizadas

- **Laravel**: Framework PHP para construção de aplicativos web robustos e escaláveis.
- **Inertia.js**: Permite construir aplicativos de página única (SPA) com o poder do Laravel e Vue.js, sem a necessidade de uma API REST separada.
- **Bootstrap**: Framework de front-end para desenvolvimento rápido e responsivo.
- **Vue.js**: Biblioteca JavaScript para construção de interfaces de usuário interativas.
- **Vite**: Build tool para desenvolvimento rápido de aplicações web modernas.

## Estrutura do Projeto

```
buscarcep-laravel
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   ├── lang/
│   └── views/
├── routes/
├── storage/
├── tests/
└── vendor/
```

## Contribuição

Contribuições são bem-vindas! Sinta-se à vontade para enviar pull requests ou abrir issues relatando problemas ou sugestões de melhorias.

Esse README fornece um guia básico para começar a usar o sistema de busca de CEP. Certifique-se de adaptá-lo conforme necessário para atender às especificidades do seu projeto.

## Licença

Este projeto é licenciado sob a [MIT License](https://opensource.org/licenses/MIT).
