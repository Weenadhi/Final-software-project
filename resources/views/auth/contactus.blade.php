@extends('layouts.welcome')

@section('title','Contact us')

@section('headers')

<li class="">
        <a href="{{route('myhome')}}" class="">Home</a>
    </li>
    <li class="">
        <a href="{{route('login')}}" class="">Login</a>
    </li>

    <li class="active">
        <a href="{{route('contactus')}}" class="active">Contact</a>
    </li>


@endsection


@section('body_part')

<section class="banner_part">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-xl-12">
                <div class="banner_text">
                    <div class="banner_text_iner">
                        <h1>Contact Our <span>System Operators</span></h1>
                        <p>
                            <table>
                               
                                <tr>
                                    <td>Ezekiel</td>
                                    <td>16220805+947881</td>
                                    <td>in@necquam.edu</td>
                                </tr>
                                <tr>
                                    <td>Abel</td>
                                    <td>16670317+948415</td>
                                    <td>mi.fringilla@risus.co.uk</td>
                                </tr>
                                <tr>
                                    <td>Kennan</td>
                                    <td>16500119+947937</td>
                                    <td>Donec.est.Nunc@ipsumac.org</td>
                                </tr>
                                <tr>
                                    <td>Fritz</td>
                                    <td>16730506+940704</td>
                                    <td>magnis.dis.parturient@acmieleifend.org</td>
                                </tr>
                                <tr>
                                    <td>Hamish</td>
                                    <td>16520519+947451</td>
                                    <td>nisi@Namtempordiam.net</td>
                                </tr>
                                <tr>
                                    <td>Calvin</td>
                                    <td>16530217+949899</td>
                                    <td>Vestibulum@tellus.co.uk</td>
                                </tr>
                                <tr>
                                    <td>Emmanuel</td>
                                    <td>16621028+947899</td>
                                    <td>vel.arcu@fermentum.co.uk</td>
                                </tr>
                                <tr>
                                    <td>Talon</td>
                                    <td>16051218+943013</td>
                                    <td>eu@afelisullamcorper.org</td>
                                </tr>
                                <tr>
                                    <td>Drew</td>
                                    <td>16300808+940024</td>
                                    <td>auctor.ullamcorper@hendrerit.com</td>
                                </tr>
                                <tr>
                                    <td>Tobias</td>
                                    <td>16680913+941151</td>
                                    <td>urna.Ut@Sed.ca</td>
                                </tr>
                                <tr>
                                    <td>Henry</td>
                                    <td>16321010+942616</td>
                                    <td>tincidunt.aliquam@adipiscing.org</td>
                                </tr>
                                <tr>
                                    <td>Nash</td>
                                    <td>16990506+941272</td>
                                    <td>at.velit@malesuadafringillaest.org</td>
                                </tr>
                                <tr>
                                    <td>Kirk</td>
                                    <td>16011116+940776</td>
                                    <td>dictum.magna@pharetrafelis.com</td>
                                </tr>
                            </table>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </section>

@endsection