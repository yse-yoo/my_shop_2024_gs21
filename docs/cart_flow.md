```mermaid
flowchart TD

subgraph Cart
index[商品一覧]
cart[カート一覧]
delete[削除]
confirm[確認]
purchase[購入]

index--->|カートに入れる|cart
-->delete-.->cart
-->confirm
-->purchase
-.->index

end
```