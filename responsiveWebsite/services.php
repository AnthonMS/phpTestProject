<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="Affordable and professional Web Design">
    <meta name="keywords" content="web design, affordable, professional">
    <meta name="author" content="Anthon M. Steiness">
    <title>Responsive Web Design | Services</title>
    <link rel="stylesheet" href="./cssResponsive/styleResponsive.css">
</head>

<body>
<header>
    <div class="container">

        <div id="branding">
            <h1><span class="highlight">Acme</span> Web Design</h1>
        </div>

        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li class="current"><a href="services.php">Services</a></li>
            </ul>
        </nav>

    </div>
</header>

<section id="newsletter">
    <div class="container">
        <h1>Subscribe To My Newsletter</h1>
        <form>
            <input type="email" placeholder="Enter Email...">
            <button type="submit" class="button_1">Subscribe</button>
        </form>
    </div>
</section>

<section id="main">
    <div class="container">
        <article id="main-col">
            <h1 class="page-title">Services</h1>
            <ul id="services">
                <li>
                    <h3>Website Design</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel nibh eu augue volutpat placerat a eget leo.</p>
                </li>
                <li>
                    <h3>Website Maintenance</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel nibh eu augue volutpat placerat a eget leo.</p>
                </li>
                <li>
                    <h3>Website Hosting</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur vel nibh eu augue volutpat placerat a eget leo.</p>
                </li>
            </ul>
        </article>

        <aside id="sidebar">
            <div class="dark">
                <h3>Get A Quote</h3>
                <form class="quote">
                    <div>
                        <label>Name</label><br>
                        <input type="text" placeholder="Name">
                    </div>
                    <div>
                        <label>Email</label><br>
                        <input type="email" placeholder="Email Addreess">
                    </div>
                    <div>
                        <label>Message</label><br>
                        <textarea placeholder="Message"></textarea>
                    </div>
                    <button class="button_1" type="submit">Send</button>
                </form>
             </div>
        </aside>
    </div>
</section>

<footer>
    <p>Acme Web Design, Copyright &copy; 2017</p>
</footer>
</body>
</html>