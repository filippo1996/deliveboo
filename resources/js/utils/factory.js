export default function slug(str){
  const array =  str.split(' ');
  return array.join('-').toLowerCase();
};

export class Cart {

  cart = JSON.parse(localStorage.getItem('cart'));

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
      localStorage.setItem('cart', JSON.stringify(this.cart));
    }
  }

  /**
   * show the product in the local storage
   */
  getCart(){
    return this.cart;
  }

  /**
   * Set Quantity product
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

}