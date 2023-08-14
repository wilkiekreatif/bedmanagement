<?php
  $kalimat  = 'TEST LUR NYA IEU MAH TES LUR';
  echo $kalimat;

  $kalimat1 = str_replace(' ','',strtolower($kalimat));
  echo('<br> '.$kalimat1.'<br>');

  $deadline = '2023-08-04';
    if($deadline==date('Y-m-d')){
      // echo('tanggal match<br>');
      
      // echo(date('Y-m-d'));
?>
      <html>
        <head>
          <title>TEST HALAMAN</title>
        </head>
        <body>
          Test HALAMAN JIKA TANGGAL SESUAI
        </body>
      </html>
<?php
    }
?>