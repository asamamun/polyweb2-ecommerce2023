class ShoppingCart {
    constructor() {
        // Initialize the cart from local storage
        this.cart = JSON.parse(localStorage.getItem('cart')) || {};
    }

    addItem(productId, productName, price, quantity = 1) {
        if (!this.cart[productId]) {
            this.cart[productId] = { productName, quantity, price };
        } else {
            this.cart[productId].quantity += quantity;
        }
        this.updateCart();
    }

    removeItem(productId) {
        if (this.cart[productId]) {
            delete this.cart[productId];
            this.updateCart();
        }
    }

    updateQuantity(productId, newQuantity) {
        if (this.cart[productId]) {
            this.cart[productId].quantity = newQuantity;
            this.updateCart();
        }
    }

    clearCart() {
        this.cart = {};
        this.updateCart();
    }

    getTotalItems() {
        let totalItems = 0;
        for (let productId in this.cart) {
            totalItems += this.cart[productId].quantity;
        }
        return totalItems;
    }

    getTotalAmount() {
        let totalAmount = 0;
        for (let productId in this.cart) {
            totalAmount += this.cart[productId].quantity * this.cart[productId].price;
        }
        return totalAmount;
    }

    updateCart() {
        // Update the cart display and local storage
        // (You can add your HTML update code here)
        this.updateLocalStorage();
    }

    updateLocalStorage() {
        // Update local storage with the current cart data
        localStorage.setItem('cart', JSON.stringify(this.cart));
    }
    show(){
        return this.cart;
    }
}
/*
// Usage:
const cart = new ShoppingCart();

// Add items to the cart
cart.addItem('product123', 'Product A', 10, 2);
cart.addItem('product456', 'Product B', 15, 3);

// Remove an item from the cart
cart.removeItem('product123');

// Update the quantity of an item
cart.updateQuantity('product456', 5);

// Get the total items and total amount
const totalItems = cart.getTotalItems();
const totalAmount = cart.getTotalAmount();

// Clear the cart
cart.clearCart();
*/
