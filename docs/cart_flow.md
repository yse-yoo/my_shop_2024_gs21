```mermaid
flowchart TD

subgraph Cart
index[商品一覧]
cart[カート一覧]
delete[削除]
purchase[購入]
complete[完了]

index--->|カートに入れる|cart
-->delete-.->cart
-->purchase
-.->complete

end
```