# Example of query and mutation

List of content :

- [Auth](https://github.com/aronei44/laravel-graphql-jwt/new/main#auth)

## Auth

### Mutation

- register new user
```graphql
mutation{
  register(form:{
    name:"testing123"
    email:"testing@gmail.com"
    password:"testing123"
  }){
    id
    name
    email
    created_at
    updated_at
  }
}
```
- login into existing account
```graphql
mutation{
  login(form:{
    email:"testing@gmail.com"
    password:"testing123"
  }){
    access_token
    expires_in
    token_type
  }
}
```

### Query

- get user logged data
```graphql
query{
  whoAmI{
    id
    name
    email
    created_at
    updated_at
  }
}
```
