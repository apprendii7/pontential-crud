# pontential-crud
 A CRUD API JSON REST with methods ​GET​, ​POST​, ​PUT​, DELETE​

:: A instalação é só importar o banco e passar os arquivos do sistema para a pasta do servidor php,

:: As configurações do banco estão em api/Models/Developer.php, foi testado no php 7.2.14

:: Não fiz autenticação na api com token por que é apenas para demonstração, mas na maioria dos casos, sei que tem que fazer

:: Deixei logo que abre no client carregando tudo sem paginação de propósito para demonstrar a solicitação de mostrar tudo na requisição

:: Depois pode filtrar no client com querystring e paginação na requisição

:: O exemplo de filtrar apenas com id na api está no client quando clica pra editar e abre o form, ali requisita a api para usar o get id apenas

:: No client o put do editar faz ao clicar no botão confirmando a edição o adicionar usa o post

:: Ao deletar chama delete na API normalmente também

:: A páginação é de 5 a 5 itens pra facilitar o teste simples