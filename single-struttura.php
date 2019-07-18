<?php
/**
 * The template for displaying all single struttura organizzativa
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Design_Scuole_Italia
 */
global $post, $servizio, $autore, $luogo, $c;
get_header();
?>


	<main id="main-container" class="main-container redbrown">
		<?php get_template_part("template-parts/common/breadcrumb"); ?>


		<?php while ( have_posts() ) :  the_post();
			$image_url = get_the_post_thumbnail_url($post, "item-gallery");
			$descrizione = dsi_get_meta("descrizione");
			$didattica = dsi_get_meta("didattica");
			$link_schede_servizi = dsi_get_meta("link_schede_servizi");
			$responsabile = dsi_get_meta("responsabile");
			$persone = dsi_get_meta("persone");
			$sedi = dsi_get_meta("sedi");
			$altre_info = dsi_get_meta("altre_info");
			$telefono = dsi_get_meta("telefono");
			$mail = dsi_get_meta("mail");
			$pec = dsi_get_meta("pec");

			?>
			<section class="section bg-white article-title">
				<?php if(has_post_thumbnail($post)){ ?>
					<div class="title-img" style="background-image: url('<?php echo $image_url; ?>');"></div>
					<?php
					$colsize = 6;
				}else{
					$colsize = 12;
				} ?>
                <div class="container">
					<div class="row variable-gutters">
						<div class="col-md-<?php echo $colsize; ?>">
							<div class="title-content">
								<h1><?php the_title(); ?></h1>
                                <p class="mb-0"><?php echo $descrizione; ?></p>
									<?php get_template_part("template-parts/common/badges-argomenti"); ?>
							</div><!-- /title-content -->
						</div><!-- /col-md-6 -->
					</div><!-- /row -->
				</div><!-- /container -->
			</section><!-- /section -->

			<section class="section bg-white">
				<div class="container container-border-top">
					<div class="row variable-gutters">
						<div class="col-lg-3 col-md-4 aside-border px-0">
							<aside class="aside-main aside-sticky">
								<div class="aside-title">
									<a class="toggle-link-list" data-toggle="collapse" href="#lista-paragrafi" role="button" aria-expanded="true" aria-controls="lista-paragrafi">
										<span><?php _e("Dettagli", "design_scuole_italia"); ?></span>
										<svg class="icon icon-toggle svg-arrow-down-small"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-arrow-down-small"></use></svg>
									</a>
								</div>
                                <div id="lista-paragrafi" class="link-list-wrapper collapse show">
                                    <ul class="link-list">
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-cosa" title="Vai al paragrafo <?php _e("Cosa fa", "design_scuole_italia"); ?>"><?php _e("Cosa fa", "design_scuole_italia"); ?></a>
                                        </li>
	                                    <?php if((is_array($responsabile) && count($responsabile)>0) || (is_array($persone) && count($persone)>0)){ ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-organizzazione" title="Vai al paragrafo <?php _e("Organizzazione", "design_scuole_italia"); ?>"><?php _e("Organizzazione", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php } ?>
                                        <?php if(is_array($sedi) && count($sedi)>0) { ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-sede" title="Vai al paragrafo <?php _e("Sede", "design_scuole_italia"); ?>"><?php _e("Sede", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php } ?>
                                        <?php if($altre_info != ""){ ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-info" title="Vai al paragrafo <?php _e("Ulteriori informazioni", "design_scuole_italia"); ?>"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></a>
                                        </li>
                                        <?php } ?>
                                        <li>
                                            <a class="list-item scroll-anchor-offset" href="#art-par-more" title="Vai al paragrafo <?php _e("Per saperne di più", "design_scuole_italia"); ?>"><?php _e("Per saperne di più", "design_scuole_italia"); ?></a>
                                        </li>
                                    </ul>
                                </div>
							</aside>

						</div>
						<div class="col-lg-8 col-md-8 offset-lg-1">
							<article class="article-wrapper pt-4">
								<div class="row variable-gutters">
									<div class="col-lg-12 d-flex justify-content-end">
										<?php get_template_part("template-parts/single/actions"); ?>
									</div><!-- /col-lg-12 -->
								</div><!-- /row -->
                                <h4 id="art-par-cosa"><?php _e("Cosa fa", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                       <?php the_content(); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <?php if($didattica){ ?>
                                <h6><?php _e("Didattica", "design_scuole_italia"); ?></h6>
                                <div class="card-deck card-deck-spaced mb-4">
                                    <?php foreach ($didattica as $dida){ ?>
                                        <div class="card card-bg card-icon-main rounded">
                                            <a href="<?php echo $dida["url_ciclo"]; ?>">
                                                <div class="card-body">
                                                    <svg class="icon svg-school"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#svg-school"></use></svg>
                                                    <div class="card-icon-content">
                                                        <p><strong><?php echo $dida["nome_ciclo"]; ?></strong></p>
                                                    </div><!-- /card-icon-content -->
                                                </div><!-- /card-body -->
                                            </a>
                                        </div><!-- /card card-bg card-icon-main rounded -->
                                    <?php } ?>
                                </div><!-- /card-deck card-deck-spaced -->
                                <?php } ?>
                                <?php if($link_schede_servizi){ ?>
                                <h6><?php _e("Servizi", "design_scuole_italia"); ?></h6>
                                <div class="card-deck card-deck-spaced mb-4">
                                    <?php
                                    foreach ($link_schede_servizi as $idservizio){
	                                    $servizio = get_post($idservizio);
	                                    get_template_part("template-parts/servizio/card");
                                    }
                                    ?>
                                </div><!-- /card-deck card-deck-spaced -->
                                <?php } ?>
                                <?php if((is_array($responsabile) && count($responsabile)>0) || (is_array($persone) && count($persone)>0)){ ?>
                                <h4 id="art-par-organizzazione"><?php _e("Organizzazione", "design_scuole_italia"); ?></h4>
                                <?php if(is_array($responsabile) && count($responsabile)>0){ ?>
                                <h6><?php _e("Responsabile", "design_scuole_italia"); ?></h6>
                                <div class="card-deck card-deck-spaced mb-2">
                                    <?php
                                    foreach ($responsabile as $idutente) {
	                                    $autore = get_user_by("ID", $idutente);
	                                    ?>
                                        <div class="card card-bg card-avatar rounded">
                                            <a href="<?php echo get_author_posts_url($idutente); ?>">
                                                <div class="card-body">
                                                <?php get_template_part("template-parts/autore/card"); ?>
                                                </div>
                                            </a>
                                        </div><!-- /card card-bg card-avatar rounded -->
	                                    <?php
                                    }
                                        ?>
                                </div><!-- /card-deck -->
								<?php } ?>
								<?php if(is_array($persone) && count($persone)>0){ ?>
                                <h6><?php _e("Persone", "design_scuole_italia"); ?></h6>
                                <div class="card-deck card-deck-spaced mb-2">
	                                <?php
	                                foreach ($persone as $idutente) {
		                                $autore = get_user_by("ID", $idutente);
		                                ?>
                                        <div class="card card-bg card-avatar rounded">
                                            <a href="<?php echo get_author_posts_url($idutente); ?>">
                                                <div class="card-body">
					                                <?php get_template_part("template-parts/autore/card"); ?>
                                                </div>
                                            </a>
                                        </div><!-- /card card-bg card-avatar rounded -->
		                                <?php
	                                }
	                                ?>
                                </div><!-- /card-deck -->
								<?php } ?>
                                <?php } ?>
                                <?php if(is_array($sedi) && count($sedi)>0) {
                                    ?>
                                <h4 id="art-par-sede"><?php _e("Sede", "design_scuole_italia"); ?></h4>
                                    <?php
	                                $c=0;
	                                foreach ($sedi as $idluogo){
		                                $c++;
		                                $luogo = get_post($idluogo);
	                                    get_template_part( "template-parts/luogo/card" );

                                    }
                                    ?>
                                <?php } ?>
	                            <?php if($altre_info != ""){ ?>
                                <h4 id="art-par-info" class="mb-4"><?php _e("Ulteriori informazioni", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <?php echo wpautop($altre_info); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
	                            <?php } ?>
                                <h4 id="art-par-more"><?php _e("Per saperne di più", "design_scuole_italia"); ?></h4>
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
                                        <ul>
                                            <?php if($telefono){ ?><li><strong>Telefono:</strong> <?php echo $telefono; ?></li><?php } ?>
	                                        <?php if($mail){ ?><li><strong>Email:</strong> <?php echo $mail; ?></li><?php } ?>
	                                        <?php if($pec){ ?><li><strong>PEC:</strong> <?php echo $pec; ?></li><?php } ?>
                                        </ul>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
                                <div class="row variable-gutters">
                                    <div class="col-lg-9">
								<?php get_template_part("template-parts/single/bottom"); ?>
                                    </div><!-- /col-lg-9 -->
                                </div><!-- /row -->
							</article>
						</div><!-- /col-lg-8 -->
					</div><!-- /row -->
				</div><!-- /container -->
			</section>
		<?php
            global $related_type;
			$related_type = "card-white";
            get_template_part("template-parts/single/more-posts"); ?>
		<?php  	endwhile; // End of the loop. ?>
	</main><!-- #main -->

<?php
get_footer();
