<?php
  session_start();
  include('./utils/connections.php');
  if (isset($_SESSION['checkout.order_number'])) {
    header('Location: ./for_payment/');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JMoa's Cafe&trade;</title>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    >
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/global.css" />
    <link rel="stylesheet" href="./assets/css/index.css" />
  </head>
  <body>
    <div class="div-classic-top-bar"></div>
    <div class="div-classic-side-bar">
      <div class="div-side-bar-content">
        <div id="select-real-fruit-quenchers" class="div-menu-selection-item active">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Real Fruit Quenchers</h5>
        </div>
        <div id="select-classic-milk-tea" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Classic Milktea</h5>
        </div>
        <div id="select-premium-milk-tea" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Premium Milktea</h5>
        </div>
        <div id="select-tea-based-series" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Tea Based Series</h5>
        </div>
        <div id="select-yakult-series" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Yakult Series</h5>
        </div>
        <div id="select-lemonade-series" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Lemonade Series</h5>
        </div>
        <div id="select-classic-blends" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Classic Blends</h5>
        </div>
        <div id="select-prime-blends" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Prime Blends</h5>
        </div>
        <div id="select-java-frappe" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Java Frappe</h5>
        </div>
        <div id="select-cream-frappe" class="div-menu-selection-item">
          <h5 class="fira-sans-medium h5-menu-selection-item-title">Cream Frappe</h5>
        </div>
      </div>
    </div>
    <div class="div-classic-container">
      <div class="container">
        <div class="div-selected-menu">
          <div id="real-fruit-quenchers">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Real Fruit Quenchers</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Mango Shake', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 60 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Mango Shake</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Melon Shake', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 60 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Melon Shake</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Buko Shake', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 60 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Buko Shake</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Guyabano Shake', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Guyabano Shake</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Mango Graham', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Mango Graham</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Mango Fruit', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Mango Fruiti</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Fruiti Buko', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Buko</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Melon', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Melon</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Banana', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Banana</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Avocado', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Avocado</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Guyabano', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Guyabano</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Cheesecake', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Cheesecake</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Strawberry', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Strawberry</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Fruiti Mixed Berries', prices: [{ size: 'Medio', price: 90 }, { size: 'Grande', price: 100 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Fruiti Mixed Berries</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱100</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="classic-milk-tea" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Classic Milktea</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Bobba', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Bobba</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Tarro', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Tarro</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Lychee', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Lychee</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Dark Chocco', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Dark Chocco</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Strawberry', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Strawberry</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Wintermelon', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Wintermelon</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Honeydew', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Honeydew</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Cookies & Cream', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 85 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Cookies & Cream</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="premium-milk-tea" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Premium Milktea</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Dark Choco Cookies', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Dark Choco Cookies</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Strawberry Cookies', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Strawberry Cookies</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Sawadeeka (Thai)', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Sawadeeka (Thai)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Konnichiwa (Okinawa)', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Konnichiwa (Okinawa)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Blueberry', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Blueberry</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Vanilla', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Vanilla</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱95</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Caramel', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Caramel</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱95</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Hazelnut', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Hazelnut</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱95</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Matcha', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 95 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Matcha</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱95</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Matcha (Cookies)', prices: [{ size: 'Medio', price: 85 }, { size: 'Grande', price: 100 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Matcha (Cookies)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱100</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items"  onclick="
                  onAddToOrder({ item: 'Java Espresso', prices: [{ size: 'Medio', price: 85 }, { size: 'Grande', price: 100 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Java Espresso</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱85</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱100</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="tea-based-series" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Tea Based Series</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Lychee (Tea-based)', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 65 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Lychee (Tea-based)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱65</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Green Apple', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 65 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Green Apple</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱65</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Blueberry (Tea-based)', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 65 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Blueberry (Tea-based)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱65</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Strawberry (Tea-based)', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 65 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Strawberry (Tea-based)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱65</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Kiwi', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 65 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Kiwi</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱65</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Passion Fruit', prices: [{ size: 'Medio', price: 50 }, { size: 'Grande', price: 65 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Passion Fruit</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱50</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱65</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="yakult-series" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Yakult Series</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Lychee (Yakult)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 75 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Lychee (Yakult)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Green Apple (Yakult)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 75 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Green Apple (Yakult)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Blueberry (Yakult)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 75 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Blueberry (Yakult)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Strawberry (Yakult)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 75 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Strawberry (Yakult)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Kiwi (Yakult)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 75 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Kiwi (Yakult)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱75</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="lemonade-series" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Lemonade Series</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Classic Lemon', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Classic Lemon</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Kiwi (Lemonade)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Kiwi (Lemonade)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Green Apple (Lemonade)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Green Apple (Lemonade)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Strawberry (Lemonade)', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Strawberry (Lemonade)</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Orange Lemon', prices: [{ size: 'Medio', price: 60 }, { size: 'Grande', price: 70 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Orange Lemon</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱60</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Cucumber', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Cucumber</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Yakult', prices: [{ size: 'Medio', price: 80 }, { size: 'Grande', price: 90 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Yakult</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱80</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="classic-blends" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Classic Blends</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Espresso Shot', prices: [{ size: 'Medio', price: 70 }, { size: 'Grande', price: 90 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Espresso Shot</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱70</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱90</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Hot Americano', prices: [{ size: 'Medio', price: 105 }, { size: 'Grande', price: 120 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Hot Americano</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱105</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱120</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Capuccino', prices: [{ size: 'Medio', price: 105 }, { size: 'Grande', price: 120 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Capuccino</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱105</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱120</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Hot Mocha', prices: [{ size: 'Medio', price: 110 }, { size: 'Grande', price: 125 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Hot Mocha</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱110</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱125</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Hot Latte', prices: [{ size: 'Medio', price: 110 }, { size: 'Grande', price: 125 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Hot Latte</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱110</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱125</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'White Choco Mocha', prices: [{ size: 'Medio', price: 110 }, { size: 'Grande', price: 125 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">White Choco Mocha</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱110</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱125</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="prime-blends" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Prime Blends</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Matcha Latte', prices: [{ size: 'Medio', price: 115 }, { size: 'Grande', price: 130 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Matcha Latte</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱115</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Caramel Macchiato', prices: [{ size: 'Medio', price: 115 }, { size: 'Grande', price: 130 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Caramel Macchiato</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱115</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Vanilla', prices: [{ size: 'Medio', price: 115 }, { size: 'Grande', price: 130 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Vanilla</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱115</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Vanilla Salted Caramel', prices: [{ size: 'Medio', price: 115 }, { size: 'Grande', price: 130 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Vanilla Salted Caramel</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱115</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Mochanut', prices: [{ size: 'Medio', price: 115 }, { size: 'Grande', price: 130 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Mochanut</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱115</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Salted Caramel', prices: [{ size: 'Medio', price: 115 }, { size: 'Grande', price: 130 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Salted Caramel</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱115</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="java-frappe" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Java Frappe</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Matcha Frappe', prices: [{ size: 'Medio', price: ₱130 }, { size: 'Grande', price: ₱150 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Matcha Frappe</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱150</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Choco Frappe', prices: [{ size: 'Medio', price: 135 }, { size: 'Grande', price: 155 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Choco Frappe</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱135</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱155</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Mochanut Frappe', prices: [{ size: 'Medio', price: 135 }, { size: 'Grande', price: 155 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Mochanut Frappe</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱135</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱155</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
          <div id="cream-frappe" style="display: none;">
            <div class="div-selected-menu-content">
              <!-- Menu Content Header Title -->
              <div class="div-selected-menu-content-header">
                <div class="div-selected-menu-content-title">
                  <h2 class="h3-selected-menu-title dancing-script-700">Cream Frappe</h2>
                </div>
                <div class="div-menu-item-sizes">
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">MEDIO</h5>
                    <p class="fira-sans-regular color-brown">100ml</p>
                  </div>
                  <div class="div-menu-item-size-content">
                    <h5 class="fira-sans-medium color-brown">GRANDE</h5>
                    <p class="fira-sans-regular color-brown">200ml</p>
                  </div>
                </div>
              </div>
              <!-- Menu Content Header Title -->
              <!-- Menu Content Items (Item and Prices) -->
              <div class="div-selected-menu-content-items">
                <div class="div-menu-item-title" onclick="
                  onAddToOrder({ item: 'Lychee Cream', prices: [{ size: 'Medio', price: 125 }, { size: 'Grande', price: 145 }] })">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Lychee Cream</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱125</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱145</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Blueberry Cream', prices: [{ size: 'Medio', price: 125 }, { size: 'Grande', price: 145 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Blueberry Cream</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱125</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱145</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Strawberry Cream', prices: [{ size: 'Medio', price: 130 }, { size: 'Grande', price: 150 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Strawberry Cream</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱150</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Dark ChoCookies', prices: [{ size: 'Medio', price: 130 }, { size: 'Grande', price: 150 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Dark ChoCookies</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱150</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'White ChoCookies', prices: [{ size: 'Medio', price: 130 }, { size: 'Grande', price: 150 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">White ChoCookies</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱150</h5>
                </div>
              </div>
              <div class="div-selected-menu-content-items" onclick="
                  onAddToOrder({ item: 'Matcha Cream', prices: [{ size: 'Medio', price: 130 }, { size: 'Grande', price: 150 }] })">
                <div class="div-menu-item-title">
                  <i class="fa-solid fa-circle-plus"></i>&nbsp;&nbsp;&nbsp;
                  <h5 class="h5-menu-item-title fira-sans-medium color-dark">Matcha Cream</h5>
                </div>
                <div class="div-menu-item-prices">
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱130</h5>
                  <h5 class="h5-menu-item-prices fira-sans-medium color-brown">₱150</h5>
                </div>
              </div>
              <!-- Menu Content Items (Item and Prices) -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="div-footer-order-summary">
      <div class="div-order-summary">
        <h6 id="h6-order-list-summary" class="color-dark fira-sans-regular" style="margin-bottom: 0px;">No items in the list</h6>
        <button
          data-bs-toggle="modal"
          data-bs-target="#staticViewOrders"
          class="btn btn-md btn-outline-primary btn-view-orders color-dark fira-sans-regular">
          View Orders
        </button>
      </div>
      <div class="div-order-checkout">
        <button type="button" class="btn btn-primary" id="liveToastBtn" style="display: none;"></button>
        <button
          data-bs-toggle="modal"
          data-bs-target="#staticCancelOrders"
          class="btn btn-md btn-outline-danger btn-cancel-orders color-dark fira-sans-regular">
          <i class="fa-solid fa-circle-xmark"></i>&nbsp;&nbsp;Cancel Orders
        </button>
        <button
          disabled="disabled"
          id="btn-checkout-footer"
          class="btn btn-md btn-outline-secondary btn-checkout-orders color-dark fira-sans-regular">
          <i class="fa-solid fa-credit-card"></i>&nbsp;&nbsp;Checkout
        </button>
      </div>
    </div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong id="strong-selected-item" class="me-auto"></strong>
          <small>Just now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body" id="div-selected-item-text-content">
        </div>
      </div>
    </div>
    <div
      class="modal fade" 
      id="staticCancelOrders" 
      data-bs-backdrop="static" 
      data-bs-keyboard="false" 
      tabindex="-1" 
      aria-labelledby="staticBackdropLabel" 
      aria-hidden="true">
      <div class="modal-dialog modal-md modal-dialog-centered">
        <form action="../actions/delete_user.php" method="POST">
          <input id="delete-ue" type="hidden" name="email" />
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 sans-600" id="staticBackdropLabel">Cancel Orders?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <p class="fira-sans-regular size-14" style="line-height: 1.5rem; text-align: center;">
                Are you sure you want to cancel all of your orders?.
                This will reset all your selected items in the list.
                It cannot be undone.
              </p>
            </div>
            <div class="modal-footer">
              <button
                id="btn-cancel-orders"
                type="button"
                class="btn btn-outline-secondary btn-choose-order fira-sans-medium bg-color-brown color-white">
                Cancel
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div
      class="modal fade" 
      id="staticAddToOrder" 
      data-bs-backdrop="static" 
      data-bs-keyboard="false" 
      tabindex="-1" 
      aria-labelledby="staticBackdropLabel" 
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 fira-sans-medium" id="staticBackdropLabel">Choose Size</h1>
            <button id="btn-close-ato" type="button" class="btn-close" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="div-choose-size-selection">
              <div id="div-medio-size" class="div-choose-size-selection-item active">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="150"
                  zoomAndPan="magnify"
                  viewBox="0 0 375 374.999991"
                  height="150"
                  preserveAspectRatio="xMidYMid meet"
                  version="1.0">
                  <defs>
                    <clipPath id="2dc0e9b9d5">
                      <path d="M 88 37.5 L 287 37.5 L 287 325 L 88 325 Z M 88 37.5 " clip-rule="nonzero"/>
                    </clipPath>
                    <clipPath id="14a455b86b">
                      <path d="M 187 37.5 L 287 37.5 L 287 325 L 187 325 Z M 187 37.5 " clip-rule="nonzero"/>
                    </clipPath>
                  </defs>
                  <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                  <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                  <path fill="#ffffff" d="M 252.285156 315.796875 L 256.484375 243.601562 L 263.457031 124.621094 L 267.574219 81.773438 L 107.632812 81.773438 L 111.75 124.621094 L 118.722656 243.601562 L 122.921875 315.796875 Z M 252.285156 315.796875 " fill-opacity="1" fill-rule="nonzero"/><path fill="#8e5025" d="M 112 132.503906 L 118.46875 242.679688 L 256.738281 242.679688 L 263.203125 132.503906 Z M 112 132.503906 " fill-opacity="1" fill-rule="nonzero"/><path fill="#232322" d="M 120.316406 46.21875 C 119.898438 46.21875 119.644531 46.554688 119.644531 46.890625 L 119.644531 56.28125 L 255.558594 56.28125 L 255.558594 46.976562 C 255.558594 46.554688 255.222656 46.304688 254.886719 46.304688 L 120.316406 46.304688 Z M 120.316406 46.21875 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#2dc0e9b9d5)"><path fill="#000000" d="M 286.304688 71.878906 L 280.59375 60.222656 C 279.417969 57.875 276.980469 56.367188 274.378906 56.367188 L 264.296875 56.367188 L 264.296875 46.976562 C 264.296875 41.777344 260.011719 37.5 254.804688 37.5 L 120.316406 37.5 C 115.109375 37.5 110.824219 41.777344 110.824219 46.976562 L 110.824219 56.367188 L 100.746094 56.367188 C 98.140625 56.367188 95.703125 57.875 94.527344 60.222656 L 88.898438 71.878906 C 87.890625 74.058594 87.976562 76.492188 89.238281 78.503906 C 90.496094 80.515625 92.679688 81.773438 95.117188 81.773438 L 98.8125 81.773438 L 114.101562 316.554688 C 114.351562 321.082031 118.132812 324.601562 122.585938 324.601562 L 252.367188 324.601562 C 256.90625 324.601562 260.601562 321.082031 260.851562 316.554688 L 276.140625 81.773438 L 279.835938 81.773438 C 282.273438 81.773438 284.457031 80.597656 285.71875 78.503906 C 287.144531 76.574219 287.3125 74.058594 286.304688 71.878906 Z M 119.644531 46.976562 C 119.644531 46.554688 119.980469 46.304688 120.316406 46.304688 L 254.804688 46.304688 C 255.222656 46.304688 255.476562 46.640625 255.476562 46.976562 L 255.476562 56.367188 L 119.644531 56.367188 Z M 252.285156 315.796875 L 122.921875 315.796875 L 119.140625 251.402344 L 256.066406 251.402344 Z M 118.636719 242.679688 L 112.253906 132.503906 L 263.035156 132.503906 L 256.652344 242.679688 Z M 263.539062 123.78125 L 111.664062 123.78125 L 107.550781 81.855469 L 267.574219 81.855469 Z M 98.140625 73.050781 L 102.003906 65.085938 L 273.199219 65.085938 L 277.066406 73.050781 Z M 98.140625 73.050781 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#232322" d="M 102.003906 65.085938 L 98.140625 73.050781 L 277.066406 73.050781 L 273.199219 65.085938 Z M 102.003906 65.085938 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#14a455b86b)"><path fill="#020202" d="M 285.886719 78.585938 C 284.625 80.597656 282.441406 81.855469 280.003906 81.855469 L 276.308594 81.855469 L 261.019531 316.636719 C 260.769531 321.164062 256.988281 324.6875 252.535156 324.6875 L 187.601562 324.6875 L 187.601562 37.5 L 254.886719 37.5 C 260.097656 37.5 264.378906 41.777344 264.378906 46.976562 L 264.378906 56.367188 L 274.460938 56.367188 C 277.066406 56.367188 279.5 57.875 280.675781 60.222656 L 286.390625 71.878906 C 287.3125 74.058594 287.144531 76.574219 285.886719 78.585938 Z M 285.886719 78.585938 " fill-opacity="0.15" fill-rule="nonzero"/></g></svg>
                <h3 class="fira-sans-medium color-brown">MEDIO</h3>
                <p class="fira-sans-regular color-brown">100ml</p>
              </div>
              <div id="div-grande-size" class="div-choose-size-selection-item">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                  width="150"
                  zoomAndPan="magnify"
                  viewBox="0 0 375 374.999991"
                  height="150"
                  preserveAspectRatio="xMidYMid meet"
                  version="1.0">
                  <defs>
                    <clipPath id="888426bcd2">
                      <path d="M 97 37.5 L 277.699219 37.5 L 277.699219 325 L 97 325 Z M 97 37.5 " clip-rule="nonzero"/>
                    </clipPath>
                    <clipPath id="e53bdfd240">
                      <path d="M 187 37.5 L 277.699219 37.5 L 277.699219 326 L 187 326 Z M 187 37.5 " clip-rule="nonzero"/>
                    </clipPath>
                  </defs>
                  <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                  <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                  <path fill="#ffffff" d="M 245.960938 317.023438 L 249.703125 251.324219 L 256.050781 143.234375 L 259.796875 77.941406 L 114.773438 77.941406 L 118.515625 143.234375 L 124.863281 251.324219 L 128.6875 317.023438 Z M 245.960938 317.023438 " fill-opacity="1" fill-rule="nonzero"/><path fill="#8e5025" d="M 118.761719 147.390625 L 124.621094 247.574219 L 249.949219 247.574219 L 255.808594 147.390625 Z M 118.761719 147.390625 " fill-opacity="1" fill-rule="nonzero"/><path fill="#232322" d="M 126.328125 45.664062 C 126.003906 45.664062 125.679688 45.90625 125.679688 46.3125 L 125.679688 54.792969 L 248.890625 54.792969 L 248.890625 46.234375 C 248.890625 45.90625 248.648438 45.582031 248.238281 45.582031 L 126.328125 45.582031 Z M 126.328125 45.664062 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#888426bcd2)"><path fill="#000000" d="M 276.722656 68.976562 L 271.597656 58.378906 C 270.539062 56.257812 268.339844 54.875 265.980469 54.875 L 256.867188 54.875 L 256.867188 46.234375 C 256.867188 41.503906 253.042969 37.671875 248.320312 37.671875 L 126.328125 37.671875 C 121.609375 37.671875 117.785156 41.503906 117.785156 46.234375 L 117.785156 54.792969 L 108.667969 54.792969 C 106.308594 54.792969 104.113281 56.175781 103.054688 58.296875 L 97.925781 68.894531 C 96.949219 70.851562 97.113281 73.132812 98.253906 74.925781 C 99.390625 76.800781 101.34375 77.859375 103.542969 77.859375 L 106.878906 77.859375 L 107.367188 86.828125 L 116.96875 251.730469 L 120.796875 317.675781 C 121.039062 321.75 124.457031 324.929688 128.527344 324.929688 L 246.207031 324.929688 C 250.273438 324.929688 253.691406 321.75 253.9375 317.675781 L 257.761719 251.730469 L 264.027344 143.5625 L 267.851562 77.859375 L 271.191406 77.859375 C 273.386719 77.859375 275.339844 76.800781 276.480469 74.925781 C 277.539062 73.214844 277.699219 70.929688 276.722656 68.976562 Z M 125.679688 46.234375 C 125.679688 45.90625 126.003906 45.582031 126.328125 45.582031 L 248.238281 45.582031 C 248.566406 45.582031 248.890625 45.824219 248.890625 46.234375 L 248.890625 54.792969 L 125.679688 54.792969 Z M 245.960938 317.023438 L 128.6875 317.023438 L 125.109375 255.5625 L 249.542969 255.5625 Z M 249.949219 247.574219 L 124.621094 247.574219 L 118.761719 147.390625 L 255.726562 147.390625 Z M 256.214844 139.484375 L 118.355469 139.484375 L 114.773438 78.023438 L 259.796875 78.023438 Z M 106.144531 70.035156 L 109.644531 62.78125 L 264.839844 62.78125 L 268.339844 70.035156 Z M 106.144531 70.035156 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#232322" d="M 109.644531 62.78125 L 106.144531 70.035156 L 268.421875 70.035156 L 264.921875 62.78125 Z M 109.644531 62.78125 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#e53bdfd240)"><path fill="#020202" d="M 276.398438 75.007812 C 275.257812 76.882812 273.304688 77.941406 271.109375 77.941406 L 267.769531 77.941406 L 263.945312 143.640625 L 257.679688 251.8125 L 253.855469 317.757812 C 253.609375 321.832031 250.191406 325.011719 246.125 325.011719 L 187.285156 325.011719 L 187.285156 37.671875 L 248.238281 37.671875 C 252.960938 37.671875 256.785156 41.503906 256.785156 46.234375 L 256.785156 54.792969 L 265.898438 54.792969 C 268.257812 54.792969 270.457031 56.175781 271.515625 58.296875 L 276.640625 68.894531 C 277.699219 70.929688 277.539062 73.214844 276.398438 75.007812 Z M 276.398438 75.007812 " fill-opacity="0.15" fill-rule="nonzero"/></g></svg>
                <h3 class="fira-sans-medium color-brown">GRANDE</h3>
                <p class="fira-sans-regular color-brown">200ml</p>
              </div>
            </div>
            <h3 class="fira-sans-semibold size-12" style="margin-top: 12px;">Quantity:</h3>
            <div class="div-choose-size-quantity">
              <button id="btn-quantity-add" type="button" class="btn btn-outline-success btn-choose-size-quantity">
                <i class="fa-solid fa-circle-plus"></i>
              </button>
              <input
                id="input-size-quantity"
                type="number"
                placeholder="eg. (1)"
                value="1"
                readonly
                class="form-control input-choose-size-quantity"
              />
              <button id="btn-quantity-minus" type="button" class="btn btn-outline-secondary btn-choose-size-quantity">
                <i class="fa-solid fa-circle-minus"></i>
              </button>
            </div>
          </div>
          <div class="modal-footer">
            <button
              id="btn-cancel-size"
              type="button"
              class="btn btn-outline-secondary btn-choose-order fira-sans-medium color-dark">
              Cancel
            </button>
            <button
              id="btn-choose-size"
              type="button"
              class="btn btn-outline-secondary btn-choose-order fira-sans-medium bg-color-brown color-white">
              Choose
            </button>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade" 
      id="staticViewOrders" 
      data-bs-backdrop="static" 
      data-bs-keyboard="false" 
      tabindex="-1" 
      aria-labelledby="staticBackdropLabel" 
      aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5 fira-sans-medium" id="staticBackdropLabel">View Orders</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p
              id="p-no-orders-yet"
              class="fira-sans-regular color-dark"
              style="text-align: center; padding: 20px; margin-bottom: 0px;">
              No Orders Yet.
            </p>
            <div id="div-orders"></div>
          </div>
          <div class="modal-footer">
            <h5
              id="h5-total-prices"
              class="h5-menu-item-prices fira-sans-medium color-brown"
              style="text-align: left; align-self: center;">
              Total: ₱0.00
            </h5>
            <button
              disabled="disabled"
              data-bs-toggle="modal"
              data-bs-target="#staticCheckout"
              id="btn-checkout"
              type="button"
              class="btn btn-outline-secondary btn-choose-order fira-sans-medium bg-color-brown color-white">
              <i class="fa-solid fa-credit-card"></i>&nbsp;&nbsp;Checkout
            </button>
          </div>
        </div>
      </div>
    </div>
    <div
      class="modal fade" 
      id="staticCheckout" 
      data-bs-backdrop="static" 
      data-bs-keyboard="false" 
      tabindex="-1" 
      aria-labelledby="staticBackdropLabel" 
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <form id="form-checkout" action="./actions/checkout.php" method="POST">
          <input id="ip-queue-orders-type" type="hidden" name="queue_orders_type" value="DINE IN" />
          <input id="ip-queue-orders" type="hidden" name="queue_orders" />
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5 fira-sans-medium" id="staticBackdropLabel">Express Checkout</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="div-choose-size-selection">
                <div id="div-dine-in" class="div-choose-size-selection-item active">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="150"
                    zoomAndPan="magnify"
                    viewBox="0 0 375 374.999991"
                    height="150"
                    preserveAspectRatio="xMidYMid meet"
                    version="1.0">
                    <defs>
                      <clipPath id="ddbf25cd67">
                        <path d="M 37.5 37.5 L 337.5 37.5 L 337.5 337.5 L 37.5 337.5 Z M 37.5 37.5 " clip-rule="nonzero"/>
                      </clipPath>
                    </defs>
                      <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                      <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                      <path fill="#f0e3ce" d="M 334.976562 187.5 C 334.976562 189.914062 334.917969 192.324219 334.796875
                        194.734375 C 334.679688 197.148438 334.503906 199.554688 334.265625 201.957031 C 334.027344 
                        204.355469 333.734375 206.75 333.378906 209.140625 C 333.023438 211.527344 332.613281 213.902344 
                        332.140625 216.269531 C 331.671875 218.636719 331.140625 220.992188 330.554688 223.332031 C 
                        329.96875 225.675781 329.324219 228 328.625 230.308594 C 327.925781 232.621094 327.167969 
                        234.910156 326.355469 237.183594 C 325.542969 239.457031 324.671875 241.707031 323.75 243.9375 C 
                        322.824219 246.167969 321.847656 248.371094 320.816406 250.554688 C 319.785156 252.734375 318.699219 
                        254.890625 317.5625 257.019531 C 316.425781 259.148438 315.234375 261.246094 313.992188 263.316406 C 
                        312.753906 265.386719 311.460938 267.425781 310.121094 269.433594 C 308.78125 271.441406 307.390625 
                        273.414062 305.953125 275.351562 C 304.515625 277.289062 303.03125 279.191406 301.5 281.058594 C 
                        299.96875 282.921875 298.394531 284.75 296.773438 286.539062 C 295.152344 288.328125 293.488281 
                        290.074219 291.78125 291.78125 C 290.074219 293.488281 288.328125 295.152344 286.539062 296.773438 C 
                        284.75 298.394531 282.921875 299.96875 281.058594 301.5 C 279.191406 303.03125 277.289062 304.515625 
                        275.351562 305.953125 C 273.414062 307.390625 271.441406 308.78125 269.433594 310.121094 C 267.425781 
                        311.460938 265.386719 312.753906 263.316406 313.992188 C 261.246094 315.234375 259.148438 316.425781 
                        257.019531 317.5625 C 254.890625 318.699219 252.734375 319.785156 250.554688 320.816406 C 248.371094 
                        321.847656 246.167969 322.824219 243.9375 323.75 C 241.707031 324.671875 239.457031 325.542969 
                        237.183594 326.355469 C 234.910156 327.167969 232.621094 327.925781 230.308594 328.625 C 228 
                        329.324219 225.675781 329.96875 223.332031 330.554688 C 220.992188 331.140625 218.636719 331.671875 
                        216.269531 332.140625 C 213.902344 332.613281 211.527344 333.023438 209.140625 333.378906 C 206.75 
                        333.734375 204.355469 334.027344 201.957031 334.265625 C 199.554688 334.503906 197.148438 334.679688 
                        194.734375 334.796875 C 192.324219 334.917969 189.914062 334.976562 187.5 334.976562 C 185.085938 
                        334.976562 182.675781 334.917969 180.265625 334.796875 C 177.851562 334.679688 175.445312 334.503906 
                        173.042969 334.265625 C 170.644531 334.027344 168.25 333.734375 165.859375 333.378906 C 163.472656 
                        333.023438 161.097656 332.613281 158.730469 332.140625 C 156.363281 331.671875 154.007812 331.140625 
                        151.667969 330.554688 C 149.324219 329.96875 147 329.324219 144.691406 328.625 C 142.378906 
                        327.925781 140.089844 327.167969 137.816406 326.355469 C 135.542969 325.542969 133.292969 324.671875 
                        131.0625 323.75 C 128.832031 322.824219 126.628906 321.847656 124.445312 320.816406 C 122.265625 
                        319.785156 120.109375 318.699219 117.980469 317.5625 C 115.851562 316.425781 113.753906 315.234375 
                        111.683594 313.992188 C 109.613281 312.753906 107.574219 311.460938 105.566406 310.121094 C 103.558594 
                        308.78125 101.585938 307.390625 99.648438 305.953125 C 97.710938 304.515625 95.808594 303.03125 
                        93.941406 301.5 C 92.078125 299.96875 90.25 298.394531 88.460938 296.773438 C 86.671875 295.152344 
                        84.925781 293.488281 83.21875 291.78125 C 81.511719 290.074219 79.847656 288.328125 78.226562 
                        286.539062 C 76.605469 284.75 75.03125 282.921875 73.5 281.058594 C 71.96875 279.191406 70.484375 
                        277.289062 69.046875 275.351562 C 67.609375 273.414062 66.21875 271.441406 64.878906 269.433594 C 
                        63.539062 267.425781 62.246094 265.386719 61.007812 263.316406 C 59.765625 261.246094 58.574219 
                        259.148438 57.4375 257.019531 C 56.300781 254.890625 55.214844 252.734375 54.183594 250.554688 C 
                        53.152344 248.371094 52.175781 246.167969 51.25 243.9375 C 50.328125 241.707031 49.457031 239.457031 
                        48.644531 237.183594 C 47.832031 234.910156 47.074219 232.621094 46.375 230.308594 C 45.675781 228 
                        45.03125 225.675781 44.445312 223.332031 C 43.859375 220.992188 43.328125 218.636719 42.859375 216.269531 C 42.386719 213.902344 41.976562 211.527344 41.621094 209.140625 C 41.265625 206.75 40.972656 204.355469 40.734375 201.957031 C 40.496094 199.554688 40.320312 197.148438 40.203125 194.734375 C 40.082031 192.324219 40.023438 189.914062 40.023438 187.5 C 40.023438 185.085938 40.082031 182.675781 40.203125 180.265625 C 40.320312 177.851562 40.496094 175.445312 40.734375 173.042969 C 40.972656 170.644531 41.265625 168.25 41.621094 165.859375 C 41.976562 163.472656 42.386719 161.097656 42.859375 158.730469 C 43.328125 156.363281 43.859375 154.007812 44.445312 151.667969 C 45.03125 149.324219 45.675781 147 46.375 144.691406 C 47.074219 142.378906 47.832031 140.089844 48.644531 137.816406 C 49.457031 135.542969 50.328125 133.292969 51.25 131.0625 C 52.175781 128.832031 53.152344 126.628906 54.183594 124.445312 C 55.214844 122.265625 56.300781 120.109375 57.4375 117.980469 C 58.574219 115.851562 59.765625 113.753906 61.007812 111.683594 C 62.246094 109.613281 63.539062 107.574219 64.878906 105.566406 C 66.21875 103.558594 67.609375 101.585938 69.046875 99.648438 C 70.484375 97.710938 71.96875 95.808594 73.5 93.941406 C 75.03125 92.078125 76.605469 90.25 78.226562 88.460938 C 79.847656 86.671875 81.511719 84.925781 83.21875 83.21875 C 84.925781 81.511719 86.671875 79.847656 88.460938 78.226562 C 90.25 76.605469 92.078125 75.03125 93.941406 73.5 C 95.808594 71.96875 97.710938 70.484375 99.648438 69.046875 C 101.585938 67.609375 103.558594 66.21875 105.566406 64.878906 C 107.574219 63.539062 109.613281 62.246094 111.683594 61.007812 C 113.753906 59.765625 115.851562 58.574219 117.980469 57.4375 C 120.109375 56.300781 122.265625 55.214844 124.445312 54.183594 C 126.628906 53.152344 128.832031 52.175781 131.0625 51.25 C 133.292969 50.328125 135.542969 49.457031 137.816406 48.644531 C 140.089844 47.832031 142.378906 47.074219 144.691406 46.375 C 147 45.675781 149.324219 45.03125 151.667969 44.445312 C 154.007812 43.859375 156.363281 43.328125 158.730469 42.859375 C 161.097656 42.386719 163.472656 41.976562 165.859375 41.621094 C 168.25 41.265625 170.644531 40.972656 173.042969 40.734375 C 175.445312 40.496094 177.851562 40.320312 180.265625 40.203125 C 182.675781 40.082031 185.085938 40.023438 187.5 40.023438 C 189.914062 40.023438 192.324219 40.082031 194.734375 40.203125 C 197.148438 40.320312 199.554688 40.496094 201.957031 40.734375 C 204.355469 40.972656 206.75 41.265625 209.140625 41.621094 C 211.527344 41.976562 213.902344 42.386719 216.269531 42.859375 C 218.636719 43.328125 220.992188 43.859375 223.332031 44.445312 C 225.675781 45.03125 228 45.675781 230.308594 46.375 C 232.621094 47.074219 234.910156 47.832031 237.183594 48.644531 C 239.457031 49.457031 241.707031 50.328125 243.9375 51.25 C 246.167969 52.175781 248.371094 53.152344 250.554688 54.183594 C 252.734375 55.214844 254.890625 56.300781 257.019531 57.4375 C 259.148438 58.574219 261.246094 59.765625 263.316406 61.007812 C 265.386719 62.246094 267.425781 63.539062 269.433594 64.878906 C 271.441406 66.21875 273.414062 67.609375 275.351562 69.046875 C 277.289062 70.484375 279.191406 71.96875 281.058594 73.5 C 282.921875 75.03125 284.75 76.605469 286.539062 78.226562 C 288.328125 79.847656 290.074219 81.511719 291.78125 83.21875 C 293.488281 84.925781 295.152344 86.671875 296.773438 88.460938 C 298.394531 90.25 299.96875 92.078125 301.5 93.941406 C 303.03125 95.808594 304.515625 97.710938 305.953125 99.648438 C 307.390625 101.585938 308.78125 103.558594 310.121094 105.566406 C 311.460938 107.574219 312.753906 109.613281 313.992188 111.683594 C 315.234375 113.753906 316.425781 115.851562 317.5625 117.980469 C 318.699219 120.109375 319.785156 122.265625 320.816406 124.445312 C 321.847656 126.628906 322.824219 128.832031 323.75 131.0625 C 324.671875 133.292969 325.542969 135.542969 326.355469 137.816406 C 327.167969 140.089844 327.925781 142.378906 328.625 144.691406 C 329.324219 147 329.96875 149.324219 330.554688 151.667969 C 331.140625 154.007812 331.671875 156.363281 332.140625 158.730469 C 332.613281 161.097656 333.023438 163.472656 333.378906 165.859375 C 333.734375 168.25 334.027344 170.644531 334.265625 173.042969 C 334.503906 175.445312 334.679688 177.851562 334.796875 180.265625 C 334.917969 182.675781 334.976562 185.085938 334.976562 187.5 Z M 334.976562 187.5 " fill-opacity="1" fill-rule="nonzero"/>
                        <path fill="#ffc86d" d="M 303.4375 187.5 C 303.4375 189.398438 303.390625 191.292969 303.300781 193.1875 C 303.207031 195.085938 303.066406 196.976562 302.878906 198.863281 C 302.695312 200.753906 302.460938 202.636719 302.183594 204.511719 C 301.90625 206.386719 301.582031 208.257812 301.210938 210.117188 C 300.839844 211.980469 300.425781 213.832031 299.964844 215.671875 C 299.503906 217.511719 298.996094 219.339844 298.445312 221.15625 C 297.894531 222.972656 297.300781 224.773438 296.660156 226.558594 C 296.023438 228.34375 295.339844 230.113281 294.613281 231.867188 C 293.886719 233.621094 293.117188 235.355469 292.308594 237.070312 C 291.496094 238.785156 290.644531 240.480469 289.75 242.152344 C 288.855469 243.828125 287.917969 245.476562 286.945312 247.105469 C 285.96875 248.730469 284.953125 250.335938 283.898438 251.914062 C 282.84375 253.488281 281.753906 255.039062 280.621094 256.566406 C 279.492188 258.089844 278.324219 259.585938 277.121094 261.050781 C 275.917969 262.519531 274.679688 263.953125 273.40625 265.359375 C 272.132812 266.765625 270.824219 268.140625 269.480469 269.480469 C 268.140625 270.824219 266.765625 272.132812 265.359375 273.40625 C 263.953125 274.679688 262.519531 275.917969 261.050781 277.121094 C 259.585938 278.324219 258.089844 279.492188 256.566406 280.625 C 255.039062 281.753906 253.488281 282.84375 251.914062 283.898438 C 250.335938 284.953125 248.730469 285.96875 247.105469 286.945312 C 245.476562 287.917969 243.828125 288.855469 242.152344 289.75 C 240.480469 290.644531 238.785156 291.496094 237.070312 292.308594 C 235.355469 293.117188 233.621094 293.886719 231.867188 294.613281 C 230.113281 295.339844 228.34375 296.023438 226.558594 296.660156 C 224.773438 297.300781 222.972656 297.894531 221.15625 298.445312 C 219.339844 298.996094 217.511719 299.503906 215.671875 299.964844 C 213.832031 300.425781 211.980469 300.839844 210.117188 301.210938 C 208.257812 301.582031 206.386719 301.90625 204.511719 302.183594 C 202.636719 302.460938 200.753906 302.695312 198.863281 302.878906 C 196.976562 303.066406 195.085938 303.207031 193.1875 303.300781 C 191.292969 303.390625 189.398438 303.4375 187.5 303.4375 C 185.601562 303.4375 183.707031 303.390625 181.8125 303.300781 C 179.914062 303.207031 178.023438 303.066406 176.136719 302.878906 C 174.246094 302.695312 172.363281 302.460938 170.488281 302.183594 C 168.609375 301.90625 166.742188 301.582031 164.882812 301.210938 C 163.019531 300.839844 161.167969 300.425781 159.328125 299.964844 C 157.488281 299.503906 155.660156 298.996094 153.84375 298.445312 C 152.027344 297.894531 150.226562 297.300781 148.441406 296.660156 C 146.65625 296.023438 144.886719 295.339844 143.132812 294.613281 C 141.378906 293.886719 139.644531 293.117188 137.929688 292.308594 C 136.214844 291.496094 134.519531 290.644531 132.847656 289.75 C 131.171875 288.855469 129.523438 287.917969 127.894531 286.945312 C 126.269531 285.96875 124.664062 284.953125 123.085938 283.898438 C 121.511719 282.84375 119.960938 281.753906 118.433594 280.621094 C 116.910156 279.492188 115.414062 278.324219 113.949219 277.121094 C 112.480469 275.917969 111.046875 274.679688 109.640625 273.40625 C 108.234375 272.132812 106.859375 270.824219 105.519531 269.480469 C 104.175781 268.140625 102.867188 266.765625 101.59375 265.359375 C 100.320312 263.953125 99.082031 262.519531 97.878906 261.050781 C 96.675781 259.585938 95.507812 258.089844 94.375 256.566406 C 93.246094 255.039062 92.15625 253.488281 91.101562 251.914062 C 90.046875 250.335938 89.03125 248.730469 88.054688 247.105469 C 87.082031 245.476562 86.144531 243.828125 85.25 242.152344 C 84.355469 240.480469 83.503906 238.785156 82.691406 237.070312 C 81.882812 235.355469 81.113281 233.621094 80.386719 231.867188 C 79.660156 230.113281 78.976562 228.34375 78.339844 226.558594 C 77.699219 224.773438 77.105469 222.972656 76.554688 221.15625 C 76.003906 219.339844 75.496094 217.511719 75.035156 215.671875 C 74.574219 213.832031 74.160156 211.980469 73.789062 210.117188 C 73.417969 208.257812 73.09375 206.386719 72.816406 204.511719 C 72.539062 202.636719 72.304688 200.753906 72.121094 198.863281 C 71.933594 196.976562 71.792969 195.085938 71.699219 193.1875 C 71.609375 191.292969 71.5625 189.398438 71.5625 187.5 C 71.5625 185.601562 71.609375 183.707031 71.699219 181.8125 C 71.792969 179.914062 71.933594 178.023438 72.121094 176.136719 C 72.304688 174.246094 72.539062 172.363281 72.816406 170.488281 C 73.09375 168.609375 73.417969 166.742188 73.789062 164.882812 C 74.160156 163.019531 74.574219 161.167969 75.035156 159.328125 C 75.496094 157.488281 76.003906 155.660156 76.554688 153.84375 C 77.105469 152.027344 77.699219 150.226562 78.339844 148.441406 C 78.976562 146.65625 79.660156 144.886719 80.386719 143.132812 C 81.113281 141.378906 81.882812 139.644531 82.691406 137.929688 C 83.503906 136.214844 84.355469 134.519531 85.25 132.847656 C 86.144531 131.171875 87.082031 129.523438 88.054688 127.894531 C 89.03125 126.269531 90.046875 124.664062 91.101562 123.085938 C 92.15625 121.511719 93.246094 119.960938 94.375 118.433594 C 95.507812 116.910156 96.675781 115.414062 97.878906 113.949219 C 99.082031 112.480469 100.320312 111.046875 101.59375 109.640625 C 102.867188 108.234375 104.175781 106.859375 105.519531 105.519531 C 106.859375 104.175781 108.234375 102.867188 109.640625 101.59375 C 111.046875 100.320312 112.480469 99.082031 113.949219 97.878906 C 115.414062 96.675781 116.910156 95.507812 118.433594 94.375 C 119.960938 93.246094 121.511719 92.15625 123.085938 91.101562 C 124.664062 90.046875 126.269531 89.03125 127.894531 88.054688 C 129.523438 87.082031 131.171875 86.144531 132.847656 85.25 C 134.519531 84.355469 136.214844 83.503906 137.929688 82.691406 C 139.644531 81.882812 141.378906 81.113281 143.132812 80.386719 C 144.886719 79.660156 146.65625 78.976562 148.441406 78.339844 C 150.226562 77.699219 152.027344 77.105469 153.84375 76.554688 C 155.660156 76.003906 157.488281 75.496094 159.328125 75.035156 C 161.167969 74.574219 163.019531 74.160156 164.882812 73.789062 C 166.742188 73.417969 168.609375 73.09375 170.488281 72.816406 C 172.363281 72.539062 174.246094 72.304688 176.136719 72.121094 C 178.023438 71.933594 179.914062 71.792969 181.8125 71.699219 C 183.707031 71.609375 185.601562 71.5625 187.5 71.5625 C 189.398438 71.5625 191.292969 71.609375 193.1875 71.699219 C 195.085938 71.792969 196.976562 71.933594 198.863281 72.121094 C 200.753906 72.304688 202.636719 72.539062 204.511719 72.816406 C 206.386719 73.09375 208.257812 73.417969 210.117188 73.789062 C 211.980469 74.160156 213.832031 74.574219 215.671875 75.035156 C 217.511719 75.496094 219.339844 76.003906 221.15625 76.554688 C 222.972656 77.105469 224.773438 77.699219 226.558594 78.339844 C 228.34375 78.976562 230.113281 79.660156 231.867188 80.386719 C 233.621094 81.113281 235.355469 81.882812 237.070312 82.691406 C 238.785156 83.503906 240.480469 84.355469 242.152344 85.25 C 243.828125 86.144531 245.476562 87.082031 247.105469 88.054688 C 248.730469 89.03125 250.335938 90.046875 251.914062 91.101562 C 253.488281 92.15625 255.039062 93.246094 256.566406 94.375 C 258.089844 95.507812 259.585938 96.675781 261.050781 97.878906 C 262.519531 99.082031 263.953125 100.320312 265.359375 101.59375 C 266.765625 102.867188 268.140625 104.175781 269.480469 105.519531 C 270.824219 106.859375 272.132812 108.234375 273.40625 109.640625 C 274.679688 111.046875 275.917969 112.480469 277.121094 113.949219 C 278.324219 115.414062 279.492188 116.910156 280.625 118.433594 C 281.753906 119.960938 282.84375 121.511719 283.898438 123.085938 C 284.953125 124.664062 285.96875 126.269531 286.945312 127.894531 C 287.917969 129.523438 288.855469 131.171875 289.75 132.847656 C 290.644531 134.519531 291.496094 136.214844 292.308594 137.929688 C 293.117188 139.644531 293.886719 141.378906 294.613281 143.132812 C 295.339844 144.886719 296.023438 146.65625 296.660156 148.441406 C 297.300781 150.226562 297.894531 152.027344 298.445312 153.84375 C 298.996094 155.660156 299.503906 157.488281 299.964844 159.328125 C 300.425781 161.167969 300.839844 163.019531 301.210938 164.882812 C 301.582031 166.742188 301.90625 168.609375 302.183594 170.488281 C 302.460938 172.363281 302.695312 174.246094 302.878906 176.136719 C 303.066406 178.023438 303.207031 179.914062 303.300781 181.8125 C 303.390625 183.707031 303.4375 185.601562 303.4375 187.5 Z M 303.4375 187.5 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffffff" d="M 181.683594 149.085938 L 181.609375 109.574219 C 181.609375 107.378906 179.816406 105.546875 177.585938 105.546875 L 176.855469 105.546875 C 174.660156 105.546875 172.828125 107.339844 172.828125 109.574219 L 172.828125 143.925781 L 163.28125 143.925781 L 163.28125 109.9375 C 163.28125 107.523438 161.304688 105.546875 158.890625 105.546875 C 156.476562 105.546875 154.5 107.523438 154.5 109.9375 L 154.5 143.925781 L 144.953125 143.925781 L 144.953125 109.574219 C 144.953125 107.378906 143.160156 105.546875 140.925781 105.546875 L 140.195312 105.546875 C 138 105.546875 136.171875 107.339844 136.171875 109.574219 L 136.171875 149.085938 C 136.171875 149.195312 136.171875 149.339844 136.207031 149.488281 C 136.207031 149.597656 136.171875 149.742188 136.171875 149.890625 L 136.171875 152.304688 C 136.171875 161.195312 142.976562 168.546875 151.644531 169.425781 L 151.644531 262.28125 C 151.644531 266.195312 154.828125 269.414062 158.78125 269.414062 C 162.695312 269.414062 165.914062 266.230469 165.914062 262.28125 L 165.914062 169.464844 C 174.695312 168.695312 181.644531 161.304688 181.644531 152.339844 L 181.644531 149.925781 C 181.644531 149.816406 181.644531 149.671875 181.609375 149.523438 C 181.644531 149.378906 181.683594 149.269531 181.683594 149.085938 Z M 181.683594 149.085938 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffffff" d="M 239.816406 140.707031 C 239.816406 120.585938 229.425781 104.269531 216.585938 104.269531 C 203.742188 104.269531 193.355469 120.621094 193.355469 140.707031 C 193.355469 156.878906 200.085938 170.597656 209.414062 175.355469 L 209.414062 263.453125 C 209.414062 267.4375 212.671875 270.695312 216.660156 270.695312 C 220.644531 270.695312 223.902344 267.4375 223.902344 263.453125 L 223.902344 175.316406 C 233.160156 170.523438 239.816406 156.839844 239.816406 140.707031 Z M 239.816406 140.707031 " fill-opacity="1" fill-rule="nonzero"/><path fill="#ffa40b" d="M 188.085938 71.5625 C 183.878906 71.5625 179.742188 71.78125 175.644531 72.21875 C 233.816406 78.4375 279.144531 127.683594 279.144531 187.5 C 279.144531 247.316406 233.816406 296.5625 175.644531 302.78125 C 179.742188 303.21875 183.878906 303.4375 188.085938 303.4375 C 252.109375 303.4375 304.023438 251.523438 304.023438 187.5 C 304.023438 123.476562 252.109375 71.5625 188.085938 71.5625 Z M 188.085938 71.5625 " fill-opacity="1" fill-rule="nonzero"/><g clip-path="url(#ddbf25cd67)"><path fill="#000000" d="M 187.5 337.5 C 167.269531 337.5 147.621094 333.546875 129.109375 325.71875 C 111.257812 318.144531 95.195312 307.355469 81.4375 293.5625 C 67.644531 279.769531 56.855469 263.742188 49.28125 245.890625 C 41.453125 227.378906 37.5 207.730469 37.5 187.5 C 37.5 167.269531 41.453125 147.621094 49.28125 129.109375 C 56.855469 111.257812 67.644531 95.195312 81.4375 81.4375 C 95.230469 67.644531 111.257812 56.855469 129.109375 49.28125 C 147.621094 41.453125 167.269531 37.5 187.5 37.5 C 207.730469 37.5 227.378906 41.453125 245.890625 49.28125 C 263.742188 56.855469 279.804688 67.644531 293.5625 81.4375 C 307.355469 95.230469 318.144531 111.257812 325.71875 129.109375 C 333.546875 147.621094 337.5 167.269531 337.5 187.5 C 337.5 207.730469 333.546875 227.378906 325.71875 245.890625 C 318.144531 263.742188 307.355469 279.804688 293.5625 293.5625 C 279.769531 307.316406 263.742188 318.144531 245.890625 325.71875 C 227.378906 333.546875 207.730469 337.5 187.5 337.5 Z M 187.5 44.816406 C 168.21875 44.816406 149.5625 48.585938 131.964844 56.011719 C 114.988281 63.183594 99.730469 73.5 86.597656 86.597656 C 73.5 99.695312 63.21875 114.953125 56.011719 131.964844 C 48.585938 149.5625 44.816406 168.21875 44.816406 187.5 C 44.816406 206.78125 48.585938 225.4375 56.011719 243.035156 C 63.183594 260.011719 73.5 275.269531 86.597656 288.402344 C 99.695312 301.5 114.953125 311.78125 131.964844 318.988281 C 149.5625 326.414062 168.21875 330.183594 187.5 330.183594 C 206.78125 330.183594 225.4375 326.414062 243.035156 318.988281 C 260.011719 311.816406 275.269531 301.5 288.402344 288.402344 C 301.535156 275.304688 311.78125 260.046875 318.988281 243.035156 C 326.414062 225.4375 330.183594 206.78125 330.183594 187.5 C 330.183594 168.21875 326.414062 149.5625 318.988281 131.964844 C 311.816406 114.988281 301.5 99.730469 288.402344 86.597656 C 275.304688 73.5 260.046875 63.21875 243.035156 56.011719 C 225.4375 48.585938 206.78125 44.816406 187.5 44.816406 Z M 187.5 44.816406 " fill-opacity="1" fill-rule="nonzero"/></g><path fill="#000000" d="M 187.5 306.328125 C 155.742188 306.328125 125.925781 293.964844 103.464844 271.535156 C 81.035156 249.074219 68.671875 219.257812 68.671875 187.5 C 68.671875 155.742188 81.035156 125.925781 103.464844 103.464844 C 125.925781 81 155.742188 68.671875 187.5 68.671875 C 219.257812 68.671875 249.074219 81.035156 271.535156 103.464844 C 294 125.925781 306.328125 155.742188 306.328125 187.5 C 306.328125 219.257812 293.964844 249.074219 271.535156 271.535156 C 249.074219 293.964844 219.257812 306.328125 187.5 306.328125 Z M 187.5 75.988281 C 157.71875 75.988281 129.695312 87.585938 108.621094 108.660156 C 87.585938 129.695312 75.988281 157.71875 75.988281 187.5 C 75.988281 217.28125 87.585938 245.304688 108.660156 266.378906 C 129.730469 287.453125 157.71875 299.046875 187.535156 299.046875 C 217.316406 299.046875 245.339844 287.453125 266.414062 266.378906 C 287.488281 245.304688 299.085938 217.316406 299.085938 187.5 C 299.085938 157.71875 287.488281 129.695312 266.414062 108.621094 C 245.304688 87.585938 217.28125 75.988281 187.5 75.988281 Z M 187.5 75.988281 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 158.816406 274.355469 C 152.816406 274.355469 147.914062 269.453125 147.914062 263.453125 L 147.914062 172.207031 C 144.035156 171.183594 140.488281 169.023438 137.707031 165.988281 C 134.160156 162.074219 132.183594 157.023438 132.183594 151.792969 L 132.183594 149.339844 C 132.183594 149.195312 132.183594 149.085938 132.183594 148.976562 C 132.183594 148.792969 132.183594 148.609375 132.183594 148.5 L 132.183594 108.367188 C 132.183594 104.085938 135.660156 100.644531 139.902344 100.644531 L 140.632812 100.644531 C 144.914062 100.644531 148.355469 104.121094 148.355469 108.367188 L 148.355469 139.574219 L 150.730469 139.574219 L 150.730469 108.730469 C 150.730469 104.269531 154.355469 100.609375 158.855469 100.609375 C 163.316406 100.609375 166.976562 104.230469 166.976562 108.730469 L 166.976562 139.574219 L 169.355469 139.574219 L 169.355469 108.367188 C 169.355469 104.085938 172.828125 100.644531 177.074219 100.644531 L 177.804688 100.644531 C 182.085938 100.644531 185.523438 104.121094 185.523438 108.367188 L 185.597656 148.464844 C 185.597656 148.609375 185.597656 148.71875 185.597656 148.828125 C 185.597656 149.011719 185.597656 149.195312 185.597656 149.304688 L 185.597656 151.757812 C 185.597656 161.488281 178.828125 169.902344 169.644531 172.242188 L 169.644531 263.453125 C 169.71875 269.453125 164.816406 274.355469 158.816406 274.355469 Z M 139.535156 149.523438 L 139.535156 151.792969 C 139.535156 158.78125 144.988281 164.816406 151.976562 165.511719 C 153.839844 165.695312 155.269531 167.269531 155.269531 169.132812 L 155.269531 263.453125 C 155.269531 265.425781 156.878906 267.035156 158.855469 267.035156 C 160.828125 267.035156 162.4375 265.425781 162.4375 263.453125 L 162.4375 169.171875 C 162.4375 167.269531 163.902344 165.695312 165.769531 165.511719 C 172.828125 164.890625 178.390625 158.855469 178.390625 151.757812 L 178.390625 149.453125 C 178.355469 149.269531 178.355469 149.085938 178.355469 148.902344 C 178.355469 148.644531 178.390625 148.464844 178.390625 148.316406 L 178.316406 108.402344 C 178.316406 108.183594 178.132812 107.964844 177.914062 107.964844 L 177.183594 107.964844 C 176.964844 107.964844 176.78125 108.144531 176.78125 108.367188 L 176.78125 143.230469 C 176.78125 145.242188 175.132812 146.890625 173.121094 146.890625 L 163.355469 146.890625 C 161.339844 146.890625 159.695312 145.242188 159.695312 143.230469 L 159.695312 108.730469 C 159.695312 108.292969 159.328125 107.925781 158.890625 107.925781 C 158.453125 107.925781 158.085938 108.292969 158.085938 108.730469 L 158.085938 143.230469 C 158.085938 145.242188 156.4375 146.890625 154.425781 146.890625 L 144.730469 146.890625 C 142.71875 146.890625 141.074219 145.242188 141.074219 143.230469 L 141.074219 108.367188 C 141.074219 108.144531 140.890625 107.964844 140.671875 107.964844 L 139.9375 107.964844 C 139.71875 107.964844 139.535156 108.144531 139.535156 108.367188 L 139.535156 148.355469 C 139.574219 148.535156 139.574219 148.71875 139.574219 148.902344 C 139.574219 149.160156 139.535156 149.378906 139.535156 149.523438 Z M 178.425781 149.816406 Z M 139.464844 148.023438 Z M 139.464844 148.023438 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 216.621094 274.355469 C 210.621094 274.355469 205.71875 269.453125 205.71875 263.453125 L 205.71875 177.476562 C 196.023438 171.21875 189.660156 156.804688 189.660156 140.742188 C 189.660156 130.316406 192.292969 120.476562 197.046875 113.011719 C 202.132812 105.035156 209.046875 100.644531 216.585938 100.644531 C 224.121094 100.644531 231.035156 105.035156 236.121094 113.011719 C 240.878906 120.476562 243.511719 130.316406 243.511719 140.742188 C 243.511719 156.769531 237.183594 171.144531 227.5625 177.4375 L 227.5625 263.488281 C 227.523438 269.453125 222.660156 274.355469 216.621094 274.355469 Z M 216.585938 107.964844 C 205.976562 107.964844 197.011719 122.964844 197.011719 140.742188 C 197.011719 155.011719 202.792969 167.925781 211.0625 172.132812 C 212.304688 172.757812 213.074219 174 213.074219 175.390625 L 213.074219 263.488281 C 213.074219 265.464844 214.683594 267.074219 216.660156 267.074219 C 218.632812 267.074219 220.242188 265.464844 220.242188 263.488281 L 220.242188 175.316406 C 220.242188 173.964844 221.011719 172.683594 222.21875 172.0625 C 230.453125 167.816406 236.195312 154.902344 236.195312 140.707031 C 236.160156 122.964844 227.195312 107.964844 216.585938 107.964844 Z M 216.585938 107.964844 " fill-opacity="1" fill-rule="nonzero"/><path fill="#000000" d="M 220.425781 113.707031 C 219.804688 113.269531 219.035156 113.085938 218.269531 113.230469 C 217.5 113.378906 216.804688 113.816406 216.367188 114.4375 C 215.925781 115.0625 215.742188 115.828125 215.890625 116.597656 C 216.035156 117.367188 216.476562 118.0625 217.132812 118.5 C 220.9375 121.097656 225.511719 127.355469 225.660156 142.5 C 225.660156 143.269531 225.953125 144 226.5 144.546875 C 227.046875 145.097656 227.742188 145.390625 228.546875 145.390625 C 228.585938 145.390625 228.585938 145.390625 228.621094 145.390625 L 228.730469 145.390625 C 230.269531 145.316406 231.476562 144.074219 231.546875 142.464844 C 231.367188 128.488281 227.523438 118.535156 220.425781 113.707031 Z M 220.425781 113.707031 " fill-opacity="1" fill-rule="nonzero"/>
                        <path fill="#000000" d="M 231.660156 150.511719 C 231.660156 150.875 231.589844 151.226562 231.449219 151.5625 C 231.308594 151.898438 231.113281 152.195312 230.855469 152.453125 C 230.597656 152.710938 230.300781 152.90625 229.964844 153.046875 C 229.628906 153.1875 229.277344 153.257812 228.914062 153.257812 C 228.550781 153.257812 228.199219 153.1875 227.863281 153.046875 C 227.527344 152.90625 227.230469 152.710938 226.972656 152.453125 C 226.71875 152.195312 226.519531 151.898438 226.378906 151.5625 C 226.242188 151.226562 226.171875 150.875 226.171875 150.511719 C 226.171875 150.148438 226.242188 149.796875 226.378906 149.460938 C 226.519531 149.125 226.71875 148.828125 226.972656 148.570312 C 227.230469 148.316406 227.527344 148.117188 227.863281 147.976562 C 228.199219 147.835938 228.550781 147.769531 228.914062 147.769531 C 229.277344 147.769531 229.628906 147.835938 229.964844 147.976562 C 230.300781 148.117188 230.597656 148.316406 230.855469 148.570312 C 231.113281 148.828125 231.308594 149.125 231.449219 149.460938 C 231.589844 149.796875 231.660156 150.148438 231.660156 150.511719 Z M 231.660156 150.511719 " fill-opacity="1" fill-rule="nonzero"/>
                        <path fill="#000000" d="M 228.914062 153.988281 C 228.035156 153.988281 227.230469 153.660156 226.574219 153.074219 C 225.878906 152.453125 225.476562 151.574219 225.4375 150.660156 C 225.402344 149.742188 225.730469 148.828125 226.355469 148.132812 C 226.976562 147.4375 227.855469 147.035156 228.769531 147 C 229.683594 146.964844 230.597656 147.292969 231.292969 147.914062 C 231.988281 148.535156 232.390625 149.414062 232.425781 150.328125 C 232.464844 151.242188 232.132812 152.160156 231.511719 152.855469 C 230.890625 153.546875 230.011719 153.953125 229.097656 153.988281 C 229.023438 153.988281 228.953125 153.988281 228.914062 153.988281 Z M 228.914062 148.464844 C 228.878906 148.464844 228.839844 148.464844 228.804688 148.464844 C 228.257812 148.5 227.78125 148.71875 227.414062 149.121094 C 227.046875 149.523438 226.867188 150.035156 226.902344 150.585938 C 226.9375 151.132812 227.160156 151.609375 227.5625 151.976562 C 227.964844 152.339844 228.476562 152.523438 229.023438 152.488281 C 229.574219 152.453125 230.046875 152.230469 230.414062 151.828125 C 230.78125 151.425781 230.964844 150.914062 230.925781 150.367188 C 230.890625 149.816406 230.671875 149.339844 230.269531 148.976562 C 229.902344 148.683594 229.425781 148.464844 228.914062 148.464844 Z M 228.914062 148.464844 " fill-opacity="1" fill-rule="nonzero"/>
                    </svg>
                  <h3 class="fira-sans-medium color-brown">DINE IN</h3>
                </div>
                <div id="div-take-out" class="div-choose-size-selection-item">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    width="150"
                    zoomAndPan="magnify"
                    viewBox="0 0 375 374.999991"
                    height="150"
                    preserveAspectRatio="xMidYMid meet" 
                    version="1.0">
                    <defs>
                      <clipPath id="6c7d1e2487">
                        <path d="M 64.3125 94 L 311 94 L 311 337.5 L 64.3125 337.5 Z M 64.3125 94 " clip-rule="nonzero"/>
                      </clipPath>
                      <clipPath id="bda8076491">
                        <path d="M 136 37.5 L 239 37.5 L 239 148 L 136 148 Z M 136 37.5 " clip-rule="nonzero"/>
                      </clipPath>
                    </defs>
                    <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                    <rect x="-37.5" width="450" fill="#ffffff" y="-37.499999" height="449.999989" fill-opacity="1"/>
                    <g clip-path="url(#6c7d1e2487)">
                      <path fill="#efc7a4" d="M 65.433594 166.089844 L 93.503906 102.082031 C 95.546875 97.429688 99.890625 94.59375 104.972656 94.59375 L 270.402344 94.59375 C 275.484375 94.59375 279.832031 97.429688 281.871094 102.082031 L 309.941406 166.089844 C 310.667969 167.746094 310.992188 169.292969 310.992188 171.101562 L 310.992188 325 C 310.992188 331.882812 305.371094 337.5 298.472656 337.5 L 76.902344 337.5 C 70.007812 337.5 64.382812 331.886719 64.382812 325 L 64.382812 171.101562 C 64.382812 169.292969 64.707031 167.746094 65.433594 166.089844 Z M 128.984375 118.257812 C 122.089844 118.257812 116.464844 123.871094 116.464844 130.757812 L 116.464844 156.941406 C 116.464844 163.828125 122.089844 169.441406 128.984375 169.441406 L 246.390625 169.441406 C 253.285156 169.441406 258.910156 163.828125 258.910156 156.941406 L 258.910156 130.757812 C 258.910156 123.871094 253.285156 118.257812 246.390625 118.257812 Z M 128.984375 118.257812 " fill-opacity="1" fill-rule="evenodd"/></g><g clip-path="url(#bda8076491)"><path fill="#d5a889" d="M 160.152344 37.5 L 215.222656 37.5 C 216.945312 37.5 218.351562 38.902344 218.351562 40.625 L 218.351562 56.667969 C 218.351562 57.4375 218.59375 58.101562 219.09375 58.6875 L 235.828125 78.410156 C 237.820312 80.761719 238.792969 83.410156 238.792969 86.488281 C 238.792969 100.261719 238.792969 118.023438 238.792969 130.757812 C 238.792969 136.367188 234.195312 140.960938 228.574219 140.960938 C 222.949219 140.960938 218.351562 136.371094 218.351562 130.757812 L 218.351562 137.007812 C 218.351562 142.617188 213.753906 147.210938 208.128906 147.210938 C 202.507812 147.210938 197.910156 142.621094 197.910156 137.007812 C 197.910156 142.617188 193.308594 147.210938 187.6875 147.210938 C 182.066406 147.210938 177.46875 142.621094 177.46875 137.007812 C 177.46875 142.617188 172.867188 147.210938 167.246094 147.210938 C 161.625 147.210938 157.023438 142.621094 157.023438 137.007812 L 157.023438 118.257812 C 157.023438 123.867188 152.425781 128.460938 146.804688 128.460938 C 141.183594 128.460938 136.582031 123.871094 136.582031 118.257812 L 136.582031 86.488281 C 136.582031 83.410156 137.554688 80.761719 139.550781 78.410156 L 156.28125 58.691406 C 156.78125 58.101562 157.023438 57.441406 157.023438 56.671875 L 157.023438 40.625 C 157.023438 38.902344 158.429688 37.5 160.152344 37.5 Z M 160.152344 37.5 " fill-opacity="1" fill-rule="evenodd"/></g><path fill="#937661" d="M 218.351562 130.757812 L 218.351562 137.007812 C 218.351562 142.125 214.523438 146.394531 209.585938 147.109375 L 209.585938 101.449219 C 209.585938 99.035156 211.550781 97.074219 213.96875 97.074219 C 216.390625 97.074219 218.351562 99.035156 218.351562 101.449219 Z M 197.871094 137.863281 C 197.472656 142.605469 193.785156 146.457031 189.109375 147.113281 L 189.109375 101.449219 C 189.109375 99.035156 191.070312 97.074219 193.492188 97.074219 C 195.910156 97.074219 197.871094 99.035156 197.871094 101.449219 Z M 177.449219 137.59375 C 177.167969 142.453125 173.441406 146.433594 168.683594 147.109375 L 168.683594 101.449219 C 168.683594 99.035156 170.648438 97.074219 173.066406 97.074219 C 175.488281 97.074219 177.449219 99.035156 177.449219 101.449219 Z M 157.023438 118.257812 C 157.023438 123.375 153.199219 127.644531 148.261719 128.355469 L 148.261719 101.449219 C 148.261719 99.035156 150.222656 97.074219 152.640625 97.074219 C 155.0625 97.074219 157.023438 99.035156 157.023438 101.449219 Z M 157.023438 118.257812 " fill-opacity="1" fill-rule="evenodd"/><path fill="#d94452" d="M 148.652344 260.574219 L 187.796875 253.320312 L 226.722656 260.574219 C 234.546875 260.574219 240.949219 266.96875 240.949219 274.78125 C 240.949219 282.59375 234.546875 288.988281 226.722656 288.988281 L 187.941406 298.761719 L 148.652344 288.988281 C 140.828125 288.988281 134.425781 282.59375 134.425781 274.78125 C 134.425781 266.96875 140.828125 260.574219 148.652344 260.574219 Z M 148.652344 260.574219 " fill-opacity="1" fill-rule="evenodd"/><path fill="#eb5463" d="M 148.652344 260.574219 L 174.28125 255.824219 L 201.238281 255.824219 L 226.722656 260.574219 C 229.421875 260.574219 231.953125 261.335938 234.109375 262.65625 C 235.433594 264.808594 236.195312 267.335938 236.195312 270.03125 C 236.195312 277.847656 229.792969 284.238281 221.964844 284.238281 L 143.898438 284.238281 C 141.199219 284.238281 138.667969 283.476562 136.507812 282.160156 C 135.1875 280.003906 134.425781 277.476562 134.425781 274.78125 C 134.425781 266.96875 140.828125 260.574219 148.652344 260.574219 Z M 148.652344 260.574219 " fill-opacity="1" fill-rule="evenodd"/><path fill="#fdcd56" d="M 169.574219 260.574219 L 187.796875 253.320312 L 205.804688 260.574219 L 191.050781 275.304688 C 189.199219 277.152344 186.175781 277.152344 184.324219 275.304688 Z M 169.574219 260.574219 " fill-opacity="1" fill-rule="evenodd"/><path fill="#d5a889" d="M 139.183594 288.988281 L 236.191406 288.988281 C 238.8125 288.988281 240.949219 291.121094 240.949219 293.738281 L 240.949219 305.53125 C 240.949219 312.070312 235.609375 317.402344 229.0625 317.402344 L 146.3125 317.402344 C 139.765625 317.402344 134.425781 312.070312 134.425781 305.53125 L 134.425781 293.738281 C 134.425781 291.121094 136.5625 288.988281 139.183594 288.988281 Z M 139.183594 288.988281 " fill-opacity="1" fill-rule="evenodd"/><path fill="#d94452" d="M 148.652344 232.160156 L 187.148438 226.824219 L 226.722656 232.160156 C 234.546875 232.160156 240.949219 238.554688 240.949219 246.367188 C 240.949219 254.183594 234.546875 260.574219 226.722656 260.574219 L 148.652344 260.574219 C 140.828125 260.574219 134.425781 254.183594 134.425781 246.367188 C 134.425781 238.554688 140.828125 232.160156 148.652344 232.160156 Z M 148.652344 232.160156 " fill-opacity="1" fill-rule="evenodd"/><path fill="#eb5463" d="M 148.652344 232.160156 L 182.90625 227.414062 L 191.511719 227.414062 L 226.722656 232.160156 C 229.421875 232.160156 231.953125 232.921875 234.109375 234.242188 C 235.433594 236.394531 236.195312 238.921875 236.195312 241.621094 C 236.195312 249.433594 229.792969 255.828125 221.964844 255.828125 L 143.898438 255.828125 C 141.199219 255.828125 138.667969 255.066406 136.507812 253.746094 C 135.1875 251.59375 134.425781 249.066406 134.425781 246.367188 C 134.425781 238.554688 140.828125 232.160156 148.652344 232.160156 Z M 148.652344 232.160156 " fill-opacity="1" fill-rule="evenodd"/><path fill="#fdcd56" d="M 148.652344 232.160156 L 166.964844 222.445312 L 184.882812 232.160156 L 170.132812 246.890625 C 168.28125 248.738281 165.257812 248.738281 163.40625 246.890625 Z M 148.652344 232.160156 " fill-opacity="1" fill-rule="evenodd"/><path fill="#d5a889" d="M 162.882812 189.539062 L 212.492188 189.539062 C 228.144531 189.539062 240.949219 202.328125 240.949219 217.953125 L 240.949219 227.410156 C 240.949219 230.027344 238.8125 232.160156 236.195312 232.160156 L 139.183594 232.160156 C 136.5625 232.160156 134.425781 230.027344 134.425781 227.410156 L 134.425781 217.953125 C 134.425781 202.328125 147.230469 189.539062 162.882812 189.539062 Z M 162.882812 189.539062 " fill-opacity="1" fill-rule="evenodd"/><path fill="#efc7a4" d="M 159.796875 214.011719 C 161.898438 214.011719 163.601562 215.710938 163.601562 217.808594 C 163.601562 219.90625 161.898438 221.609375 159.796875 221.609375 C 157.695312 221.609375 155.992188 219.90625 155.992188 217.808594 C 155.992188 215.710938 157.695312 214.011719 159.796875 214.011719 Z M 206.28125 200.09375 C 208.382812 200.09375 210.085938 201.796875 210.085938 203.894531 C 210.085938 205.992188 208.382812 207.691406 206.28125 207.691406 C 204.179688 207.691406 202.476562 205.992188 202.476562 203.894531 C 202.476562 201.796875 204.179688 200.09375 206.28125 200.09375 Z M 169.09375 200.09375 C 171.195312 200.09375 172.898438 201.796875 172.898438 203.894531 C 172.898438 205.992188 171.195312 207.691406 169.09375 207.691406 C 166.992188 207.691406 165.289062 205.992188 165.289062 203.894531 C 165.289062 201.796875 166.992188 200.09375 169.09375 200.09375 Z M 187.6875 200.09375 C 189.789062 200.09375 191.492188 201.796875 191.492188 203.894531 C 191.492188 205.992188 189.789062 207.691406 187.6875 207.691406 C 185.585938 207.691406 183.882812 205.992188 183.882812 203.894531 C 183.882812 201.796875 185.585938 200.09375 187.6875 200.09375 Z M 215.578125 214.011719 C 217.679688 214.011719 219.382812 215.710938 219.382812 217.808594 C 219.382812 219.90625 217.679688 221.609375 215.578125 221.609375 C 213.476562 221.609375 211.773438 219.90625 211.773438 217.808594 C 211.773438 215.710938 213.476562 214.011719 215.578125 214.011719 Z M 196.984375 214.011719 C 199.085938 214.011719 200.789062 215.710938 200.789062 217.808594 C 200.789062 219.90625 199.085938 221.609375 196.984375 221.609375 C 194.882812 221.609375 193.179688 219.90625 193.179688 217.808594 C 193.179688 215.710938 194.882812 214.011719 196.984375 214.011719 Z M 178.390625 214.011719 C 180.492188 214.011719 182.195312 215.710938 182.195312 217.808594 C 182.195312 219.90625 180.492188 221.609375 178.390625 221.609375 C 176.289062 221.609375 174.585938 219.90625 174.585938 217.808594 C 174.585938 215.710938 176.289062 214.011719 178.390625 214.011719 Z M 178.390625 214.011719 " fill-opacity="1" fill-rule="evenodd"/></svg>
                  <h3 class="fira-sans-medium color-brown">TAKE OUT</h3>
                </div>
              </div>
              <div class="div-selected-payment-option">
                <i class="fa-solid fa-circle-check size-15" style="color: #28a745;"></i>
                <h5 class="fira-sans-medium color-dark" style="margin-bottom: 0px;">Pay at the Counter</h5>
              </div>
            </div>
            <div class="modal-footer">
              <button
                type="button"
                id="btn-express-checkout"
                class="btn btn-outline-secondary btn-choose-order fira-sans-medium bg-color-brown color-white">
                <i class="fa-solid fa-credit-card"></i>&nbsp;&nbsp;Checkout
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </body>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://kit.fontawesome.com/b2e03e5a6f.js" crossorigin="anonymous"></script>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous">
  </script>
  <script type="text/javascript" src="./assets/js/index.js"></script>
  <script>
    const toastTrigger = document.getElementById('liveToastBtn')
    const toastLiveExample = document.getElementById('liveToast')
    if (toastTrigger) {
      const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)
      toastTrigger.addEventListener('click', () => {
        toastBootstrap.show()
      });
    }
  </script>
</html>
