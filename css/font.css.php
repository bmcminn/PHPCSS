

/** WEBFONTS
========================================*/
<?php
  $font_dir = 'stylesheets/fonts/';

  $font = array(
    'fontawesome' => array(
      'fontawesome-webfont',
      'FontAwesomeRegular',
      'fontawesome'
      ),
    // 'wootbomb'  => array(
    //   'wootbomb-webfont',
    //   'WootBombRegular',
    //   'wootbomb'
    //   ),
    );

  foreach ($font as $f) {

    $font_dir = 'stylesheets/fonts/'.$f[2].'/'.$f[0];
?>
@font-face {
  font-family: '<?php echo $f[2]; ?>';
  src: url('<?php echo $font_dir; ?>.eot');
  src: url('<?php echo $font_dir; ?>.eot?#iefix') format('embedded-opentype'),
  url('<?php echo $font_dir; ?>.woff') format('woff'),
  url('<?php echo $font_dir; ?>.ttf') format('truetype'),
  url('<?php echo $font_dir; ?>.svgz#<?php echo $f[1]; ?>') format('svg'),
  url('<?php echo $font_dir; ?>.svg#<?php echo $f[1]; ?>') format('svg');
  font-weight: normal;
  font-style: normal;
}

<?php

  }// foreach ($font as $f)
