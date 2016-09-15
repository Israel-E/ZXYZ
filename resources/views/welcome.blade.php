@extends('layouts.app')

@section('content')
<style type="text/css">
    #trigger{
        color: #fff;
    }
    .project-description > p{
        color: #fff !important;
    }

</style>

<div class="todo">
    @include('extends.nav')
</div>
<div class="navbar">
    <div class="navbar-inner">
        <div class="container">
            <a href="#" class="brand">
                <img src="images/logogob0.png" width="120" height="40" alt="Logo" />
                <!-- This is website logo -->
            </a>
            <!-- Navigation button, visible on small resolution -->

            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <i class="icon-menu"></i>
            </button>
            <!-- Main navigation -->

            <div class="nav-collapse collapse pull-right">
                <ul class="nav" id="top-navigation">
                    <li class="active"><a href="#home">Inicio</a></li>
                    <li><a href="#service">Institución</a></li>
                    <li><a href="#portfolio">Comunicación</a></li>
                    <li><a href="#about">Servicios Dept.</a></li>
                    <li><a href="#juridica">Jurídica</a></li>
                    <li><a href="#auditoria">Auditoría</a></li>
                    <li><a href="#transparencia">Transparencia</a></li>
                    <li><a href="#contact">Contactos</a></li>
                    <li><a href="#" class="trigger" id="menu_y">Menu</a></li>
                </ul>
            </div>

            <!-- End main navigation -->
        </div>
    </div>
</div>
    <div id="home">
        <div id="da-slider" class="da-slider">
            <div class="triangle"></div>
            <!-- mask elemet use for masking background image -->
            <div class="mask"></div>
            <!-- All slides centred in container element -->
            <div class="container">
                <!-- Start first slide -->
                <div class="da-slide">
                    <img src="images/banner0.jpg" alt="image01">
                </div>
                <div class="da-slide">
                    <img src="images/banner1.jpg" alt="image01">
                </div>
                <div class="da-slide">
                    <img src="images/banner2.jpg" alt="image01">
                </div>
                <!-- End first slide -->
                <!-- Start second slide -->
                <!--
                <div class="da-slide">
                    <h2>Easy management</h2>
                    <h4>Easy to use</h4>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                    <a href="#" class="da-link button">Read more</a>
                    <div class="da-img">
                        <img src="images/Slider02.png" width="320" alt="image02">
                    </div>
                </div>-->
                <!-- End second slide -->
                <!-- Start third slide -->
                <!--
                <!--
                <div class="da-slide">
                    <h2>Revolution</h2>
                    <h4>Customizable</h4>
                    <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                    <a href="#" class="da-link button">Read more</a>
                    <div class="da-img">
                        <img src="images/Slider03.png" width="320" alt="image03">
                    </div>
                </div>
                <!-- Start third slide -->
                <!-- Start cSlide navigation arrows -->
                <div class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </div>
                <!-- End cSlide navigation arrows -->
            </div>
        </div>
    </div>
        <!-- End home section -->
        <!-- Service section start -->

        <div class="section primary-section" id="service">
            <div class="container">
                <!-- Start title section -->

                <div class="title">
                    <h1>Institución</h1>
                    <!-- Section's title goes here -->
                    <p>Una breve introducción sobre la institución...</p>
                    <!--Simple description for section goes here. -->
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ url('MisionVision') }}"><img class="img-circle" src="images/vision11.jpg" alt="service 1"></a>
                            </div>
                            <h3>Misión - Visión</h3>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/gobernador111.jpg" alt="service 1"></a>
                            </div>
                            <h3>Gobernador</h3>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/organigrama11.jpg" alt="service 2" ></a>
                            </div>
                            <h3>Organigrama</h3>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/politicas11.jpg" alt="service 3"></a>
                            </div>
                            <h3>Políticas y Reglamentos</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service section end -->
        <!-- Portfolio section start -->
