export default function slug(str){
  const array =  str.split(' ');
  return array.join('-').toLowerCase();
};

export class Cart {

  nameStorage = 'cart';
  obj;
  user;
  cart = JSON.parse(localStorage.getItem(this.nameStorage)) || {};

  /**
   * we pass the object to the constructor
   * @param {Object} obj 
   */
  constructor(_user, _obj){
    this.obj = _obj;
    this.user = _user;
  }

  /**
   * we insert the product in the local storage
   * @param {Integer} obj
   */
  setCart(qty){

    if(!this.obj) return null;

    if(qty >= 1){
      this.insertCart(qty);
      localStorage.setItem(this.nameStorage, JSON.stringify(this.cart));
    }
  }

  /**
   * show the product in the local storage
   */
  getCart(){
    return this.cart;
  }

  /**
   * insert product in the cart

  insertCart(intQty){

    let set = false;

    if(!this.obj) return null;

    if(!this.cart?.length){
      this.cart = [{item: this.obj, qty: intQty}];
      return;
    }

    this.cart.forEach(element => {

      const itemStorage = element.item;
      const itemCart = this.obj;

      if(itemStorage.id === itemCart.id){
        const qtyStorage = element.qty + intQty;
        element.qty = qtyStorage;

        set = true;
        return;
      }

    });

    if(!set) this.cart.push({ item: this.obj, qty: intQty });

  }
  */

  /**
   * insert product in the cart
   */
   insertCart(intQty){

    if(!this.obj) return null;

    if(!('user' in this.cart)){
      this.cart = {user: this.user, items: [{product: this.obj, qty: intQty}]};
      return;
    }

    if(this.cart.user.id !== this.user.id){
      const status = confirm('Selezionando un prodotto da un altro ristorante, perderai i prodotti che hai già nel carrello, Confermi?');
      if(status){
        this.clearCart();
        this.cart = {user: this.user, items: [{product: this.obj, qty: intQty}]};
      }
      return;
    }

    let set = false;

    this.cart.items.forEach(element => {
      const itemStorage = element.product;
      const itemCart = this.obj;

      if(itemStorage.id === itemCart.id){
        const qtyStorage = element.qty + intQty;
        element.qty = qtyStorage;

        set = true;
        return;
      }

    });

    if(!set) this.cart.items.push({ product: this.obj, qty: intQty });

  }

  /**
   * Set quantity
   */
  setQty(qty, symbol){
    this.cart.items.forEach((element, index) => {
      const itemStorage = element.product;
      const itemCart = this.obj.product;

      if(itemStorage.id === itemCart.id){
        switch(symbol){
          case '+':
            element.qty += qty;
            break;
          case '-':
            element.qty -= qty;
        }
        
        if(element.qty <= 0){
          this.deleteProductCart(index);
        }

        localStorage.setItem(this.nameStorage, JSON.stringify(this.cart));
      }
    });
  }

  /**
   * Clear Cart
   */
  clearCart(){
    localStorage.removeItem(this.nameStorage);
    this.cart = null;
  }

  /**
   * Delete product in the cart
   * @returns 
   */
  deleteProductCart(position){

    this.cart.items.splice(position,1);

    if(!this.cart.items.length) this.clearCart();
  }

  /**
   * Set total paiment
   */
  getTotalPrice(){
    let totalPrice = 0;
    this.cart?.items?.forEach(element => {
      let price = element.product.price;
      totalPrice += price * element.qty;
    });

    return totalPrice;
  }

}