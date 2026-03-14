# Update Plan for Produk & Detail Produk Pages

## Information Gathered
- Current **produk.blade.php**: Sidebar filter, Bootstrap grid w/ product-card.
- Current **detail_produk.blade.php**: Gallery, WhatsApp Pesan (green), related products.
- Prototype: 
  - Produk: Horizontal top filter buttons, search form, simple 3-col grid cards, red price, single Detail btn.
  - Detail: Flex image+info, Wishlist (red), Pesan (green).
- Project data: $produk, $kategori ready. Images in public/upload/produk.

## Plan
1. **resources/views/frontend/produk.blade.php**:
   - Add search form above filters.
   - Change sidebar to horizontal centered buttons (Semua + $kategori loop, active state).
   - Keep grid but simple cards (red price, Detail btn).
2. **resources/views/frontend/detail_produk.blade.php**:
   - Simplify to prototype: Flex container, bordered image left, info right.
   - Red Wishlist btn, green Pesan btn (WhatsApp).
   - Inline CSS for exact prototype look.
3. Controller no change.

## Dependent Files
- frontend/produk.blade.php
- frontend/detail_produk.blade.php

## Followup
- Test `/produk`, `/produk/{id}`.
- Create TODO_PRODUK.md with steps.

Confirm before editing?

