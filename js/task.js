function createTask(item, pertama, kategori) {
    'use strict';
    
    if (item.jenis === 1) {
        new Item1(item.id, item.teks, pertama, kategori).create();
    } else if (item.jenis === 2) {
        new Item2(item.id, item.teks, pertama, kategori).create();
    } else if (item.jenis === 3) {
        new Item3(item.id, item.teks, item.senarai, pertama, kategori).create();
    } else if (item.jenis === 4) {
        new Item4(item.id, item.teks, pertama, kategori).create();
    } else if (item.jenis === 5) {
        new Item5(item.id, item.teks, item.nilai, pertama, kategori).create();
    } else if (item.jenis === 6) {
        new Item6(item.id, item.teks, pertama, kategori).create();
    } else if (item.jenis === 7) {
        new Button(item.id, item.teks, kategori).create();
    } else if (item.jenis === 8) {
        new Title(item.id, item.teks, kategori).create();
    } else if (item.jenis === 9) {
        new SignPad(item.id, item.teks, kategori).create();
    } else if (item.jenis === 10) {
        new CameraButton(item.id, item.teks, item.nilai, pertama, kategori).create();
    }
}

//Constructor for item with text input
function Item1(id, text, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            kotak = document.createElement('input');
        
        kotak.id = id + '_nilai';
        kotak.name = id;
        kotak.type = 'text';
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        task.appendChild(teks);
        
        teks.appendChild(kotak);
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
    };
}

//Constructor for item with textarea
function Item2(id, text, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            kotak = document.createElement('textarea');
        
        kotak.id = id + '_nilai';
        kotak.name = id;
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        task.appendChild(teks);
        
        task.appendChild(kotak);
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
    };
}

//Constructor for item selection
function Item3(id, text, senarai, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            pilih = document.createElement('select');
        
        task.id = id;
        task.className = 'task';
        
        /*
        <select name="select">
          <option value="value1">Value 1</option> 
          <option value="value2" selected>Value 2</option>
          <option value="value3">Value 3</option>
        </select>
        */
        
        for (var i = 0; i < senarai.length; i++) {
            var pilihan = document.createTextNode(senarai[i]),
                option = document.createElement('option');

            option.value = i;
            option.appendChild(pilihan);
            pilih.appendChild(option);
        }
        
        pilih.name = id;
        pilih.id = id + '_nilai';
        
        teks.appendChild(isi);
        task.appendChild(teks);
        task.appendChild(pilih);
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
    };
}

//Constructor for item with calendar
//tapi perlu ke???
function Item4(id, text, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            tarikh = document.createElement('input');
        
        tarikh.id = id + '_nilai';
        tarikh.name = id;
        tarikh.type = 'date';
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        task.appendChild(teks);
        
        task.appendChild(tarikh);
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
    };
}

//Constructor for item with 2 radio buttons
function Item5(id, text, nilai, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            
            checkpass = document.createElement('input'),
            checkfail = document.createElement('input'),
            
            label_pass = document.createElement('label'),
            label_fail = document.createElement('label'),
            
            sp1 = document.createElement('span'),
            sp2 = document.createElement('span');
        
        checkpass.id = 'cpass_' + id;
        checkpass.name = id;
        checkpass.type = 'radio';
        checkpass.setAttribute('required', '');
        checkpass.value = 'pass';
        sp1.className = 'pass';
        label_pass.htmlFor = checkpass.id;
        label_pass.appendChild(sp1);
        checkpass.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = 1;
            }
        });
        
        checkfail.id = 'cfail_' + id;
        checkfail.name = id;
        checkfail.type = 'radio';
        checkfail.setAttribute('required', '');
        checkfail.value = 'fail';
        sp2.className = 'fail';
        label_fail.htmlFor = checkfail.id;
        label_fail.appendChild(sp2);
        checkfail.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = 0;
            }
        });
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        
        task.appendChild(checkfail);
        task.appendChild(label_fail);
        
        task.appendChild(checkpass);
        task.appendChild(label_pass);
        
        task.appendChild(teks);
        
        task.getValue = function() {
            for (var i = 0; i < 2; i++) {
                if (document.getElementsByName(id)[i].checked) {
                    if (i === 0) {
                        return 'fail';
                    } else if (i === 1) {
                        return 'pass';
                    }
                }
            }
        };
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
        
        //Init nilai
        document.getElementById(id).nilai = 0;
    };
}

