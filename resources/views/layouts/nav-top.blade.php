<!-- =========================
   NAVIGATION SECTION
============================== -->
<nav class="navbar navbar-default" id="my-navbar">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse main-nav" id="navbar-collapse">
                    <ul class="nav navbar-nav main-menu">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Pages</a>
                            <ul class="list-unstyled sub-menu">
                                <li><a href="sample-page.html">Sample Page</a></li>
                                <li><a href="single-property.html">Single Property Page</a></li>
                            </ul>
                        </li>
                        <li><a href="about.html">About</a></li>
                        <li class="active"><a href="blog-right-sidebar.html">Blog</a>
                            <ul class="list-unstyled sub-menu">
                                <li><a href="blog-right-sidebar.html">Blog Right Sidebar</a></li>
                                <li><a href="blog-left-sidebar.html">Blog Left Sidebar</a></li>
                                <li><a href="blog-full-width.html">Blog Full Width</a></li>
                            </ul>
                        </li>
                        <li><a href="gallery.html">Gallery</a></li>
                        <li><a href="#">Appointment</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                    <a href="" data-toggle="modal" data-target="#myModal" class="navbar-right">Schedule Visit</a>
                    <!-- Modal -->
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <h4 class="modal-title">Appointment Form</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="#" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Enter Email">
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Appontment Date">
                                        </div>
                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Enter Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Send Message</button>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div><!-- End Modal -->
                </div>
            </div>
        </div>
    </div><!-- end conainer -->
</nav><!-- end navbar -->
