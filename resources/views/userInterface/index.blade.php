<!DOCTYPE html>
<html>

<head>
@include('userInterface.partials.css') 
@yield('css') 
</head>


<body>
    <div class="preloader">
        <div class="preloader-wrapper">
            <img src="images/ajax-loader.gif" alt="ajax-loader">
        </div>
    </div>
    <ul class="background">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
    </ul>


@include('userInterface.partials.nav')

@yield('content')
    <!-- Site footer -->
    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="footer-img">
                    <img src="images/nityawhite-01.png" style="width:30%; ">

                </div>
            </div>
            <div class="social-icons">
                <ul>
                    <li><a class="facebook" href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a class="insta" href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a class="twitter" href="#"><i class="fab fa-twitter"></i></a></li>

                </ul>
            </div>

            <hr>

            <div class="col-md-12 footer-links privacy">
                <a href="" class="">Privacy Policy</a> &nbsp; || &nbsp;
                <a href="" class="">Terms and Conditions</a>

            </div>

            <div class="copyright-text footer-links">
                <p>Copyright &copy; 2017 All Rights Reserved by &nbsp;
                    <a href="#">NITYASHREE</a>.
                </p>
            </div>


        </div>

    </footer>
    </div>
    <span class="cursor">

  </span>
</body>





<script>
    const cursor = document.querySelector('.cursor');
    document.addEventListener('mousemove', e => {
        cursor.setAttribute("style", "top: " + (e.pageY - 10) + "px; left: " + (e.pageX - 10) + "px;")
    });
    document.addEventListener('click', () => {
        cursor.classList.add("expand");
        setTimeout(() => {
            cursor.classList.remove("expand")
        }, 500);
    });
</script>

<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("mySidenav").style.display = "block";

    }

    function handleNav() {
        if (document.getElementById("mySidenav").style.width == "0px") {
            document.getElementById("mySidenav").style.width = "250px";
            document.getElementById("mySidenav").style.display = "block";
            document.getElementById("navId").innerHTML = "&times;"
            document.getElementById("navId").style.color = "#fff";


        } else {
            document.getElementById("mySidenav").style.width = "0px";
            document.getElementById("navId").innerHTML = "&#9776;"
            document.getElementById("navId").style.color = "#000";

        }
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
    }
</script>
<script>
    var TxtType = function(el, toRotate, period) {
        this.toRotate = toRotate;
        this.el = el;
        this.loopNum = 0;
        this.period = parseInt(period, 10) || 2000;
        this.txt = '';
        this.tick();
        this.isDeleting = false;
    };

    TxtType.prototype.tick = function() {
        var i = this.loopNum % this.toRotate.length;
        var fullTxt = this.toRotate[i];

        if (this.isDeleting) {
            this.txt = fullTxt.substring(0, this.txt.length - 1);
        } else {
            this.txt = fullTxt.substring(0, this.txt.length + 1);
        }

        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

        var that = this;
        var delta = 200 - Math.random() * 100;

        if (this.isDeleting) {
            delta /= 2;
        }

        if (!this.isDeleting && this.txt === fullTxt) {
            delta = this.period;
            this.isDeleting = true;
        } else if (this.isDeleting && this.txt === '') {
            this.isDeleting = false;
            this.loopNum++;
            delta = 500;
        }

        setTimeout(function() {
            that.tick();
        }, delta);
    };

    window.onload = function() {
        var elements = document.getElementsByClassName('typewrite');
        for (var i = 0; i < elements.length; i++) {
            var toRotate = elements[i].getAttribute('data-type');
            var period = elements[i].getAttribute('data-period');
            if (toRotate) {
                new TxtType(elements[i], JSON.parse(toRotate), period);
            }
        }
        // INJECT CSS
        var css = document.createElement("style");
        css.type = "text/css";
        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #fff}";
        document.body.appendChild(css);
    };
</script>


<script>
    $(document).ready(function() {
        //parallax scroll
        $(window).on("load scroll", function() {
            var parallaxElement = $(".parallax"),
                parallaxQuantity = parallaxElement.length;
            window.requestAnimationFrame(function() {
                for (var i = 0; i < parallaxQuantity; i++) {
                    var currentElement = parallaxElement.eq(i),
                        windowTop = $(window).scrollTop(),
                        elementTop = currentElement.offset().top,
                        elementHeight = currentElement.height(),
                        viewPortHeight = window.innerHeight * 0.5 - elementHeight * 0.5,
                        scrolled = windowTop - elementTop + viewPortHeight;
                    currentElement.css({
                        transform: "translate3d(0," + scrolled * 0.44 + "px, 0)"
                    });
                }
            });
        });
    });
</script>


<script>
    $(function() {
        $(".preloader").fadeOut("slow");
    });
</script>
<!-- 
<script>
    $(document).scroll(function() {

        myID = document.getElementById("navId");

        var myScrollFunc = function() {
            var y = window.scrollY;
            if (y >= 10) {
                myID.className = "opennav show"
            } else {
                myID.className = "opennav hide"
            }
        };

        window.addEventListener("scroll", myScrollFunc);
    });
</script> -->


</html>