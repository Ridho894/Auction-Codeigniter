<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">Auction</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= $title === "Home | Auction" ? 'active' : ''; ?>">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === "About | Auction" ? 'active' : ''; ?>" href="/pages/about">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === "Contact Us | Auction" ? 'active' : ''; ?>" href="/pages/contact">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $title === "Daftar Product" ? 'active' : ''; ?>" href="/product">My Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orang">Orang</a>
                </li>
            </ul>
            <?php if (logged_in()) : ?>
                <a href="/logout" class="btn btn-danger" type="button">LOGOUT</a>
            <?php else : ?>
                <a href="/login" class="btn btn-primary" type="button">LOGIN</a>
                <a href="/register" class="btn btn-danger ml-3" type="button">REGISTER</a>
            <?php endif; ?>
        </div>
    </div>
</nav>