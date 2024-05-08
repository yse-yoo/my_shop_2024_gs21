```mermaid
flowchart TD

subgraph 商品管理
list[一覧]-->
input[入力画面]-->
input_validate{チェック}-->
add[追加]-->
|リダイレクト|list
input_validate-->
|エラー|input

list[一覧]-->
|items.id|edit[編集画面]-->
edit_validate{チェック}-->
|items.id|update[更新]-->
|リダイレクト|list
edit_validate-->
|エラー|edit
end