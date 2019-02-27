---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)

<!-- END_INFO -->

#general
<!-- START_53be1e9e10a08458929a2e0ea70ddb86 -->
## Responsible for correct displaying of index page

> Example request:

```bash
curl -X GET -G "/" 
```

```javascript
const url = new URL("/");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET /`


<!-- END_53be1e9e10a08458929a2e0ea70ddb86 -->

<!-- START_ea8bfc5f0d983c55fd996951225d9ce3 -->
## /api/random
> Example request:

```bash
curl -X GET -G "/api/random" 
```

```javascript
const url = new URL("/api/random");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/random`


<!-- END_ea8bfc5f0d983c55fd996951225d9ce3 -->

<!-- START_a88564d7fb032350e4d4c50bc5f8619b -->
## /api/random/{number: -?[1-9]+[0-9]*|0}
> Example request:

```bash
curl -X GET -G "/api/random/{number: -?[1-9]+[0-9]*|0}" 
```

```javascript
const url = new URL("/api/random/{number: -?[1-9]+[0-9]*|0}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/random/{number: -?[1-9]+[0-9]*|0}`


<!-- END_a88564d7fb032350e4d4c50bc5f8619b -->

<!-- START_df4adee82e2fcce1751f6a0d235f62ab -->
## /api/{category: [A-Za-z]+}
> Example request:

```bash
curl -X GET -G "/api/{category: [A-Za-z]+}" 
```

```javascript
const url = new URL("/api/{category: [A-Za-z]+}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/{category: [A-Za-z]+}`


<!-- END_df4adee82e2fcce1751f6a0d235f62ab -->

<!-- START_1081a9d2440bfab60060b0d433c05d03 -->
## /api/{category: [A-Za-z]+}/{number: -?[1-9]+[0-9]*|0}
> Example request:

```bash
curl -X GET -G "/api/{category: [A-Za-z]+}/{number: -?[1-9]+[0-9]*|0}" 
```

```javascript
const url = new URL("/api/{category: [A-Za-z]+}/{number: -?[1-9]+[0-9]*|0}");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/{category: [A-Za-z]+}/{number: -?[1-9]+[0-9]*|0}`


<!-- END_1081a9d2440bfab60060b0d433c05d03 -->

<!-- START_ef79740d4e35b9a964713f7c58bbff82 -->
## Returns 404 HTTP NOT FOUND response page

> Example request:

```bash
curl -X GET -G "/error/404" 
```

```javascript
const url = new URL("/error/404");

let headers = {
    "Accept": "application/json",
    "Content-Type": "application/json",
}

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```

> Example response:

```json
null
```

### HTTP Request
`GET /error/404`


<!-- END_ef79740d4e35b9a964713f7c58bbff82 -->