//Constructor for item with 2 radio buttons and image input
function CameraButton(id, text, nilai, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            
            checkpass = document.createElement('input'),
            checkfail = document.createElement('input'),
            gambar = document.createElement('input'),
            
            label_pass = document.createElement('label'),
            label_fail = document.createElement('label'),
            label_gambar = document.createElement('label'),
            
            sp1 = document.createElement('span'),
            sp2 = document.createElement('span'),
            sp3 = document.createElement('span');
        
        gambar.id = 'gbr_' + id;
        gambar.name = id;
        gambar.type = "file";
        gambar.accept = "image/*";
        sp3.className = 'gbr';
        label_gambar.htmlFor = gambar.id;
        label_gambar.appendChild(sp3);
        
        checkpass.id = 'cpass_' + id;
        checkpass.name = id;
        checkpass.type = 'radio';
        checkpass.setAttribute('required', '');
        checkpass.value = 'pass';
        sp1.className = 'pass';
        label_pass.htmlFor = checkpass.id;
        label_pass.appendChild(sp1);
        checkpass.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = 1;
            }
        });
        
        checkfail.id = 'cfail_' + id;
        checkfail.name = id;
        checkfail.type = 'radio';
        checkfail.setAttribute('required', '');
        checkfail.value = 'fail';
        sp2.className = 'fail';
        label_fail.htmlFor = checkfail.id;
        label_fail.appendChild(sp2);
        checkfail.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = 0;
            }
        });
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        
        task.appendChild(gambar);
        task.appendChild(label_gambar);
        
        task.appendChild(checkfail);
        task.appendChild(label_fail);
        
        task.appendChild(checkpass);
        task.appendChild(label_pass);
        
        task.appendChild(teks);
        
        task.getValue = function() {
            for (var i = 0; i < 2; i++) {
                if (document.getElementsByName(id)[i].checked) {
                    if (i === 0) {
                        return 'fail';
                    } else if (i === 1) {
                        return 'pass';
                    }
                }
            }
        };
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
        
        //Init nilai
        document.getElementById(id).nilai = 0;
    };
}

//Constructor for item with 3 radio buttons
function Item6(id, text, pertama, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            isi = document.createTextNode(text),
            
            checkpass = document.createElement('input'),
            checkfail = document.createElement('input'),
            checkna = document.createElement('input'),
            
            label_pass = document.createElement('label'),
            label_fail = document.createElement('label'),
            label_na = document.createElement('label'),
            
            sp1 = document.createElement('span'),
            sp2 = document.createElement('span'),
            sp3 = document.createElement('span');
        
        checkpass.id = 'cpass_' + id;
        checkpass.name = id;
        checkpass.type = 'radio';
        checkpass.setAttribute('required', '');
        checkpass.value = 'pass';
        sp1.className = 'pass';
        label_pass.htmlFor = checkpass.id;
        label_pass.appendChild(sp1);
        checkpass.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = 1;
            }
        });
        
        checkfail.id = 'cfail_' + id;
        checkfail.name = id;
        checkfail.type = 'radio';
        checkfail.setAttribute('required', '');
        checkfail.value = 'fail';
        sp2.className = 'fail';
        label_fail.htmlFor = checkfail.id;
        label_fail.appendChild(sp2);
        checkfail.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = 0;
            }
        });
        
        checkna.id = 'cna_' + id;
        checkna.name = id;
        checkna.type = 'radio';
        checkna.setAttribute('required', '');
        checkna.value = 'na';
        sp3.className = 'na';
        label_na.htmlFor = checkna.id;
        label_na.appendChild(sp3);
        checkna.addEventListener('click', function() {
            if (this.checked) {
                document.getElementById(id).nilai = -1;
            }
        });
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        
        task.appendChild(checkna);
        task.appendChild(label_na);
        
        task.appendChild(checkfail);
        task.appendChild(label_fail);
        
        task.appendChild(checkpass);
        task.appendChild(label_pass);
        
        task.appendChild(teks);
        
        task.getValue = function() {
            for (var i = 0; i < 3; i++) {
                if (document.getElementsByName(id)[i].checked) {
                    if (i === 0) {
                        return 'na';
                    } else if (i === 1) {
                        return 'fail';
                    } else if (i === 2) {
                        return 'pass';
                    }
                }
            }
        };
        
        if (pertama) task.className += ' pertama';
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
        
        //Init nilai
        document.getElementById(id).nilai = 0;
    };
}

