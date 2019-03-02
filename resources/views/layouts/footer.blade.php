<footer class="container-fluid">
        <div class="container  py-3 bg-info text-white">
            <div class="row">
                <div class="col-sm-4">
                    <h2 class="text-uppercase">location</h2>
                    <p>
                        Jl. Sultan Agung No.21-22 Simpang Pulai-Jambi. 
                    <p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15953.030483322851!2d103.59774626459759!3d-1.6026359313007508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e2ec007538c44bd%3A0x688d03c0b56ab64f!2sMirabella!5e0!3m2!1sid!2sid!4v1546541402624" class="w-100" frameborder="0" style="border:0" allowfullscreen></iframe>
                    <p>
                        <h2 class="text-uppercase">Arround the web</h2>
                        <p class="mb-2">
                        <a class="btn btn-outline-light" href="http://fb.com/nhia">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="btn btn-outline-light" href="http://instagram.com/_sr.dania">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a class="btn btn-outline-light" href='https://wa.me/6285367298542' target='_blank'>
                            <i class="fab fa-whatsapp"></i>
                        </a>
                </div>
                <div class="col-sm-4 pl-5">
                    <h2>LINKS</h2>
                    <ul class="nav">
                      <li class="nav-item"><a href="/developer" class="ml-2 text-white"> Developer Team</a></li>
                      <!-- <li class="nav-item"><a href="/privacy" class="text-white">&nbsp;Privacy Policy</a></li> -->
                      <!-- <li class="nav-item"><a href="" class="text-white">&nbsp;Company Info</a></li> -->
                    </ul>

                    <p>
                    <h2>Payments</h2>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="active text-white">Bca</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white">&nbsp;Bni</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white">&nbsp;Bri</a>
                        </li>
                    </ul>

                    <p>
                    <h2>Kurir</h2>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="text-white">Jne</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white">&nbsp;Tiki</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-white">&nbsp;Wahana</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-4">
                    <h2 class="text-uppercase">Kontak Kami</h2>
                    <p>
                    <form action='/mail' method='post'>
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control-sm form-control" name='nama' placeholder="Name" value="{{old('nama')}}">
                            @if ( $errors->has('nama') )
                                <p class='text-danger'>
                                    {{ $errors->get('nama') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-sm form-control" name='email'  placeholder="Email Address" value="{{old('email')}}">
                            @if ( $errors->has('email') )
                                <p class='text-danger'>
                                    {{$errors->first('email')}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control-sm form-control"  name='subject' placeholder="Subject" value="{{old('subject')}}">
                            @if ( $errors->has('subject') )
                                <p class='text-danger'>
                                    {{$errors->first('subject')}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <textarea type="text" class="form-control-sm form-control"  rows='5' name='body' placeholder="Message">{{old('body')}}</textarea>
                            @if ( $errors->has('messages') )
                                <p class='text-danger'>
                                    {{$errors->first('messages')}}
                                </p>
                            @endif
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-light bgBiruTua">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>

    <div class="container-fluid ">
        <div class="container bg-dark py-4 text-center text-white">
            <div class="row">
                <div class="col-sm-12">
                    <small>
                        Copyright &copy; 2018 Mirabella Batik Jambi
                    </small>
                </div>
            </div>
        </div>
    </div>
