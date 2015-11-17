<?php foreach ($news as $news_item){ ?>

	<h4> <?php echo $news_item["title"] ?></h4>
		<div>
			<?php echo $news_item["text"] ?>
		</div>
		<p><a href="<?php echo base_url(); ?>index.php/news/view/<?php echo $news_item['slug'] ?>"> Leer mas... </a>
		 </p>
<?php } ?>

<br><br><?php echo "Ultima noticia creada: ".$ultimanoticia ?> <br><br>
