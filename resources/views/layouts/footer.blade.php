<!-- ##### Footer Area Start ##### -->
<footer class="footer_area clearfix padding-top-30 padding-bottom-30" style="background-color: white">
  <div class="container">
    <div class="row">
      <!-- Single Widget Area -->
      <div class="col-12 col-md-6">
        <div class="single_widget_area d-flex mb-30">
          <!-- Logo -->
          <div class="footer-logo mr-50">
            <a href="#"><img src="/img/core-img/bravel-logo.png" alt="" style="max-width: 160px;"></a>
          </div>
          <!-- Footer Menu -->
          <div class="footer_menu">
            <ul>
              {{-- <li><a href="/shop" style="color: black">Shop</a></li> --}}
              {{-- <li><a href="blog.html">Blog</a></li> --}}
              {{-- <li><a href="/contact">Contact Us</a></li> --}}
            </ul>
          </div>
        </div>
      </div>
      <!-- Single Widget Area -->
      {{-- <div class="col-12 col-md-6">
        <div class="single_widget_area mb-30">
          <ul class="footer_widget_menu">
            @if (Auth::user())
              <li><a href="/carts/{{ $globalCart->id }}" style="color: black">My Cart</a></li>
            @endif
          </ul>
        </div>
      </div> --}}
      {{-- <div class="col-12 col-md-6">
        <div class="single_widget_area">
          <div class="footer_heading mb-30">
            <h6>Subscribe</h6>
          </div>
          <div class="subscribtion_form">
            {!! Form::open(['url' => '/newsletters', 'method' => 'POST']) !!}
              <input name="first_name" placeholder="First Name" style="color: black" required>
              <input name="last_name" placeholder="Last Name" style="color: black" required>
              <input type="email" name="email" placeholder="Your email here" style="color: black" required>
              <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
            {{ Form::close() }}
          </div>
        </div>
      </div> --}}
      <div class="col-md-4 offset-md-1 col-sm-12">
        <p class="mb-4 foot-title mbr-fonts-style display-7">
          SUBSCRIBE
        </p>
        <p class="mbr-text mbr-fonts-style form-text display-7">
          Get monthly updates and free resources.
        </p>

        {!! Form::open(['url' => '/newsletters', 'method' => 'POST', 'class' => 'justify-content-center d-flex']) !!}
          <div class="col-sm-6 p-0 padding-right-5">
            <input type="email" class="form-control w-100" name="email" placeholder="Email" required>
          </div>
          <div class="col-sm-6 p-0 padding-left-5">
            <button class="btn btn-primary w-100" type="submit">Subscribe</button>
          </div>
        {{ Form::close() }}
        <p class="mb-4 mbr-fonts-style foot-title display-7">
          CONNECT WITH US
        </p>
        {{-- <div class="social-list pl-0 mb-0">
          <div class="soc-item">
            <a href="https://twitter.com/mobirise" target="_blank">
              <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
            </a>
          </div>
          <div class="soc-item">
            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
              <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
            </a>
          </div>
          <div class="soc-item">
            <a href="https://www.youtube.com/c/mobirise" target="_blank">
              <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
            </a>
          </div>
          <div class="soc-item">
            <a href="https://instagram.com/mobirise" target="_blank">
              <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
            </a>
          </div>
          <div class="soc-item">
            <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
              <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
            </a>
          </div>
          <div class="soc-item">
            <a href="https://www.behance.net/Mobirise" target="_blank">
              <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
            </a>
          </div>
        </div> --}}
      </div>
    </div>

    <div class="row align-items-end">
      <!-- Single Widget Area -->
      {{-- <div class="col-12 col-md-6">
        <div class="single_widget_area">
          <div class="footer_heading mb-30">
            <h6>Subscribe</h6>
          </div>
          <div class="subscribtion_form">
            <form action="#" method="post">
            {!! Form::open(['url' => '/newsletters', 'method' => 'POST']) !!}
              <input type="email" name="mail" class="mail" placeholder="Your email here">
              <button type="submit" class="submit"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
              {{ Form::close() }}
          </div>
        </div>
      </div> --}}
      <!-- Single Widget Area -->
      {{-- <div class="col-12 col-md-6">
        <div class="single_widget_area">
          <div class="footer_social_area">
            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
          </div>
        </div>
      </div> --}}
    </div>

  </div>
