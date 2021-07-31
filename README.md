# Aprendizado com o projeto


Projeto realizado com um o curso de Api-Lumen da Alura (Excelendte curso introdutório). Durante este projeto realizei algumas anotações que consideirei importante no momento e gostaria de compartilha-las aqui: 


- Uma API devolve dados através do protocolo HTTP, muito usado para atender aplicações mobile ou desktop
- Podemos criar uma API com Laravel, e as rotas da API ficam no arquivo **api.php**
- O Laravel usa o prefixo `/api` nas rotas da API
- Uma coleção do **Eloquent** retornada no método no *Controller* se torna um JSON
- O **Lumen** é uma versão leve do Laravel específica para a criação de uma API
- Podemos agrupar rotas para definir características comuns (por exemplo, prefixo)
- O **Eloquent** fica desabilitado por padrão no Lumen, e podemos habilitá-lo no arquivo `bootstrap/app.php`

## Introdução ao REST

> Siginificado : Representational State Transfer

As nossas requisições possuem códigos específicos de status de resposta. Eles servem para indicar ao usuário/dev qual foi o resultado de sua requisição a aplicação.

No Lumen podemos trabalhar com uma resposta do tipo JSON . Desta forma além de informarmos quais os dados enviados nesta requisição, passamos também o **Status desta resposta.** 

Por exemplo o status 201 representa que o recurso foi criado em nossa aplicação;

Sempre responder em JSON para o cliente pois ele já espera este formato de arquivo em sua requisição. Desta forma mantemos a nossa api mais consistente. 

Nesta aula, aprendemos que:

- REST é um padrão arquitetural, que define regras como acessar/publicar um recurso
- O padrão arquitetural REST aproveita o máximo do protocolo HTTP
- Usamos as URLs, métodos, cabeçalhos e códigos para definir o acesso
- Através do objeto `Illuminate\Http\Request`, podemos ler os dados em JSON
- Através do método `response()`, podemos definir a resposta JSON e o código de resposta
- O código 201 significa `Created`, 204 significa `No Content` e 404 significa `Not Found`


### Accessors and Mutators:

São métodos de acesso semelhante aos getters e setters padrão da orientação a objetos. Entretanto eles acessam o array attribute da classe MODEL do eloquent. 

Os Mutators são os 'sets' e os Accessors são os Getters. vide documentação: 

[https://laravel.com/docs/8.x/eloquent-mutators](https://laravel.com/docs/8.x/eloquent-mutators)

Accessors, mutators, and attribute casting allows you to transform Eloquent attribute values when you retrieve or set them on model instances. For example, you may want to use the Laravel encrypter to encrypt a value while it is stored in the database, and then automatically decrypt the attribute when you access it on an Eloquent model. Or, you may want to convert a JSON string that is stored in your database to an array when it is accessed via your Eloquent model.

- As rotas podem ter grupos (como já vimos) e sub-grupos para não repetir nenhuma configuração
- A herança pode ser utilizada para reutilizar código entre *controllers*
- O ORM Eloquent possui *Accessors* e *Mutators*, para personalizar a forma de como os atributos são preenchidos e devolvidos
    - Para personalizar o *accessor*, podemos implementar o método `getNomeDoSeuAtributoAttribute($valor)`
    - Para personalizar o *mutator*, podemos implementar o método `setNomeDoSeuAtributoAttribute($valor)`

## Paginação

Nós ajudamos o cliente com informações sobre a navegação. Seja entre páginas ou entre recursos. Ou seja, enviamos informações além da mídia solicitada.

Dados que não são somente texto, ou seja, imagens, vídeos ou como no nosso caso, **links**, são comumente tratados como ***hypermidia***, ou **hipermídia**.

A utilização de hipermídia como o motor de uma API RESTful é muito comum e amplamente utilizada. Para este tipo de técnica, se deu o nome de *Hypermidia As The Engine Of the Application State*, ou, **HATEOAS**.

Este componente de uma API é o que diferencia o padrão REST de qualquer outro padrão de arquitetura. Fornecer informações para que o cliente consiga navegar entre os nossos recursos é extremamente útil e pode facilitar (e muito) a utilização da nossa solução.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