<div class="section secondary-section " id="portfolio">
    <div class="triangle"></div>
    <div class="container">
        <div class=" title">
            <h1>Comunicación</h1>
            <p>Una breve introducción sobre comunicacion...</p>
        </div>
        <ul class="nav nav-pills">
            <li class="filter" data-filter="all">
                <a href="#noAction">All</a>
            </li>
            <li class="filter" data-filter="web">
                <a href="#noAction">Web</a>
            </li>
            <li class="filter" data-filter="photo">
                <a href="#noAction">Photo</a>
            </li>
            <li class="filter" data-filter="identity">
                <a href="#noAction">Identity</a>
            </li>
        </ul>
        <!-- Start details for portfolio project 1 -->
        <div id="single-project">
            @foreach($pubgob as $pg)
                <div id="{{str_replace(' ', '_', $pg['titulo'])}}" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="data:image/jpeg;base64,{{$pg['img']}}">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>{{$pg['titulo']}}</h3>
                                    <span class="show_hide close">
                                        <i class="icon-cancel"></i>
                                    </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Titulo</span>{{$pg['titulo']}}</div>
                                <div>
                                    <span>Publicacion</span>{{$pg['created_at']}}</div>
                                <div>
                                    <span>Descripcion</span>Album</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            {{--<p>{!! substr($pg['contenido'], 0, 200)!!}</p>--}}
                            <center>
                                <button class="button button-sp"><a href="{{url('articulo/'.$pg['id'])}}">Leer Mas</a></button>
                                <br><br>
                                <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="small" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">Compartir</a></div>
                            </center>
                        </div>
                    </div>
                </div>
                @endforeach
                        <!-- End details for portfolio project 1 -->
                <!-- Start details for portfolio project 2
                <div id="slidingDiv1" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio02.png" alt="project 2">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>Life is a song - sing it. Life is a game - play it. Life is a challenge - meet it. Life is a dream - realize it. Life is a sacrifice - offer it. Life is love - enjoy it.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 2 -->
                <!-- Start details for portfolio project 3
                <div id="slidingDiv2" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio03.png" alt="project 3">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>How far you go in life depends on your being tender with the young, compassionate with the aged, sympathetic with the striving and tolerant of the weak and strong. Because someday in your life you will have been all of these.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 3 -->
                <!-- Start details for portfolio project 4
                <div id="slidingDiv3" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio04.png" alt="project 4">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Project for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>Life's but a walking shadow, a poor player, that struts and frets his hour upon the stage, and then is heard no more; it is a tale told by an idiot, full of sound and fury, signifying nothing.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 4 -->
                <!-- Start details for portfolio project 5
                <div id="slidingDiv4" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio05.png" alt="project 5">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>We need to give each other the space to grow, to be ourselves, to exercise our diversity. We need to give each other space so that we may both give and receive such beautiful things as ideas, openness, dignity, joy, healing, and inclusion.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 5 -->
                <!-- Start details for portfolio project 6
                <div id="slidingDiv5" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio06.png" alt="project 6">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>I went to the woods because I wished to live deliberately, to front only the essential facts of life, and see if I could not learn what it had to teach, and not, when I came to die, discover that I had not lived.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 6 -->
                <!-- Start details for portfolio project 7
                <div id="slidingDiv6" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio07.png" alt="project 7">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>Always continue the climb. It is possible for you to do whatever you choose, if you first get to know who you are and are willing to work with a power that is greater than ourselves to do it.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 7 -->
                <!-- Start details for portfolio project 8
                <div id="slidingDiv7" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio08.png" alt="project 8">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>What if you gave someone a gift, and they neglected to thank you for it - would you be likely to give them another? Life is the same way. In order to attract more of the blessings that life has to offer, you must truly appreciate what you already have.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 8 -->
                <!-- Start details for portfolio project 9
                <div id="slidingDiv8" class="toggleDiv row-fluid single-project">
                    <div class="span6">
                        <img src="images/Portfolio09.png" alt="project 9">
                    </div>
                    <div class="span6">
                        <div class="project-description">
                            <div class="project-title clearfix">
                                <h3>Webste for Some Client</h3>
                                <span class="show_hide close">
                                    <i class="icon-cancel"></i>
                                </span>
                            </div>
                            <div class="project-info">
                                <div>
                                    <span>Client</span>Some Client Name</div>
                                <div>
                                    <span>Date</span>July 2013</div>
                                <div>
                                    <span>Skills</span>HTML5, CSS3, JavaScript</div>
                                <div>
                                    <span>Link</span>http://examplecomp.com</div>
                            </div>
                            <p>I learned that we can do anything, but we can't do everything... at least not at the same time. So think of your priorities not in terms of what activities you do, but when you do them. Timing is everything.</p>
                        </div>
                    </div>
                </div>
                <!-- End details for portfolio project 9 -->
                <ul id="portfolio-grid" class="thumbnails row">
                    @foreach($pubgob as $p)
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="data:image/jpeg;base64,{{$p['img']}}" style="width:640px;height:230px;">
                                <a href="#single-project" class="more show_hide" rel="#{{str_replace(' ', '_', $p['titulo'])}}">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>{{$p['titulo']}}</h3>
                                <div class="mask"></div>
                            </div>
                        </li>
                        @endforeach
                                <!--<li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/Portfolio02.png" alt="project 2">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv1">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/Portfolio03.png" alt="project 3">
                                <a href="#single-project" class="more show_hide" rel="#slidingDiv2">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/Portfolio04.png" alt="project 4">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv3">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/Portfolio05.png" alt="project 5">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv4">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/Portfolio06.png" alt="project 6">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv5">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix web">
                            <div class="thumbnail">
                                <img src="images/Portfolio07.png" alt="project 7" />
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv6">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix photo">
                            <div class="thumbnail">
                                <img src="images/Portfolio08.png" alt="project 8">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv7">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>
                        <li class="span4 mix identity">
                            <div class="thumbnail">
                                <img src="images/Portfolio09.png" alt="project 9">
                                <a href="#single-project" class="show_hide more" rel="#slidingDiv8">
                                    <i class="icon-plus"></i>
                                </a>
                                <h3>Thumbnail label</h3>
                                <p>Thumbnail caption...</p>
                                <div class="mask"></div>
                            </div>
                        </li>-->
                </ul>
        </div>
    </div>
