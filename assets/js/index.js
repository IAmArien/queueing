let selectedSize = 'Medio';
let selectedItem = '';
let selectedPriceObj = {};
let selectedPrice = 0;
let isDineIn = false;

let selectedItems = [];

const onAddToOrder = ({ item, prices }) => {
  $('#staticAddToOrder').modal('show');
  selectedItem = item;
  selectedPriceObj = prices;
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
  selectedSize = 'Medio';
});

$('#div-grande-size').click(() => {
  $('#div-medio-size').removeClass("active");
  $('#div-grande-size').addClass("active");
  selectedSize = 'Grande';
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

$('#btn-choose-size').click(() => {
  const sizeQuantity = $('#input-size-quantity').val();
  if (selectedSize === 'Medio') {
    const price = selectedPriceObj.filter(price => price.size === 'Medio');
    selectedPrice = price[0].price;
  } else {
    const price = selectedPriceObj.filter(price => price.size === 'Grande');
    selectedPrice = price[0].price;
  }
  const newItem = {
    item: selectedItem,
    size: selectedSize,
    price: selectedPrice,
    quantity: Number(sizeQuantity)
  };
  if (selectedItems.length === 0) {
    selectedItems.push(newItem);
  } else {
    const itemIndex = selectedItems.findIndex(items =>
      items.item === selectedItem && items.size === selectedSize
    );
    if (itemIndex !== -1) {
      selectedItems[itemIndex] = {
        ...newItem,
        quantity: newItem.quantity + selectedItems[itemIndex].quantity
      };
    } else {
      selectedItems.push(newItem);
    }
  }
  // display items in the list label footer
  let totalItems = 0;
  let totalItemsPrices = 0;
  selectedItems.forEach(item => {
    totalItemsPrices += (item.price * item.quantity);
    totalItems += item.quantity;
  });
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
  $('#btn-checkout-footer').removeAttr("disabled");
  // hide modal
  $('#staticAddToOrder').modal('hide');
  $('#strong-selected-item').text(`${selectedItem} (${selectedSize})`);
  $('#div-selected-item-text-content').text(`${selectedItem} was added to your orders.`);
  $('#liveToastBtn').trigger('click');
  // reset input size quantity
  $('#input-size-quantity').val('1');
  // reset size selection
  $('#div-grande-size').removeClass("active");
  $('#div-medio-size').addClass("active");
  selectedSize = 'Medio';
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
  $('#ip-queue-orders').val(JSON.stringify(selectedItems));
  $('#ip-queue-orders-type').val(isDineIn ? 'DINE IN' : 'TAKE OUT');
  $('#form-checkout').submit();
});

$('#select-real-fruit-quenchers').click(() => {
  $('#select-real-fruit-quenchers').addClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'block');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-classic-milk-tea').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').addClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'block');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-premium-milk-tea').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').addClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'block');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-tea-based-series').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').addClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'block');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-yakult-series').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').addClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'block');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-lemonade-series').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').addClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'block');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-classic-blends').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').addClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'block');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-prime-blends').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').addClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'block');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'none');
});

$('#select-java-frappe').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').addClass('active');
  $('#select-cream-frappe').removeClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'block');
  $('#cream-frappe').css('display', 'none');
});

$('#select-cream-frappe').click(() => {
  $('#select-real-fruit-quenchers').removeClass('active');
  $('#select-classic-milk-tea').removeClass('active');
  $('#select-premium-milk-tea').removeClass('active');
  $('#select-tea-based-series').removeClass('active');
  $('#select-yakult-series').removeClass('active');
  $('#select-lemonade-series').removeClass('active');
  $('#select-classic-blends').removeClass('active');
  $('#select-prime-blends').removeClass('active');
  $('#select-java-frappe').removeClass('active');
  $('#select-cream-frappe').addClass('active');

  $('#real-fruit-quenchers').css('display', 'none');
  $('#classic-milk-tea').css('display', 'none');
  $('#premium-milk-tea').css('display', 'none');
  $('#tea-based-series').css('display', 'none');
  $('#yakult-series').css('display', 'none');
  $('#lemonade-series').css('display', 'none');
  $('#classic-blends').css('display', 'none');
  $('#prime-blends').css('display', 'none');
  $('#java-frappe').css('display', 'none');
  $('#cream-frappe').css('display', 'block');
});
