<?php

class Cart
{
    private array $items = [];

    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(array $items): void
    {
        $this->items = $items;
    }

    public function addProduct(Product $product, int $quantity): CartItem
    {
        foreach ($this->items as $item) {
            if ($item->getProduct()->getId() === $product->getId()) {
                $newQuantity = $item->getQuantity() + $quantity;

                if ($newQuantity > $product->getAvailableQuantity()) {
                    $newQuantity = $product->getAvailableQuantity();
                }

                $item->setQuantity($newQuantity);
                return $item;
            }
        }

        $cartItem = new CartItem($product, $quantity);
        $this->items[] = $cartItem;
        return $cartItem;
    }

    public function removeProduct(Product $product)
    {
        foreach ($this->items as $index => $item) {
            if ($item->getProduct()->getId() === $product->getId()) {
                unset($this->items[$index]);
                return;
            }
        }
    }

    public function getTotalQuantity(): int
    {
        $totalQuantity = 0;
        foreach ($this->items as $item) {
            $totalQuantity += $item->getQuantity();
        }

        return $totalQuantity;
    }

    public function getTotalSum(): float
    {
        $totalSum = 0;
        foreach ($this->items as $item) {
            $totalSum += $item->getProduct()->getPrice() * $item->getQuantity();
        }

        return $totalSum;
    }
}

?>