</div>
<!-- Portfolio section end -->
        <!-- About us section start -->
        <div class="section primary-section" id="about">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>Servicios Departamentales</h1>
                    <p>Una breve introducción sobre los servicios departamentales...</p>
                </div>
                <div class="row-fluid team">
                    <div class="span3" id="first-person">
                        <div class="thumbnail">
                            <img src="images/sedede.jpg" alt="team 1">
                            <h3>SEDEDE</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/Sedede-Potos%C3%AD-147395232347700/?fref=ts">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <a href="{{ route('construccion_pagina') }}">
                                <div class="mask">
                                    <h2>SEDEDE</h2>
                                    <p><b>Servicio Departamental de Deportes</b></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="span3" id="second-person">
                        <div class="thumbnail">
                            <img src="images/sedes.jpg" alt="team 1">
                            <h3>SEDES</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/SEDES-Potosi-1588450051483443/?fref=ts">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <a href="{{ route('construccion_pagina') }}">
                                <div class="mask">
                                    <h2>SEDES</h2>
                                    <p><b>Servicio Departamental de Salud</b></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="span3" id="third-person">
                        <div class="thumbnail">
                            <img src="images/sedege.jpg" alt="team 1">
                            <h3>SEDEGES</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/sedeges.potosi?ref=ts&fref=ts">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <a href="{{ route('construccion_pagina') }}">
                                <div class="mask">
                                    <h2>SEDEGES</h2>
                                    <p><b>Servicio Departamental de Gestión</b></p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="span3" id="third-person">
                        <div class="thumbnail">
                            <img src="images/sedeca.jpg" alt="team 1">
                            <h3>SEDECA</h3>
                            <ul class="social">
                                <li>
                                    <a href="https://www.facebook.com/sedecapotosi/?fref=ts">
                                        <span class="icon-facebook-circled"></span>
                                    </a>
                                </li>
                            </ul>
                            <a href="{{ route('construccion_pagina') }}">
                                <div class="mask">
                                    <h2>SEDECA</h2>
                                    <p><b>Servicio Departamental de Caminos</b></p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!--
                <div class="about-text centered">
                    <h3>About Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                </div>
                -->
                <!--
                <h3>Skills</h3>
                <div class="row-fluid">
                    <div class="span6">
                        <ul class="skills">
                            <li>
                                <span class="bar" data-width="80%"></span>
                                <h3>Graphic Design</h3>
                            </li>
                            <li>
                                <span class="bar" data-width="95%"></span>
                                <h3>Html & Css</h3>
                            </li>
                            <li>
                                <span class="bar" data-width="68%"></span>
                                <h3>jQuery</h3>
                            </li>
                            <li>
                                <span class="bar" data-width="70%"></span>
                                <h3>Wordpress</h3>
                            </li>
                        </ul>
                    </div>
                    <div class="span6">
                        <div class="highlighted-box center">
                            <h1>We're Hiring</h1>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, ullamcorper suscipit lobortis nisl ut aliquip consequat. I learned that we can do anything, but we can't do everything...</p>
                            <button class="button button-sp">Join Us</button>
                        </div>
                    </div>
                </div>
                -->
            </div>
        </div>
        <!-- About us section end -->
        <div id="juridica">
            <div class="section secondary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>Jurídica</h1>
                        <p>Una breve introducción sobre jurídica...</p>
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/leyes.jpg" alt="service 1"></a>
                                </div>
                                <h3>Leyes</h3>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/decretos.jpg" alt="service 1"></a>
                                </div>
                                <h3>Decretos</h3>
                            </div>
                        </div>
                    </div>
                    <!--
                    <p class="testimonial-text">
                        "Perfection is Achieved Not When There Is Nothing More to Add, But When There Is Nothing Left to Take Away"
                    </p>
                    -->
                </div>
            </div>
        </div>

        <!-- Client section start -->
        <!-- Client section start -->
        <div id="auditoria">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <!-- Start title section -->

                    <div class="title">
                        <h1>Auditoría Interna</h1>
                        <!-- Section's title goes here -->
                        <p>Una breve introducción sobre Auditoría Interna...</p>
                        <!--Simple description for section goes here. -->
                    </div>
                    <div class="row-fluid">
                        <div class="span6">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/resumenEjecutivo2015.jpg" alt="service 1"></a>
                                </div>
                                <h3>Resumén Ejecutivo 2015</h3>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="centered service">
                                <div class="circle-border zoom-in">
                                    <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/resumenEjecutivo2016.jpg" alt="service 1"></a>
                                </div>
                                <h3>Resumén Ejecutivo 2016</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--
        <div class="section third-section">
            <div class="container centered">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Our Clients</h3>
                        </div>
                        <ul class="client-nav pull-right">
                            <li id="client-prev"></li>
                            <li id="client-next"></li>
                        </ul>
                    </div>
                    <ul class="row client-slider" id="clint-slider">
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo01.png" alt="client logo 1">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo02.png" alt="client logo 2">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo03.png" alt="client logo 3">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo04.png" alt="client logo 4">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo05.png" alt="client logo 5">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo02.png" alt="client logo 6">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="images/clients/ClientLogo04.png" alt="client logo 7">
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        -->
        <!-- Price section start -->

        <div id="transparencia" class="section secondary-section">
            <div class="triangle"></div>
            <div class="container">
                <div class="title">
                    <h1>Unidad de Transparencia</h1>
                    <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
                </div>
                <div class="row-fluid">
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/poa.jpg" alt="service 1"></a>
                            </div>
                            <h3 class="h3_transparencia">POA</h3>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/cuentas.jpg" alt="service 1"></a>
                            </div>
                            <h3 class="h3_transparencia">Rendición de Cuentas</h3>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/convocatorias.jpg" alt="service 1"></a>
                            </div>
                            <h3 class="h3_transparencia">Convocatorias</h3>
                        </div>
                    </div>
                    <div class="span3">
                        <div class="centered service">
                            <div class="circle-border zoom-in">
                                <a href="{{ route('construccion_pagina') }}"><img class="img-circle" src="images/personal.jpg" alt="service 3"></a>
                            </div>
                            <h3 class="h3_transparencia">Nomina del Personal</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Price section end -->

        <!-- Price2section start -->
        <!--
        <div id="price2" class="section secondary-section">
            <div class="container">
                <div class="title">
                    <h1>Price</h1>
                    <p>Duis mollis placerat quam, eget laoreet tellus tempor eu. Quisque dapibus in purus in dignissim.</p>
                </div>
                <div class="price-table row-fluid">
                    <div class="span4 price-column">
                        <h3>Basic</h3>
                        <ul class="list">
                            <li class="price">$19,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>5 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Pro</h3>
                        <ul class="list">
                            <li class="price">$39,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>25 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                    <div class="span4 price-column">
                        <h3>Premium</h3>
                        <ul class="list">
                            <li class="price">$79,99</li>
                            <li><strong>Free</strong> Setup</li>
                            <li><strong>24/7</strong> Support</li>
                            <li><strong>50 GB</strong> File Storage</li>
                        </ul>
                        <a href="#" class="button button-ps">BUY</a>
                    </div>
                </div>
                <div class="centered">
                    <p class="price-text">We Offer Custom Plans. Contact Us For More Info.</p>
                    <a href="#contact" class="button">Contact Us</a>
                </div>
            </div>
        </div>
        -->
        <!-- Price2 section end -->
        <!-- Newsletter section start -->
        <!--
        <div class="section third-section">
            <div class="container newsletter">
                <div class="sub-section">
                    <div class="title clearfix">
                        <div class="pull-left">
                            <h3>Newsletter</h3>
                        </div>
                    </div>
                </div>
                <div id="success-subscribe" class="alert alert-success invisible">
                    <strong>Well done!</strong>You successfully subscribet to our newsletter.</div>
                <div class="row-fluid">
                    <div class="span5">
                        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                    </div>
                    <div class="span7">
                        <form class="inline-form">
                            <input type="email" name="email" id="nlmail" class="span8" placeholder="Enter your email" required />
                            <button id="subscribe" class="button button-sp">Subscribe</button>
                        </form>
                        <div id="err-subscribe" class="error centered">Please provide valid email address.</div>
                    </div>
                </div>
            </div>
        </div>
        -->
        <!-- Newsletter section end -->
        <!-- Contact section start -->
        <div id="contact" class="contact">
            <div class="section primary-section">
                <div class="triangle"></div>
                <div class="container">
                    <div class="title">
                        <h1>Contactos</h1>
                        <!-- Section's title goes here -->
                        <p>Nos puedes ubicar de la siguiente manera</p>
                        <!--Simple description for section goes here. -->
                    </div>
                </div>
                <div>
                    <!--
                    <div class="map-canvas" id="map-canvas">Loading map...</div>
                    -->
                    <div class="">
                        <div class="row-fluid">
                            <ul class="thumbnails row">
                                <li class="span1"></li>
                                <li class="span5 mix web">
                                    <div class="center contact-info">
                                        <p></p>
                                        <p>Dirección: Plaza Principal 10 de Noviembre</p>
                                        <p>Teléfono: 62-29295 - 62-29292</p>
                                        <p>Teléfono fax: 62-29295 - 62-29292</p>
                                        <p>Casilla de correo: 225</p>
                                    </div>
                                </li>
                                <li class="span5">
                                    <div class="center">
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1879.441551520737!2d-65.75490941754455!3d-19.589508168666754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f94e7a0fb10e69%3A0x4e87e73bb79e4ff7!2sPalacio+de+la+Gobernaci%C3%B3n+de+Potos%C3%AD%2C+Cobija%2C+Villa+Imperial+de+Potos%C3%AD%2C+Bolivia!5e0!3m2!1ses!2ses!4v1472698365958" width="420" height="260" frameborder="0" style="border:2px dotted #cacaca" allowfullscreen></iframe>
                                    </div>
                                </li>
                                <li class="span1"></li>
                            </ul>
                            <!--
                            <div class="center">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1879.441551520737!2d-65.75490941754455!3d-19.589508168666754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f94e7a0fb10e69%3A0x4e87e73bb79e4ff7!2sPalacio+de+la+Gobernaci%C3%B3n+de+Potos%C3%AD%2C+Cobija%2C+Villa+Imperial+de+Potos%C3%AD%2C+Bolivia!5e0!3m2!1ses!2ses!4v1472698365958" width="400" height="300" frameborder="0" style="border:5px dotted #0167b8" allowfullscreen></iframe>
                            </div>-->

                            <!--
                            <div class="span5 contact-form centered">
                                <h3>Say Hello</h3>
                                <div id="successSend" class="alert alert-success invisible">
                                    <strong>Well done!</strong>Your message has been sent.</div>
                                <div id="errorSend" class="alert alert-error invisible">There was an error.</div>
                                <form id="contact-form" action="php/mail.php">
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="text" id="name" name="name" placeholder="* Your name..." />
                                            <div class="error left-align" id="err-name">Please enter name.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <input class="span12" type="email" name="email" id="email" placeholder="* Your email..." />
                                            <div class="error left-align" id="err-email">Please enter valid email adress.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <textarea class="span12" name="comment" id="comment" placeholder="* Comments..."></textarea>
                                            <div class="error left-align" id="err-comment">Please enter your comment.</div>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button id="send-mail" class="message-btn">Send message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            -->
                        </div>
                    </div>
                </div>
                <div class="container">
                    <!--
                    <div class="span9 center contact-info">
                        <p>Dirección: Plaza Principal 10 de Noviembre</p>
                        <p class="info-mail">Teléfono: 62-29295 - 62-29292</p>
                        <p>Teléfono fax: 62-29295 - 62-29292</p>
                        <p>Casilla de correo: 225</p>
                    </div>
                    <!--
                    <div class="span9 center contact-info">
                        <p>123 Fifth Avenue, 12th,Belgrade,SRB 11000</p>
                        <p class="info-mail">ourstudio@somemail.com</p>
                        <p>+11 234 567 890</p>
                        <p>+11 286 543 850</p>-->
                        <div class="title">
                            <h3>Redes Sociales</h3>
                        </div>
                   <!-- </div>-->
                    <div class="row-fluid centered">
                        <ul class="social">
                            <li>
                                <a href="https://www.facebook.com/GobiernoAutonomoDepartamentalDePotosi/?ref=ts&fref=ts">
                                    <span class="icon-facebook-circled"></span>
                                </a>
                            </li>
                            <!--
                            <li>
                                <a href="">
                                    <span class="icon-twitter-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-linkedin-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-pinterest-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-dribbble-circled"></span>
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <span class="icon-gplus-circled"></span>
                                </a>
                            </li>
                            -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer">
                <!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
                <!-- BEGINS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
                <script type="text/javascript" src="https://hosted.muses.org/mrp.js"></script>
                <script type="text/javascript">
                MRP.insert({
                'url':'http://198.50.113.170:9156/; ',
                'codec':'mp3',
                'volume':100,
                'autoplay':true,
                'buffering':5,
                'title':'Radio Disney',
                'wmode':'transparent',
                'skin':'faredirfare',
                'width':269,
                'height':52
                });
                </script>
                <!-- ENDS: AUTO-GENERATED MUSES RADIO PLAYER CODE -->
                <!---->



            <p>&copy; 2013 Theme by <a href="http://www.graphberry.com">GraphBerry</a>, <a href="http://goo.gl/NM84K2">Documentation</a></p>
        </div>
        <!-- Footer section end -->
        <!-- ScrollUp button start -->
        <div class="scrollup" style="display: block;">
            <a href="#">
                <i class="icon-up-open"></i>
            </a>
        </div>
        <div class="login-modal" style="display:none">
            <!-- Trigger the modal with a button -->
            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="login" style="display:none">Open Modal</button>
            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
              <div class="modal-dialog">

                <!-- Modal content-->
                <style type="text/css">
                .login{
                    color: black;
                }
                </style>
                <div class="modal-content login">
                  <div class="modal-header">
                    <button type="button" class="close cerrar" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Login</h4>
                  </div>
                      <div class="modal-body">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                                    {{ csrf_field() }}

                                    <div class="control-group{{ $errors->has('ci') ? ' has-error' : '' }}">
                                        <label for="ci" class="col-md-4 control-label">C.I.</label>

                                        <div class="col-md-6">
                                            <input type="text" class="form-control" name="ci" value="{{ old('ci') }}">

                                            @if ($errors->has('ci'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('ci') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="control-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                        <label for="password" class="col-md-4 control-label">Password</label>

                                        <div class="col-md-6">
                                            <input id="password" type="password" class="form-control" name="password">

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                    <center>
                                        <!--<div class="control-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" name="remember"> Remember Me
                                                </label>
                                            </div>
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-sign-in"></i> Login
                                            </button>

                                            <!--<a class="btn btn-link" href="{{ url('/password/reset') }}">Forgot Your Password?</a>-->
                                        </div>
                                    </div>
                                    </center>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default cerrar" data-dismiss="modal">Close</button>
                  </div>
                </div>

              </div>
            </div>
        </div>


@endsection
@section('js')
<script type="text/javascript">
   jQuery(document).keydown(function(event) {
        if((event.ctrlKey || event.metaKey) && event.which == 76) {
            $( "#login" ).trigger( "click" );
            $(".login-modal").css('display','');
            event.preventDefault();
            return false;
            }
        }
    );
   $('.cerrar .modal-backdrop').click(function(){
        $(".login-modal" ).css('display','none');
   })
   $(document).ready(function(){
      $("#menu_y").click(function () {
          window.scrollTo(0, 0)
          //window.scrollTop("#home");
      });

   });
</script>
@endsection