//Constructor for signature pad
function SignPad(id, text, kategori) {
    'use strict';
    this.create = function () {
        var task = document.createElement('div'),
            teks = document.createElement('span'),
            clrBtn = document.createElement('div'),
            isi = document.createTextNode(text),
            
            signpad = document.createElement('canvas');
        
        signpad.id = "imageView";
        signpad.width = "200";
        signpad.height = "200";
        signpad.style.backgroundColor = "beige";
        
        clrBtn.innerHTML = 'Padam';
        clrBtn.className = 'clrBtn';
        clrBtn.addEventListener('click', function() {
            document.getElementById('imageView').getContext('2d').clearRect(0, 0, 200, 200);
        });
        
        teks.style.display = "block";
        
        task.id = id;
        task.className = 'task';
        teks.appendChild(isi);
        
        task.appendChild(teks);
        
        task.appendChild(signpad);
        task.appendChild(clrBtn);
        
        document.getElementById(kategori + '_maindiv').appendChild(task);
    };
}

//Constructor for buttons
function Button(id, text, kategori) {
    'use strict';
    this.create = function () {
        var btn,
            isi = document.createTextNode(text);
        
        if (id === 'submit') {
            btn = document.createElement('button');
            btn.name = id;
            btn.type = 'submit';
        } else {
            btn = document.createElement('div');
        }
        
        btn.id = id;
        btn.className = 'myButton';
        btn.appendChild(isi);
        
        document.getElementById(kategori + '_maindiv').appendChild(btn);
    };
}

//Constructor for title
function Title(id, text, kategori) {
    'use strict';
    this.create = function () {
        var maindiv = document.createElement('div'),
            tt = document.createElement('header'),
            isi = document.createTextNode(text),
            sp = document.createElement('span');
        
        maindiv.className = 'maindiv';
        maindiv.id = kategori + '_maindiv';
        
        sp.id = id + '_span';
        sp.appendChild(isi);
        
        tt.id = id;
        tt.appendChild(sp);
        
        maindiv.appendChild(tt);
        document.getElementById('borang').appendChild(maindiv);
    };
}

