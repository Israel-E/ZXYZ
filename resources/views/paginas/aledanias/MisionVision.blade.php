@extends('layouts.app')
@section('content')
@include('extends.nav-welcome')
    <style type="text/css">
        #wrapper
        {
            margin-right: 0px;
        }
        .trigger{
            margin-right: 270px !important;
        }
        .dropdown .caret {
            margin-top: 20px;
            margin-left: 5px;
        }
        .caret {
            display: inline-block;
            width: 0;
            height: 0;
            vertical-align: top;
            border-top: 4px solid #ffffff;
            border-right: 4px solid transparent;
            border-left: 4px solid transparent;
            content: "";
        }
        .navbar-fixed-top {
            min-height: 0px;
            height: 0px;
            position: static;
        }
    </style>
    <div id="wrapper2">

        <!-- Sidebar -->


        <!-- Page Content -->

        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 pagina-aledania">
                        <h1>
                            Misión
                            <span>
                            <a href="">
                                <img src="{{asset('images/logo1.png')}}" class="img-responsive logo">
                            </a>
                            </span>
                        </h1>
                        <hr style="border: 1px solid #c0c2c4">
                        <p style="text-align: justify; text-justify: inter-word;">
                            El Gobierno Autónomo Departamental de Potosí, es una institución Pública, encargada de
                            planificar, promover y ejecutar políticas de desarrollo, económico, social, ambiental e
                            institucional; administrar, supervisar y controlar los recursos económicos y el
                            funcionamiento de los servicios departamentales; conservar el orden público y
                            garantizar la seguridad ciudadana; canalizar y articular los requerimientos de
                            los gobiernos municipales y de las organizaciones sociales de base con el Estado
                            Plurinacional, para mejorar la calidad de vida de la población en un marco de dignidad,
                            equidad y justicia social.
                        </p>
                        <h1>
                            Visión
                        </h1>
                        <hr style="border: 1px solid #c0c2c4">
                        <p style="text-align: justify; text-justify: inter-word;">
                            El Gobierno Autónomo Departamental de Potosí, es una institución consolidada,
                            reconocida y con capacidad de gestión, que promueve el desarrollo humano,
                            económico, productivo e industrial, con responsabilidad social y ambiental para
                            vivir bien.
                        </p>
                        <p style="text-align: justify; text-justify: inter-word;">
                            “POTOSÍ, PRODUCTIVO, INDUSTRIAL, EXPORTADOR DE PRODUCTOS CON VALOR AGREGADO, TURÍSTICO,
                            CON SEGURIDAD Y SOBERANÍA ALIMENTARIA, CON GESTIÓN SOSTENIBLE DE SUS RECURSOS NATURALES,
                            Y CON RECURSOS HUMANOS COMPETITIVOS PARA VIVIR BIEN”.
                        </p>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper
                https://radioslibres.net/article/reproductores-para-radio-en-linea/
                http://source.netandino.com/audio-con-shoutcast-en-mp3.php
                http://198.50.113.170:9156/;

            -->

        </div>
        <!-- /#wrapper -->

        @endsection
        @section('js')
            <script>
                $(window).scroll(function (event) {
                    var scroll = $(window).scrollTop();
                    //console.log(scroll);
                    if (scroll==100) {
                        $("#sidebar-wrapper").css("margin-top","-100px")
                    }else{
                        $("#sidebar-wrapper").css("margin-top","-0px")
                    }
                });
            </script>
@endsection