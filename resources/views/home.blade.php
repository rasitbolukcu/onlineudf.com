@extends('layouts.main')

@section('content')
    <section class="home">
        <div class="container">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{session('error')}}
                </div>
                <div class="clearfix"></div>
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-5 home-buttons">
                        <div class="card-body">
                            <h4>Dosya Yükle</h4>
                            <i class="fa fa-upload"></i>
                            <hr>
                            <div class="clearfix mb-4"></div>
                            <form method="POST" action="/" enctype="multipart/form-data" id="upload_form">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="file" name="udf">
                                </div>
                                <div class="form-group">
                                    <button class="form-control btn btn-primary" type="submit" id="upload_btn">UDF Dosyasını Aç</button>
                                    <small><strong>Not:</strong> Dosyayı açtıktan sonra pdf'e dönüştürebilirsiniz.</small>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mb-5 home-buttons">
                        <div class="card-body">
                            <h4>Dosya Oluştur</h4>
                            <i class="fa fa-file"></i>
                            <hr>
                            <div class="clearfix mb-4"></div>
                            <h4>UDF Oluşturma henüz aktif değildir.</h4>
                            <h4>İlgili kısım eklendikten sonra burdan UDF oluşturabilirsiniz.</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>OnlineUDF.com</h2>
                    <p>OnlineUDF.com, UDF uzantılı dosyalarınızı, UYAP döküman editörüne alternatif olarak, web üzerinden okumanıza, düzenlemenize ya da sıfırdan dosya oluşturmanıza olanak sağlayan ücretsiz bir projedir.</p>
                    <p>Proje, geliştirme aşamasında olup, henüz tam olarak tüm fonksiyonları sunamamaktadır. İlerleyen süreçte eksik fonksiyonlar parça parça eklenecektir. Projenin gelişimini sayfanın en altındaki kısımdan takip edebilirsiniz.</p>
                    <p>Bu sayfa üzerinden açacağınız hiçbir döküman server üzerinde saklanmamakta olup, 3. kişiler tarafından görüntülenmemektedir.</p>
                    <p>Tüm özellikler geliştirme aşamasında olduğundan bazı teknik aksaklıkların yaşanma olasılığı yüksektir. Karşılaştığınız aksaklıkları bildirmeniz geliştirme aşamasına oldukça katkı sağlayacaktır.</p>
                    <p>Proje ile ilgili görüş, öneri ve sorularınızı <a href="mailto:info@onlineudf.com">info@onlineudf.com</a> mail adresine iletebilirsiniz.</p>
                </div>
            </div>
            <div class="card mt-5">
                <div class="card-body">
                    <h2>Proje Haritası</h2>
                    <hr>
                    <h4>UDF Okuma</h4>
                    <ul>
                        <li><i class="fa fa-check"></i> UDF metninin okunması</li>
                        <li><i class="fa fa-check"></i> Temel öğelerin biçimleri</li>
                        <li><i class="fa fa-hourglass"></i> Tüm öğelerin biçimleri</li>
                        <li><i class="fa fa-hourglass"></i> PDF'e dönüştürme</li>
                        <li><i class="fa fa-hourglass"></i> DOC'e dönüştürme</li>
                        <li><i class="fa fa-hourglass"></i> Tüm formatlara dönüştürme</li>
                    </ul>
                    <h4>UDF Editör</h4>
                    <ul>
                        <li><i class="fa fa-hourglass"></i> Okuma işlemlerinden sonra planlanacak</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

@endsection
