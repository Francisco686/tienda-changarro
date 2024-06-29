<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Changarro - Tienda de Abarrotes</title>
    <link rel="icon" href="../assets/img/kaiadmin/favicon.ico" type="image/x-icon">

    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: { families: ["Montserrat:300,400,500,600,700"] },
            custom: {
                families: [
                    "Font Awesome 5 Solid",
                    "Font Awesome 5 Regular",
                    "Font Awesome 5 Brands",
                    "simple-line-icons",
                ],
                urls: ["../assets/css/fonts.min.css"],
            },
            active: function () {
                sessionStorage.fonts = true;
            },
        });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/plugins.min.css">
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css">
    <link rel="stylesheet" href="../assets/css/demo.css">

    <style>
        /* Custom styles */
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f0f0f0;
        }
        .sidebar {
            background-color: #37474f;
            color: #fff;
        }
        .sidebar-logo {
            padding: 15px 20px;
            text-align: center;
        }
        .sidebar-logo a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .sidebar-content {
            padding: 20px;
        }
        .nav-secondary .nav-link {
            color: #ccc;
        }
        .nav-secondary .nav-link:hover {
            color: #fff;
        }
        .jumbotron {
            background-color: #007bff;
            color: #fff;
            padding: 100px 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        .jumbotron h1 {
            font-size: 3rem;
            font-weight: bold;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        .jumbotron p {
            font-size: 1.5rem;
            margin-bottom: 30px;
        }
        .jumbotron .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
            font-size: 1.2rem;
            padding: 10px 20px;
        }
        .jumbotron .btn-primary:hover {
            background-color: #00408a;
            border-color: #00408a;
        }
        .row {
            margin-bottom: 30px;
        }
        .col-lg-4 {
            text-align: center;
            padding: 0 15px;
        }
        .col-lg-4 h2 {
            font-size: 2.5rem;
            margin-bottom: 20px;
            color: #007bff;
        }
        .col-lg-4 ul {
            list-style-type: none;
            padding: 0;
        }
        .col-lg-4 ul li {
            margin-bottom: 10px;
        }
        .col-lg-4 blockquote {
            font-style: italic;
            border-left: 5px solid #007bff;
            padding-left: 10px;
            margin-top: 20px;
            color: #555;
        }
        .cart {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
            display: flex;
            align-items: center;
        }
        .cart a {
            color: #ffcc00; /* Color amarillo para el icono del carrito */
            text-decoration: none;
            font-size: 1.8rem;
        }
        .cart-content {
            position: fixed;
            top: 0;
            right: 0;
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
            transform: translateX(100%);
            transition: transform 0.3s ease-in-out;
            z-index: 1000;
            padding: 20px;
        }
        .cart-content.open {
            transform: translateX(0);
        }
        .cart-close {
            position: absolute;
            top: 20px;
            right: 20px;
            cursor: pointer;
        }
        .cart-item {
            margin-bottom: 10px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }
        .cart-item:last-child {
            border-bottom: none;
            margin-bottom: 0;
            padding-bottom: 0;
        }
        .cart-item-title {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="sidebar-logo">
                <a href="../index.html" class="logo">
                    <img src="../assets/img/changarro.jpg" alt="El Changarro Logo" height="50">
                </a>
            </div>
            <div class="sidebar-wrapper scrollbar scrollbar-inner">
                <div class="sidebar-content">
                    <ul class="nav nav-secondary">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home.index') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('productos.index') }}">Productos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('ventas.index') }}">Ventas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('provedors.index') }}">Proveedores</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('empleados.index') }}">Empleados</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('entradas.create') }}">Entradas</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('tickets.create') }}">Tickets</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('telefonos.create') }}">Teléfonos</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('venta_mayoreo.create') }}">Ventas Mayoreo</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-panel">
            <main class="main-content">
                <div class="container-fluid">
                    <!-- Cart -->
                    <div class="cart" id="cart">
                        <a href="{{ url('/register') }}" class="btn btn-primary btn-lg">Regístrate Ahora</a>
                        <a href="#" id="cart-toggle">
                            <i class="fas fa-shopping-cart" style="color: #ffcc00;"></i> <!-- Icono del carrito en color amarillo -->
                            <span id="cart-count">0</span>
                        </a>
                    </div>

                    <!-- Cart Content -->
                    <div class="cart-content" id="cart-content">
                        <div class="cart-close" id="cart-close">
                            <i class="fas fa-times"></i>
                        </div>
                        <h3>Carrito de Compras</h3>
                        <div id="cart-items"></div>
                    </div>

                    <!-- Dashboard -->
                    <div class="jumbotron">
                        <h1 class="display-4">¡Bienvenido a "El Changarro"!</h1>
                        <p class="lead">Tu tienda favorita de bebidas y alimentos.</p>
                        <hr class="my-4">
                        <p>Somos expertos en ofrecerte productos abarroteros de la más alta calidad.</p>
                    </div>

                    <!-- About, Services, Testimonials -->
                    <div class="row">
                        <div class="col-lg-4">
                            <h2>Sobre Nosotros</h2>
                            <p>Somos una empresa apasionada por brindar la mejor atención y calidad en nuestros productos.</p>
                        </div>
                        <div class="col-lg-4">
                            <h2>Servicios</h2>
                            <ul>
                                <li>Productos frescos y de calidad.</li>
                                <li>Atención al cliente excepcional.</li>
                            </ul>
                        </div>
                        <div class="col-lg-4">
                            <h2>Testimonios</h2>
                            <blockquote>
                                <p>"Siempre me sorprende la dedicación y variedad de productos que ofrecen."</p>
                                <cite>Cliente Satisfecho</cite>
                            </blockquote>
                        </div>
                    </div>

                    <!-- Products -->
                    <h2>Productos</h2>
                    <div class="row">
                        @forelse($productos as $producto)
                            <div class="col-md-4">
                                <div class="card mb-4">
                                    @if ($producto->imagen)
                                        <img src="{{ asset('storage/' . str_replace('public/', '', $producto->imagen)) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                                    @else
                                        <img src="{{ asset('storage/default.jpg') }}" class="card-img-top" alt="Imagen por defecto">
                                    @endif
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                                        <p class="card-text">{{ $producto->descripcion }}</p>
                                        <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                                        <button class="btn btn-primary add-to-cart" data-id="{{ $producto->id }}">Añadir al carrito</button>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>No hay productos disponibles.</p>
                        @endforelse
                    </div>

                    <!-- Contact Form -->
                    <h2>Contacto</h2>
                    <form action="{{ url('/contact') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Correo Electrónico:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mensaje:</label>
                            <textarea class="form-control" id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Enviar</button>
                    </form>
                </div>
            </main>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="../assets/js/plugin/chart.js/chart.min.js"></script>
    <script src="../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>
    <script src="../assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <script src="../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>
    <script src="../assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="../assets/js/plugin/jsvectormap/world.js"></script>
    <script src="../assets/js/plugin/gmaps/gmaps.js"></script>
    <script src="../assets/js/plugin/sweetalert/sweetalert.min.js"></script>
    <script src="../assets/js/kaiadmin.min.js"></script>
    <script src="../assets/js/setting-demo2.js"></script>

    <script>
        $(document).ready(function() {
            // Toggle cart content
            $('#cart-toggle').on('click', function(e) {
                e.preventDefault();
                $('#cart-content').toggleClass('open');
            });

            // Close cart content
            $('#cart-close').on('click', function() {
                $('#cart-content').removeClass('open');
            });

            // Add to cart functionality
            $('.add-to-cart').on('click', function() {
                let productId = $(this).data('id');
                let productName = $(this).closest('.card-body').find('.card-title').text();
                let productPrice = $(this).closest('.card-body').find('.card-text strong').text().replace('Precio: $', '');
                let cartCount = $('#cart-count').text();
                $('#cart-count').text(parseInt(cartCount) + 1);

                let cartItem = `
                    <div class="cart-item">
                        <p class="cart-item-title">${productName}</p>
                        <p class="cart-item-price">$${productPrice}</p>
                    </div>
                `;
                $('#cart-items').append(cartItem);
            });
        });
    </script>
</body>
</html>
