export default function slug(str){
  const array =  str.split(' ');
  return array.join('-').toLowerCase();
};

export class Cart {

  nameStorage = 'cart';
  cart = JSON.parse(localStorage.getItem(this.nameStorage));

  /**
   * we pass the object to the constructor
   * @param {Object} obj 
   */
  constructor(obj){
    this.obj = obj;
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
   */
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

  /**
   * Set quantity
   */
  setQty(qty, symbol){
    this.cart.forEach((element, index) => {
      const itemStorage = element.item;
      const itemCart = this.obj.item;

      if(itemStorage.id === itemCart.id){
        switch(symbol){
          case '+':
            element.qty += qty;
            break;
          case '-':
            element.qty -= qty;
        }
        
        if(element.qty <= 0){
          this.cart.splice(index,1);
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
  }

  /**
   * Set total paiment
   */
  getTotalPrice(){
    let totalPrice = 0;

    this.cart.forEach(element => {
      let price = element.item.price;
      totalPrice += price * element.qty;
    });

    return totalPrice;
  }

}