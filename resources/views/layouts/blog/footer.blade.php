<footer id="footer">
    <div id="footer-about">
        <div class="wrapper clearfix"><a href="#_" class="goto-top"> <i class="fa fa-angle-up"></i> </a>
            <div class="col col-3">&nbsp;</div>
            <div class="col col-6"><h2 id="footer-about-title">{{ config('blog.globals.footer.about') }}</h2>
                <div id="footer-about-content"><p> {{ config('blog.globals.footer.about_me') }}</p>
                </div>
                <div id="footer-about-social">
                    <a target="_self" href="#"><span
                                class="fa fa-qq"></span></a>
                    <a target="_self" href="#"><span
                                class="fa fa-weixin"></span></a>
                    <a target="_self" href="#"><span
                                class="fa fa-weibo"></span></a>
                    <a target="_self" href="#"><span
                                class="fa fa-soundcloud"></span></a>
                    <a target="_self" href="{{ route('rss') }}"><span
                                class="fa fa-rss"></span></a>
                </div>

            </div>
        </div>
    </div>
    <div id="footer-copyright">
        <div class="wrapper"><p>© 2016 - Created with <i class="fa fa-heart"></i> and
                Designed by <a href="#" target="self">vital</a></p></div>
    </div>
</footer>
