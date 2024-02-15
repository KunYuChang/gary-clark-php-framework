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

## 自己維護第三方套件

當 PHP 新版本發佈時，不定期維護的軟體套件可能不會立即更新。這可能意味著您正在使用的套件與您想要在專案中使用的 PHP 新版本不相容。

在這種情況下，可以選擇 fork 原始儲存庫並維護自己的 fork，直到原始套件更新為止。

### Using Open-Source 3rd-party Packages 

1. 維護狀況 (Maintenance): 我們可以從存儲庫的活躍度和更新頻率來判斷套件的維護程度。如果存儲庫經常更新，並且有活躍的開發者社區，那麼套件可能是維護良好的。要確切地評估維護狀況，可能需要查看存儲庫的提交記錄和討論區。

2. 最後一次提交 (Last Commit): 查看存儲庫的提交記錄，可以找到最後一次的提交時間。這可以讓我們知道套件的開發活動最近是否有更新。

3. 貢獻者人數 (Number of Contributors): 通常，開源專案的貢獻者人數越多，意味著有更多的人參與了專案的開發和維護，這也可以作為評估專案活躍度和受歡迎程度的指標之一。

4. 開放的問題 (Open Issues): 檢查存儲庫的問題跟蹤器，可以了解有多少開放的問題，以及這些問題是否得到了解決或者正在被積極解決。

### fork 維護

如果你的專案依賴的套件不兼容新版本的 PHP，而且你無法更新專案的 PHP 版本，那麼你可以考慮以下步驟來解決這個問題：

等待套件更新：首先，你可以等待原始套件的開發者更新套件以支援新版本的 PHP。這是最簡單的解決方案，但有時可能需要等待一段時間。

Fork 原始存儲庫：如果你不想等待，或者需要立即解決問題，你可以 fork 原始套件的存儲庫到你自己的 GitHub 帳戶中。

在 fork 中進行修復：在你 fork 的存儲庫中，進行必要的更改來使套件與新版本的 PHP 兼容。你可以修改程式碼、更新依賴或者應用其他必要的修復。

提交拉取請求 (Pull Request)：一旦你完成了修復，你可以提交一個拉取請求到原始套件的存儲庫中。這將讓原始套件的開發者審查你的更改並將其合併到主分支中。

維護自己的版本：如果原始套件的開發者沒有接受你的拉取請求，或者你希望保持獨立控制，你可以維護你 fork 的版本，並將其視為自己的定制版本。這意味著你需要負責後續的維護和更新。