var maklumat = {
    0: {
        'id': 't_maklumat',
        'jenis': 8,
        'teks': 'Maklumat'
    },
    1: {
        'id': 'namapremis',
        'jenis': 1,
        'teks': 'Nama premis'
    },
    2: {
        'id': 'alamatpremis',
        'jenis': 1,
        'teks': 'Alamat premis'
    },
    3: {
        'id': 'negeri',
        'jenis': 3,
        'teks': 'Negeri',
        'senarai': [
            'Pilih negeri',
            'Johor',
            'Kedah',
            'Kelantan',
            'Melaka',
            'Negeri Sembilan',
            'Pahang',
            'Pulau Pinang',
            'Perak',
            'Perlis	',
            'Selangor',
            'Terengganu',
            'Sabah',
            'Sarawak',
            'WP Kuala Lumpur',
            'WP Labuan',
            'WP Putrajaya'
        ]
    },
    4: {
        'id': 'poskod',
        'jenis': 1,
        'teks': 'Poskod'
    },
    5: {
        'id': 'tarikh',
        'jenis': 4,
        'teks': 'Tarikh audit'
    },
    6: {
        'id': 'juruaudit',
        'jenis': 1,
        'teks': 'Juruaudit'
    },
    'butang': {
        'id': 'gotoDoc',
        'jenis': 7,
        'teks': 'Dokumentasi',
        'current': maklumat,
        'next': dokumentasi
    }
};

var dokumentasi = {
    0: {
        'id': 't_dokumentasi',
        'jenis': 8,
        'teks': 'Dokumentasi',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'ssm',
        'jenis': 10,
        'teks': 'Berdaftar dengan SSM'
    },
    2: {
        'id': 'lesen',
        'jenis': 5,
        'teks': 'Mempunyai lesen perniagaan'
    },
    3: {
        'id': 'beroperasi',
        'jenis': 5,
        'teks': 'Beroperasi sepenuhnya'
    },
    4: {
        'id': 'produk_halal',
        'jenis': 5,
        'teks': 'Mengendali produk halal'
    },
    5: {
        'id': 'standard_halal',
        'jenis': 5,
        'teks': 'Mematuhi standard halal'
    },
    6: {
        'id': 'sumber_halal',
        'jenis': 5,
        'teks': 'Sumber bahan ramuan halal'
    },
    7: {
        'id': 'pembekal_halal',
        'jenis': 5,
        'teks': 'Pembekal mempunyai sijil halal'
    },
    8: {
        'id': 'ulasan_dok',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoBahan',
        'jenis': 7,
        'teks': 'Bahan mentah',
        'current': dokumentasi,
        'next': bahan
    }
};

var bahan = {
    0: {
        'id': 't_bahan',
        'jenis': 8,
        'teks': 'Bahan mentah',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'bahan_halal',
        'jenis': 5,
        'teks': 'Sumber bahan mentah halal'
    },
    2: {
        'id': 'asas_haiwan',
        'jenis': 5,
        'teks': 'Bahan mentah berasaskan haiwan halal'
    },
    3: {
        'id': 'import_halal',
        'jenis': 5,
        'teks': 'Bahan import berasaskan haiwan diiktiraf'
    },
    4: {
        'id': 'spec_produk',
        'jenis': 6,
        'teks': 'Spesifikasi produk'
    },
    5: {
        'id': 'senarai_bahan',
        'jenis': 2,
        'teks': 'Senarai bahan mentah'
    },
    6: {
        'id': 'ulasan_bahan',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoProses',
        'jenis': 7,
        'teks': 'Pemprosesan'
    }
};

var proses = {
    0: {
        'id': 't_proses',
        'jenis': 8,
        'teks': 'Pemprosesan',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'tak_campur',
        'jenis': 5,
        'teks': 'Bahan halal tidak bercampur dengan yang sebaliknya'
    },
    2: {
        'id': 'syarie',
        'jenis': 5,
        'teks': 'Menepati kehendak syarak'
    },
    3: {
        'id': 'gmp_ghp',
        'jenis': 5,
        'teks': 'Mengikut amalan GMP/GHP'
    },
    4: {
        'id': 'bersih',
        'jenis': 5,
        'teks': 'Bersih?'
    },
    5: {
        'id': 'ulasan_proses',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoBungkus',
        'jenis': 7,
        'teks': 'Pembungkusan'
    }
};

