let selectedSize = 'Medio';
let selectedItem = '';
let selectedPriceObj = {};
let selectedPrice = 0;
let isDineIn = true;

let selectedItems = [];

const onAddToOrder = (productId) => {
  $('#div-grande-size').removeClass("active");
  $('#div-medio-size').addClass("active");

  $('#input-product-id').val(productId);
  $('#input-size-value').val('Medio');
  $('#input-size-quantity').val('1');

  $('#staticAddToOrder').modal('show');
};

const onRemoveToOrder = ({ item, size }) => {
  // display items in the list label footer
  let totalItems = 0;
  let totalItemsPrices = 0;
  const index = selectedItems.findIndex(items => items.item === item && items.size === size);
  if (index !== -1) {
    selectedItems.splice(index, 1);
  }
  console.log('selectedItems: ', selectedItems);
  selectedItems.forEach(item => {
    totalItemsPrices += (item.price * item.quantity);
    totalItems += item.quantity;
  });
  if (selectedItems.length === 0) {
    selectedSize = 'Medio';
    selectedItem = '';
    selectedPriceObj = {};
    selectedPrice = 0;
    selectedItems = [];
    isDineIn = false;
    $('#h6-order-list-summary').text("No items in the list");
    $('#div-internal-orders').remove();
    $('#h5-total-prices').text("Total: ₱0.00");
    $('#p-no-orders-yet').css('display', 'block');
    $('#btn-checkout').attr("disabled", "disabled");
    $('#btn-checkout-footer').attr("disabled", "disabled");
  } else {
    if (totalItems === 1) {
      $('#h6-order-list-summary').text(`${totalItems} item in the list`);
    } else {
      $('#h6-order-list-summary').text(`${totalItems} items in the list`);
    }
    // display items in the view orders modal
    const mappedItems = selectedItems.map(item => {
      return `
        <div class="div-selected-menu-content-items">
          <div class="div-menu-item-title"
            onclick="onRemoveToOrder({ item: '${item.item}', size: '${item.size}' })">
            <i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;&nbsp;
            <h5 class="h5-menu-item-title fira-sans-medium color-dark">(${item.quantity}) ${item.item}</h5>
          </div>
          <div class="div-menu-item-prices" style="width: 150px;">
            <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱${item.price} (${item.size})</h5>
          </div>
        </div>
      `;
    }).join("");
    $('#div-internal-orders').remove();
    $('#div-orders').append(`<div id="div-internal-orders">${mappedItems}</div>`);
    $('#h5-total-prices').text(`Total: ₱${totalItemsPrices}`);
    $('#p-no-orders-yet').css('display', 'none');
    $('#btn-checkout').removeAttr("disabled");
  }
};

$('#div-medio-size').click(() => {
  $('#div-grande-size').removeClass("active");
  $('#div-medio-size').addClass("active");
  $('#input-size-value').val('Medio');
});

$('#div-grande-size').click(() => {
  $('#div-medio-size').removeClass("active");
  $('#div-grande-size').addClass("active");
  $('#input-size-value').val('Grande');
});

$('#div-dine-in').click(() => {
  $('#div-take-out').removeClass("active");
  $('#div-dine-in').addClass("active");
  isDineIn = true;
});

$('#div-take-out').click(() => {
  $('#div-dine-in').removeClass("active");
  $('#div-take-out').addClass("active");
  isDineIn = false;
});

$('#btn-quantity-add').click(() => {
  const sizeQuantity = $('#input-size-quantity').val();
  const quantity = Number(sizeQuantity) + 1;
  $('#input-size-quantity').val(`${quantity}`);
});

$('#btn-quantity-minus').click(() => {
  const sizeQuantity = $('#input-size-quantity').val();
  const quantity = Number(sizeQuantity) - 1;
  if (quantity >= 1) {
    $('#input-size-quantity').val(`${quantity}`);
  }
});

$('#btn-cancel-size').click(() => {
  $('#staticAddToOrder').modal('hide');
  $('#input-size-quantity').val('1');
});

$('#btn-close-ato').click(() => {
  $('#staticAddToOrder').modal('hide');
  $('#input-size-quantity').val('1');
});

$('#btn-cancel-orders').click(() => {
  window.location.href = "./";
});

$('#btn-express-checkout').click(() => {
  // $('#ip-queue-orders').val(JSON.stringify(selectedItems));
  $('#ip-queue-orders-type').val(isDineIn ? 'DINE IN' : 'TAKE OUT');
  $('#form-checkout').submit();
});
