# Example of query and mutation

List of content :

- [Auth](https://github.com/aronei44/laravel-graphql-jwt/new/main#auth)
- [User](https://github.com/aronei44/laravel-graphql-jwt/new/main#user)
- [Room](https://github.com/aronei44/laravel-graphql-jwt/new/main#room)
- [Message](https://github.com/aronei44/laravel-graphql-jwt/new/main#message)

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

## User 

### Query

- search users by id, name or email
```graphql
query{
  #choice one
  users(searchBy:{
    # id:1
    # name: "tes"
    email:"ing@gmail.com"
  }){
    id
    name
    email
  }
}
```

## Room 

### Query

- get all related room
```graphql
query{
  rooms{
    id
    self{
      id
      name
      email
    }
    opponent{
      id
      name
      email
    }
    messages{
      id
      body
      sender{
        id
        name
        email
      }
    }
  }
}
```

- get room by id
```graphql
query{
  room(id:3){
    id
    self{
      id
      name
      email
    }
    opponent{
      id
      name
      email
    }
    messages{
      id
      body
      sender{
        id
        name
        email
      }
    }
    error
  }
}
```

### Mutation

- create or check room if existing
```graphql
mutation {
  createNewRoom(form:{
    opponent:3
  }){
    id
    self{
      id
      name
      email
    }
    opponent{
      id
      name
      email
    }
  }
}
```

## Message

### Mutation

- create new message
```graphql
mutation{
  createMessage(form:{
    body:"testing guys"
    room_id:3
    message_id:1
  }){
    id
    sender{
      id
      name
      email
    }
    room{
      id
      self{
        id
        name
        email
      }
      opponent{
        id
        name
        email
      }
    }
    childs{
      body
      sender{
        id
        name
        email
      }
    }
    parent{
      id
      body
      sender{
        id
        name
        email
      }
    }
    error
    created_at
    updated_at
    status
  }
}
```







