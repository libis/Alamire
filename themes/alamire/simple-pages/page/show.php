<?php
  echo head(array(
    'title' => metadata('simple_pages_page', 'title'),
    'bodyclass' => 'page simple-page',
    'bodyid' => metadata('simple_pages_page', 'slug')
  ));

  $slug = metadata('simple_pages_page', 'slug');
?>
<div id="primary">

    <div id="primary-nav">
        <?php
            echo public_nav_main();
        ?>
    </div>

    <?php if($slug == "polyphony"):?>
      <div id="side-gallery">
        <img src="https://idemdatabase.org/files/thumbnails/bbdc7a0f55eb835e45cf13672fd2d47e.jpg">
          <img src="https://idemdatabase.org/files/thumbnails/d98cc8558fca6bafc7cbde65b089854c.jpg">
          <img src="https://idemdatabase.org/files/thumbnails/546dbbdf8821aac72b9054bbbfebed84.jpg">
      </div>
    <?php endif;?>
    <?php if($slug == "plainchant"):?>
      <div id="side-gallery">
        <img src="https://idemdatabase.org/files/thumbnails/28e87c36faa67b64929fa65cb18e060f.jpg">
          <img src="https://idemdatabase.org/files/thumbnails/0592bcf57ac620f465fa5f8328b81123.jpg">
          <img src="https://idemdatabase.org/files/thumbnails/936e9f143bafa3e0fe7dde86f0ee316d.jpg">
      </div>
    <?php endif;?>
    <?php if($slug == "carillon"):?>
      <div id="side-gallery">
        <img src="https://idemdatabase.org/files/thumbnails/63c24736de39e75888937647452a98f4.jpg">
        <img src="https://idemdatabase.org/files/thumbnails/63116d2d591a525efd4d438ddf767db4.jpg">
      </div>
    <?php endif;?>

</div><!-- end primary -->
<div id="secondary">
    <h4><?php echo metadata('simple_pages_page', 'title'); ?></h4>
    <?php
    $text = metadata('simple_pages_page', 'text', array('no_escape' => true));
    echo $this->shortcodes($text);
    ?>
</div>

<?php echo foot(); ?>