</footer>
<!-- ##### Footer Area End ##### -->
{{-- 
  <section class="footer4 cid-qv5AL7fBTQ" id="footer4-3i" data-rv-view="4081">
    <div class="container">
        <div class="media-container-row content mbr-white">
            <div class="col-md-3 col-sm-4">
                <div class="mb-3 img-logo">
                    <a href="https://mobirise.com/">
                        <img src="assets/images/logo2.png" alt="Mobirise" media-simple="true">
                    </a>
                </div>
                <p class="mb-3 mbr-fonts-style foot-title display-7">
                    Footer Template
                </p>
                <p class="mbr-text mbr-fonts-style mbr-links-column display-7">
                    <a href="#" class="text-white">About Us</a>
                    <br><a href="#" class="text-white">Services</a>
                    <br><a href="#" class="text-white">Selected Work</a>
                    <br><a href="#" class="text-white">Get In Touch</a>
                </p>
            </div>
            <div class="col-md-4 col-sm-8">
                <p class="mb-4 foot-title mbr-fonts-style display-7">
                    RECENT NEWS
                </p>
                <p class="mbr-text mbr-fonts-style foot-text display-7">
                    Footer with solid color background and a contact form, Easily add subscribe and contact forms without any server-side integration.
                    <br>
                    <br>Mobirise helps you cut down development time by providing you with a flexible website editor with a drag and drop interface.
                </p>
            </div>
            <div class="col-md-4 offset-md-1 col-sm-12">
                <p class="mb-4 foot-title mbr-fonts-style display-7">
                    SUBSCRIBE
                </p>
                <p class="mbr-text mbr-fonts-style form-text display-7">
                    Get monthly updates and free resources.
                </p>
                <div class="media-container-column" data-form-type="formoid">
                    <div data-form-alert="" hidden="" class="align-center">
                        Thanks for filling out the form!
                    </div>

                    <form class="form-inline" action="https://mobirise.com/" method="post" data-form-title="Mobirise Form">
                        <input type="hidden" value="vRET/u8MWXj5HqdICe0O/AFuT7jk5+CPZHPdks+8krul0VR5T/fUTi9vNpZ9D+BVgbsDZCi6hMSTiwPatzuxrHke1aYzINF2rNPEI9wgq7yf06YnT0cZAtGMMDz/OODi" data-form-email="true">
                        <div class="form-group">
                            <input type="email" class="form-control input-sm input-inverse my-2" name="email" required="" data-form-field="Email" placeholder="Email" id="email-footer4-3i">
                        </div>
                        <div class="input-group-btn m-2">
                            <button href="" class="btn btn-primary display-4" type="submit" role="button">Subscribe</button>
                        </div>
                    </form>
                </div>
                <p class="mb-4 mbr-fonts-style foot-title display-7">
                    CONNECT WITH US
                </p>
                <div class="social-list pl-0 mb-0">
                        <div class="soc-item">
                            <a href="https://twitter.com/mobirise" target="_blank">
                                <span class="socicon-twitter socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.facebook.com/pages/Mobirise/1616226671953247" target="_blank">
                                <span class="socicon-facebook socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.youtube.com/c/mobirise" target="_blank">
                                <span class="socicon-youtube socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://instagram.com/mobirise" target="_blank">
                                <span class="socicon-instagram socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://plus.google.com/u/0/+Mobirise" target="_blank">
                                <span class="socicon-googleplus socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                        <div class="soc-item">
                            <a href="https://www.behance.net/Mobirise" target="_blank">
                                <span class="socicon-behance socicon mbr-iconfont mbr-iconfont-social" media-simple="true"></span>
                            </a>
                        </div>
                </div>
            </div>
        </div>
        <div class="footer-lower">
            <div class="media-container-row">
                <div class="col-sm-12">
                    <hr>
                </div>
            </div>
            <div class="media-container-row mbr-white">
                <div class="col-sm-12 copyright">
                    <p class="mbr-text mbr-fonts-style display-7">
                        © Copyright 2019 Footer Template - All Rights Reserved
                    </p>
                </div>
            </div>
        </div>
    </div>
</section> --}}