var bungkus = {
    0: {
        'id': 't_bungkus',
        'jenis': 8,
        'teks': 'Pembungkusan',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'cetak_jelas',
        'jenis': 6,
        'teks': 'Label dicetak jelas'
    },
    2: {
        'id': 'ikut_akta',
        'jenis': 6,
        'teks': 'Label mengikut akta'
    },
    3: {
        'id': 'patuh_syarak',
        'jenis': 6,
        'teks': 'Label mematuhi syarak'
    },
    4: {
        'id': 'tak_najis',
        'jenis': 6,
        'teks': 'Tidak diperbuat daripada najis'
    },
    5: {
        'id': 'ulasan_bungkus',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoAlat',
        'jenis': 7,
        'teks': 'Peralatan'
    }
};

var alat = {
    0: {
        'id': 't_alat',
        'jenis': 8,
        'teks': 'Peralatan',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'suci',
        'jenis': 5,
        'teks': 'Suci dan bersih'
    },
    2: {
        'id': 'bebas_najis',
        'jenis': 5,
        'teks': 'Bebas najis'
    },
    3: {
        'id': 'tak_mudarat',
        'jenis': 5,
        'teks': 'Tiada bahan memudaratkan'
    },
    4: {
        'id': 'tak_bulu',
        'jenis': 5,
        'teks': 'Tidak diperbuat daripada bulu haiwan'
    },
    5: {
        'id': 'telah_samak',
        'jenis': 6,
        'teks': 'Telah disamak'
    },
    6: {
        'id': 'susun_kemas',
        'jenis': 5,
        'teks': 'Disusun kemas, rapi dan selamat'
    },
    7: {
        'id': 'alat_sembah',
        'jenis': 6,
        'teks': 'Tiada alat penyembahan'
    },
    8: {
        'id': 'ulasan_alat',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoAngkut',
        'jenis': 7,
        'teks': 'Pengangkutan'
    }
};

var angkut = {
    0: {
        'id': 't_angkut',
        'jenis': 8,
        'teks': 'Pengangkutan',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'bawa_halal',
        'jenis': 5,
        'teks': 'Membawa bahan halal sahaja'
    },
    2: {
        'id': 'ulasan_angkut',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoPekerja',
        'jenis': 7,
        'teks': 'Pekerja'
    }
};

var pekerja = {
    0: {
        'id': 't_pekerja',
        'jenis': 8,
        'teks': 'Pekerja',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'pakaian',
        'jenis': 5,
        'teks': 'Berpakaian sopan dan bersesuaian'
    },
    2: {
        'id': 'terlatih',
        'jenis': 5,
        'teks': 'Menerima latihan berkaitan halal'
    },
    3: {
        'id': 'penyelia_muslim',
        'jenis': 5,
        'teks': 'Seorang penyelia muslim'
    },
    4: {
        'id': 'maklumat_pekerja',
        'jenis': 2,
        'teks': 'Maklumat pekerja'
    },
    5: {
        'id': 'ulasan_pekerja',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoSanitasi',
        'jenis': 7,
        'teks': 'Kebersihan'
    }
};

var sanitasi = {
    0: {
        'id': 't_sanitasi',
        'jenis': 8,
        'teks': 'Kebersihan',
        'markah': 0,
        'markah_penuh': 6
    },
    1: {
        'id': 'ikut_jadual',
        'jenis': 5,
        'teks': 'Pembersihan mengikut jadual sanitasi'
    },
    2: {
        'id': 'bebas_pencemaran',
        'jenis': 5,
        'teks': 'Bebas pencemaran'
    },
    3: {
        'id': 'sekitar_bersih',
        'jenis': 5,
        'teks': 'Persekitaran bersih'
    },
    4: {
        'id': 'rekod_sistem',
        'jenis': 5,
        'teks': 'Mempunyai rekod sistem kawalan makhluk perosak'
    },
    5: {
        'id': 'ulasan_sanitasi',
        'jenis': 2,
        'teks': 'Ulasan'
    },
    'butang': {
        'id': 'gotoPengesahan',
        'jenis': 7,
        'teks': 'Pengesahan'
    }
};

