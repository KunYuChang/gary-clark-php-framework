# gary-clark-php-framework

## 前端控制器（The Front Controller）

在許多框架中，特別是像 Laravel 這樣的 PHP 框架中，Front Controller 主要是為了管理路由系統而存在的。在這些框架中，所有的 HTTP Request 都會先通過 Front Controller，然後由它來解析 URI 或其他相關的請求資訊，最後根據路由配置來決定將請求路由到哪個控制器或處理器進行處理。

這樣的設計使得路由系統變得統一和易於管理。開發者可以在一個地方集中配置路由規則，並且可以使用各種靈活的方式來定義路由規則，例如通過路由群組、中介軟體等。同時，這樣的設計也使得框架能夠更好地支持諸如路由緩存、路由命名等高級功能。

## 在容器中運行 composer 指令

```bash
docker compose up -d
docker compose exec app composer dump-autoload
docker compose exec app composer update
```

## Reuqest -> Response Cycle

使用三個類別來處理使用者的請求跟回應，由 Kernel 來處理 Reuqest, Response。

## 使用 FastRoute 套件處理路由 

https: //github.com/nikic/FastRoute

```bash
docker compose exec app composer require nikic/fast-route
```