// Message of the type: alert | confirm
window.customMessage = function(type = 'alert', title = 'Title', description = 'Paragraph'){
  return new Promise((resolve, reject) => {
    // modal custom
    modalHtml(type, title, description);
    const modal = document.querySelector('#customAlert');
    const backdrop = document.querySelector('.modal-backdrop');
    modal.addEventListener('click', function(event){
      const input = +event.target.value;
      if(!isNaN(input)){
        modal.remove();
        backdrop.remove();
        resolve(!!input);
      } 
    });

  });
}

function modalHtml(typeModal, heading, paragraph){
  const modal = `<div class="modal fade show" id="customAlert" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" style="display: block" aria-modal="true" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">${heading}</h5>
          <button type="button" value="0" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ${paragraph}
        </div>
        <div class="modal-footer">
          ${ typeModal === 'confirm' ? '<button type="button" value="0" class="btn btn-secondary" data-bs-dismiss="modal">Chiudi</button>' : '' }
          <button type="button" value="1" class="btn btn-primary">Va bene</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal-backdrop fade show"></div>
  `;
  document.body.insertAdjacentHTML('afterbegin', modal);
}


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
  async setCart(qty){

    let success = false;

    if(!this.obj) return null;

    if(qty >= 1){
      let response = await this.insertCart(qty);
      if(response){
        localStorage.setItem(this.nameStorage, JSON.stringify(this.cart));
        success = true;
      }
    }

    return success;
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
   async insertCart(intQty){

    if(!this.obj) return null;

    if(!('user' in this.cart)){
      this.cart = {user: this.user, items: [{product: this.obj, qty: intQty}]};
      return true;
    }

    if(this.cart.user.id !== this.user.id){
      //const status = confirm('Selezionando un prodotto da un altro ristorante, perderai i prodotti che hai già nel carrello, Confermi?');
      const status = await customMessage('confirm', 'Attenzione!', 'Selezionando un prodotto da un altro ristorante, perderai i prodotti che hai già nel carrello.');
      if(status){
        this.clearCart();
        this.cart = {user: this.user, items: [{product: this.obj, qty: intQty}]};
        return true;
      }
      return false;
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

    return true;

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
          return;
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

    localStorage.setItem(this.nameStorage, JSON.stringify(this.cart));

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