var pengesahan = {
    0: {
        'id': 't_pengesahan',
        'jenis': 8,
        'teks': 'Pengesahan'
    },
    1: {
        'id': 'ulasan_keseluruhan',
        'jenis': 2,
        'teks': 'Ulasan keseluruhan'
    },
    2: {
        'id': 'sign_pad',
        'jenis': 9,
        'teks': 'Tandatangan'
    },
    'butang': {
        'id': 'submit',
        'jenis': 7,
        'teks': 'Hantar'
    },
};

// Array untuk simpan semua objects
var semua =
[
    maklumat,
    dokumentasi,
    bahan,
    proses,
    bungkus,
    alat,
    angkut,
    pekerja,
    sanitasi,
    pengesahan
];

// Loop untuk create semua object
for (var i = 0; i < 10; i++) {
    var counter = 0;
    
    for (var item in semua[i]) {
        createTask(semua[i][item], counter === 1, semua[i][0].id);
        
        counter++;
    }
}

// Back button ///////////////
// Tolak satu untuk exclude butang submit
var limit = semua.length;

for (var i = 1; i < limit; i++) {
    var back_btn = document.createElement('div');
    
    back_btn.className = 'back_button';
    back_btn.innerHTML = '<';
    back_btn.simpan = i;
    back_btn.addEventListener('click', function() {
        window.location.href = '#' + semua[this.simpan - 1][0].id + '_maindiv';
        window.scrollBy(0, -window.scrollY);
    });
    
    document.getElementById(semua[i][0].id).appendChild(back_btn);
}

// Next button ///////////////
// Tolak satu untuk exclude butang submit
var limit = semua.length - 1;

for (var i = 0; i < limit; i++) {
    var nextButton = document.getElementById(semua[i].butang.id);
    
    nextButton.simpan = i;
    nextButton.addEventListener('click', function() {
        window.location.href = '#' + semua[this.simpan + 1][0].id + '_maindiv';
        window.scrollBy(0, -window.scrollY);
    });
}

// Markah
for (var i = 1; i < semua.length - 1; i++) {
    var mark = semua[i][0].markah,
        fullmark = semua[i][0].markah_penuh,
        mark_input = document.createElement('input'),
        fullmark_input = document.createElement('input');

    mark_input.name = semua[i][0].id + '_mark';
    mark_input.style.display = 'none';
    document.getElementById('borang').appendChild(mark_input);

    fullmark_input.name = semua[i][0].id + '_fullmark';
    fullmark_input.style.display = 'none';
    document.getElementById('borang').appendChild(fullmark_input);
}

document.addEventListener('click', function() {
    var total,
        semuaItem;
    
    for (var i = 1; i < semua.length - 1; i++) {
        total = 0;
        semuaItem = 0;
        
        for (var item in semua[i]) {
            var natang = document.getElementById(semua[i][item]['id']);

            if (natang.nilai !== undefined) {
                semuaItem++;
                
                if (natang.nilai === 1) {
                    total++;
                }
                
                if (natang.nilai === -1) {
                    semuaItem--;
                }
            }
        }
        
        semua[i][0]['markah'] = total;
        document.getElementsByName(semua[i][0]['id'] + '_mark')[0].value = total;
        
        semua[i][0]['markah_penuh'] = semuaItem;
        document.getElementsByName(semua[i][0]['id'] + '_fullmark')[0].value = semuaItem;
        
        if (semuaItem > 0) {
            document.getElementById(semua[i][0]['id'] + '_span').innerHTML = semua[i][0]['teks'] + ' (' + semua[i][0]['markah'] + '/' + semua[i][0]['markah_penuh'] + ')';
        } else {
            document.getElementById(semua[i][0]['id'] + '_span').innerHTML = semua[i][0]['teks'] + '\n(N/A)';
        }
    }
});

window.location.href = '#' + semua[0][0].id + '_maindiv';