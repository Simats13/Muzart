<?php 

$videos = get_videos();

$images = get_portfolios();

?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <title>Pérusat Création - Accueil</title>
    <meta http-equiv="imagetoolbar" content="no" />


</head>

<body id="page-top" class="index">

<div class="preloader">
            <div class="preloader-img">
                <span class="loading-animation animate-flicker"><img src="assets/img/loading.GIF" alt="loading"/></span>
            </div>
        </div>
    <div class="master-wrapper">



        <!-- Navigation -->

        <!-- Header -->
        <header id="headerwrap" class="backstretched fullheight no-overlay" style="margin-bottom:50px">
            <div class="container vertical-center">
                <div class="intro-text vertical-center text-left smoothie">
                    <div class="intro-heading wow fadeIn heading-font" data-wow-delay="0.2s">Isabelle Perusat</div>
                    <div class="intro-sub-heading wow fadeIn secondary-font" data-wow-delay="0.4s"><span class="rotate">
                    <?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Photographie, Vidéo, Création scénique, Auteur","Photography, Video, Stage design, Author");
                            echo $description[$langue]; ?> </span></div>
                    <a href="#welcome" class="btn btn-primary btn-white mt30 page-scroll" data-wow-delay="0.6s"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Voir travaux","See works");
                            echo $description[$langue]; ?> </a> 
                </div>
            </div>
        </header>

        <div style="float:right;">
					<a href="?page=home" target="_self"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxAQDw8QEA4QEA8NEBASEA8VERAQDg8PFhEYFhURFxUYHSggGBolGxUVITEiJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGi8gICA1NS0uNysrLS0tLzAtNTItLSsrLSstLS0tLS4vLS0tLS0tLS0tLS0tLS0tLS0tLS0tN//AABEIAOEA4QMBEQACEQEDEQH/xAAcAAEAAgMBAQEAAAAAAAAAAAAAAgcBBAUGAwj/xABEEAACAQIBCAYIBAIIBwAAAAAAAQIDBBEFBgchMUFRshITIjRhcRQyNXSBgpGhUnLB0ULhFSMkM2JjkrEWQ0RTosLx/8QAGwEBAAIDAQEAAAAAAAAAAAAAAAEEAwUGAgf/xAAyEQEAAgECBAQEBAcBAQAAAAAAAQIDBREEITEyEjM0cRNBUWFCkbHBFCJSodHh8IEj/9oADAMBAAIRAxEAPwC8QAAAAAAAAGJSSTbaSWtt6klxA07XK1CqpOjVhVUJdGTg1KKlwxWo9WpavdGyImJ6JSu3uR5S+UriT3gQc3xf1YGMQGIGVN8X9QJqvJbwPpG7e9AZrZRpQi51JqnFYYylqisXgtZEzEdXulLXnw1jeWzTqRklKMlKL2STTT8miXmazWdp5JBAAAAAAAAAAAAAAAAAjUmopyk1GMVi22kkuLYjmK5zs0tWtt0qdpH0qstXSxwoRf5tsvgbHBp97878o/uwXzxHRUWcOd9/fybuLmbg3qowbp0I/Itvm8WbXFw+PF2x/lWtktbqtHQr7Oqe8S5UanUvNj2WsHY9+a9mZSb2LECaoS/CwJejS4fcB6NLh9wMOhLgBBxa2poCIHCz59n3HycyMebslsdJ9XRWOSss3NrLpUK84cY4405ecHqZTrea9HW5+GxZ42yVif1/NYOb+kinPCF3BUpbOtji6T8WtsfuWKZ4nuaDitEtX+bDO8fSev8At7uhXhUipwkpwksVJNNNeZYid2itWaztaNpfQPIAAAAAAAAAAAAHCzrzrtcm0usuJ9qX93Rjg6tR8EuHi9RnwcPfNO1Xi94rHNQmeOfl5lKTjKbo22PZtoPCOHGb2zfnq8DecPwmPDHLnP1U75Zs8qWmNKEG3gk2wL10KWj/AKPqKTw/tEvH+FGi1LzY9l3B2rGhbxW7Hz1mvZn1SAAAAAAB850Ivd+gHnM+bJuwrqL1vo6n+ZGPL2S2GlztxVZU3Woyg8JRaf2ZRdpFono+YenWyDnFc2U8aM+w32qUtdKfw3PxR6pea9FTiuCxcTG145/X5rbzYzqoX0cIvoVort0ZPtLxj+JFymSLOT43T8vDTz51+rvGRQAAAAAAAAAADxWkPP8ApZMh1dNRq3tSPYp/wUl/3KmG7gtr+5c4XhJzTvPKv/dGLJk8Mfd+fsq5TrXVWVa4qSqVZvXJ7lwS3LwRvqUrSPDWNoUrWmZ3lpntDct7FvXLUuG9/sRuOhTpqKwSSRCV06G+4VPeJcqNJqPmx7LeDte9NezgAAAAAAAHGzv7nV+XmRjy9q9pvqKq1nBSWEkmnuZVdVEzHRyL3JOGuns/C/0Z5mrPTLv1cuSweD1NbjyzJ29edOUZwk4Tg8YyTwaYidkWpW8eG0bxK1syc9o3WFC4whcpdmeyFb9peG/dwVvFl8XKerldS0ucP/0xc6/p/p7UztKAAAAAAAAeK0k58wyZS6un0Z3taP8AVw3Uo7Otn4cFvfxLnCcLOad57Y/7ZiyZIr7vzxeXdStUnVqzc6lRuU5t4uTZv61isbR0UpnfnL5Qi28EsWz0h0ra2Udb1y+y8iBspkJSAubQ13Cp7xLlRpNR82PZbwdr3xr2cAAAAAAAA4ueHcqvy8yMeXtlf031NVbJlV1KQQ0b6xjPXslul+55mGWmTZwq1FweElr+z8TysxO6MJNNNNpp4prU0+IJiJjaVsZg54ekpW1w0riK7E91aK/9l99vEt4svi5T1cpqmm/Bn4uPtnr9v9PbGdpQAAAAAOFnlnLSybaTuKmuXq0qe+pVa1R8t78EZ+HwTmv4Yeb2isbvzNlbKVW6r1LitNzq1ZYye5cIrgktR0dKRSsVr0hr7WmZ3lqRi28FtZ7Q6dvQUF4vayB9QJJgZTISujQ13Cr7xLlRpNS82PZbwdr3xr2cAAAAAAAA4uePcq3y8yMeXtlf031NVaJlR1aSZLykENS8tFNYP4PemRMMtL7PP16LhJxf8muJ4WYnco1ZQlGcJOM4NSjJammtjETsi1YtE1npK6sy84431DtYKvSwVWPHhNeDL2O/ihxeo8FPDZOXbPT/AA9EZGvAAACNSainKTSjFNtvUkltbEcx+adI2dUspXs5Rb9GoNwt47ujvqPxk1j5YI6PhOHjDj2+c9VDLfxS8qWmN0LWj0Vi/Wf28CBsgAAEkwLo0Mdwq+8S5UaPUvNj2XMHa9+a9nAAAAAAAAOJnl3Kt8vMjHl7ZX9M9TVWaZUdYkmEJJkvKQQ0soWanHxXqv8AQiYZaX2eflFptNYNbUeFl0M3srzs7iFeGyLwnDdOm/Wj+3ieqW8M7q/FcNXiMU47f+faV8Wd1CtThVpvpQqRUovwZfid43hwuTHbHaaW6w+xLwAAK3005zejWsbSnLCte49LDbGgvWfhi9X1Njp+Dx38c9I/Vgz32jZQpvFNs2VLF9J7Fs8wN4gAJIAAAurQx3Cr7xPlRo9S82PZc4fte/NezgAAAAAAAHEzz7jW+XmRjy9sr+mepqrFFR1qSYQkmEJJkvKQQ5GWbT/mJbNUvLczzMLGK/ycg8s6yNFWXPXs5vZjOjjw/ij+v1LOC/4XOa3wvTPX2n9pWOWXOAGJSSTbaSSxbepJcQPy3ntl139/cXDfYc3Civw0INqH11y85M6bh8XwscV/P3a/JbxW3cOMcWlxM7w6lOKSSW4CRAAAJIABdOhfuFX3ifKjSal5sey5w/asA1zOAAAAAAAAcPPTuNb5eZGPL2y2GmepqrAqOtSTCEkwhJMISTJeWZRTTT1prB+QR0eXu6DpzlHg9XitxjldrbxRunk69nb1qden69GakvHDbHyaxXxJrO07vOXFXLScduk8n6BsrmNanTqweMKsIzi/BrE2ETvG7gMmOcd5pbrHJ9iXh5HSnlj0XJdw4vCpXXUw49vU39MS1wWPx5Y+3Njy22q/NZ0ag2bOGtvh/uBtpgSAyQAACSAunQv3Cr7xLlRo9S82PZc4ftWAa9nAAAAAAAAOHnp3Gt8vMjHl7ZbDS/U1VemU3XMkoSTCEkwhJMISTJeXMy5RxjGf4dT8nsPNoZsM89nGPKwtvRZlLrLSVFvtW02l+SWtffEt4Lb12clreDwZ/HH4v1e0M7TKW0+5Txq2lqnqhGVaa8W+jH7KRuNMpytf/wAVeIt0hUxtVZv28cIrx1gfUkEyBIgZAAALr0Ldwq+8T5UaPUvNj2XOH7VgGvZwAAAAAAADh569xrfLzIx5e2Ww0v1VVWplN1ySYGSUJJkISTJQkmEIXNPpwlH8SeHnu+4KztO7zB4XHsNF991d91beq4pyj5yj2l9ukZsE7W2afWsXj4fxf0yt8uORfmvSve9dli74UXCjHyhBY/8Ak5HRcFXw4K/fmo5p3s8lFYtLiW2J0kSMgACZAkQMgALr0Ldwq+8T5UaTUvNj2XOH7VgGuZwAAAAAAADhZ7dxrfLzIx5eyWw0v1VVWFN16SYQkgMkoSTIQkmShJMIebvYdGpNf4m15PWeJWqTvWGzm/ddTd21T8Fanj+Vy6Mvs2eqTtaJYeKx/EwXr9Yl+gMTYOBfk3OKv1l7eVG8esuriXwdWTX2OpxRtjrH2hrr90tO3XaRkeXQJAAAAJkCQGSBdehbuFX3ifKjSal5sey5w/asA1zOAAAAAAAAcLPbuNb5eZGPL2S2Gl+qqqspOwZJQkmEJIDJKEkyEJJkocTK8f63HjFHmWfH2tGTeGratnmQyQuf/iYu/Ecb/AvzTXljOb4yk/qzsY6OYTtfWXxJG8SAAAAAJkCQF16FfZ9T3ifKjR6l5sey5w/asE1zOAAAAAAAAcLPfuFb5eZGPL2S2OleqqqopOwZCGSUJJhCSYGSUJJhDk5Z9eP5f1PMsuLo55DK6vpr4/c9bqnwoV1WWEpLhJr7neR0fMU7X1l8SRvEgAAAAABMgXboV9n1PeJ8qNHqXmx7LnD9qwTXM4AAAAAAABws9+4Vvl5kY8vZLY6V6qqqSk7BkDIQyShJMISTAyShyssPtR/L+p5lkx9GgQyuj6M+B62VviQ8Tl2j1d3d09nV3NxD/TVkv0O6xzvSs/aHzG8bWlq277SPby6BIAAAAAAAuzQp7Pq+8T5UaLUvNj2XOH7VhGuZwAAAAAAADg58dwrfLzIx5eyWx0r1VVUlJ2LIQyBkIZJQkmEJJgcjKssanlFESy06NKWx+RD3HVbX/C7/AA/Yt/Dcn/H/AHU5pPsupyxerDVUqKrHxVSCk3/q6R1XB28WCv5OWzRtaXl4PBp8GWmN0iRkAAAAAAF2aFPZ9X3ifKjRal5sey5w/asI1zOAAAAAAAAcHPjuFb5eZGPN2S2OleqqqhMpOxZAyEMgZCGSUJJhDiXk8akn44fTUeZZq9H2yNbdbc29Lb1lamn+XpLpfbEmsbzEMfEZPh4r2+kS/QWBsXz9SOnvJvRurW5S1VqTpSf+KDxivpKX0N1pl96TX6c1XiI5xKrDZqzoUJYxX0JH0AAAAAABdmhT2fV94nyo0WpebHsucP2rCNczgAAAAAAAHBz47hX+XmRizdktjpXqqqmKTskkyUMgZCGQMhDFSfRi5cE2SbOEeWZ6vRnZdZlCE8NVvCU/KTXRX+7MuGN7NVrOXwcNMf1cv3XIXXHPE6X8kek5LqyisZ2rVaPHBapfZsucDk8GaPvyYs1d6vzmdCotmzntXxA2yQAAAAAC7NCns+r7xPlRotS82PZc4ftWEa5nAAAAAAAAODnx3Cv8vMjFm7JbHSvVVVMUnZAEkyUMgZCGQNTKVTCKj+Lb5ISmsc3NIZFq6KMndC3qV2tdeeEfyR/niW8Fdo3crrmbxZYxx+H93ujO0aFalGcZQklKM4uMovY4tYNfQmJ2neB+VM6Mjysr24tZL+5qSUH+Kk9dOXxi18cTp8OSMlItHza69fDOzmwlg0+BleXRi8VjxJGQAAAAAuzQp7Pq+8T5UaLUvNj2XOH7VhGuZwAAAAAAADg589wr/LzIxZuyWx0r1VVTFJ2QAAkmShkDOIQ5FzV6Um92xeRDJEbMWtvOrUhTgsZ1ZRhFcZN4IRG87PN71pWbW6RzfoHJdjG3oUqMPVpQjFeLS1v4vF/E2NY2jZwOfLOXJa8/NtEsQBVWnHNrrKUMoU49u3XV18P4qLfZk/ytv4SZtNOz7T8Ofn091fPTeN1JG5VG1aVP4X8P2A2iQAAAAF2aFPZ9X3ifKjRal5sey5w/asI1zOAAAAAAAAcDPnuFf5eZGLN2S2Ok+qqqUpOzSCAABJMlDVv62C6K2y2+CITEOeHt77RZkTp1ZXk12aWMaXjUawlL4LV8WWMFOfiaDW+K8NIw1+fOfZaJacwAAPldW8KtOdOpFShUi4yi9ji1g0TEzE7wTzfmDPbNyeTb2pbyTdNvp0J7qlF7H5rY/FHS8PmjNSLfm1+SnhnZwkzO8N6hV6S8VtA+pIAAAF2aFPZ9X3ifKjRal5sey5w/asI1zOAAAAAAAAcDPnuFf5eZGLN2S2Ok+qqqUpOzAJBABCrVUVi/guLA5c5ttt7WHptZJyfUua9OhTWM6ksMd0Y75vwS1k1rNp2hiz5q4cc5LdI/7ZfOSsnwtqNOjTXZpRS8ZPfJ+LZsK18MbQ4TPmtmyTe3WW2SxAAAB5bSFmlDKdq4LCNxRxnQqcJYa4P/AAvZ9CzwvEThvv8AKerHkp4ofmu7tp0qk6VSLhUpycZxepxktqOjraLRvChMbckKc2niiRv06iksV/8ACRMAAAuzQp7Pq+8T5UaLUvNj2XOH7VhGuZwAAAAAAADgZ89wr/LzIxZuyWx0n1VVSlJ2YAATmksXsA5teq5PHduXAJfNLFpJYt6kt7fAC4swM2PQ6XW1V/aK6WP+XDdDz3suYsfhjeerkNU4/wDiL+CnbH95+r1pmakAAAAACuNKuYHpsXd2sUrynHtw2K5prd+dbnv2cMNjwXF/DnwX6fowZcXi5x1UNODi3GScZRbTTWDTW1NG7id1MpzcXiiRvUqql58APoSAF2aFPZ9X3ifKjRal5sey5w/asI1zOAAAAAAAAcDPruFf5eZGLN2S2Ok+qqqQpO0ZCEKtVRWL+m9gaFaq5PXs3LgEvmErJ0e5nuLjeXMde2hSe7/MkuPBfHys4cX4pc3qupb74cU+8/tH7rGLLnQAAAAAAACttJejdXnSurNRhdpYzpaowuV+k/HY9/FbHg+N+H/Jfp+jBlxeLnHVRVxQnTnKnUhKE4NqUJJqUWtzRu4mJjeFOY2QTwJG1Sut0vqBsJki7dCns+r7xPlRotS82PZc4ftWEa5nAAAAAAAAOBn13Cv8vMjFm7JbHSfVVVIUnaNerdJao63x3AacpNvFvFgYSxeCWLexbW2BZOY+Yzi43N5HWtdK3e7hOfjwX18LOLD87Oc1LVd98WGfef2j/Kxiy50AAAAAAAAAAPJZ8Zh22U4dJ/1N1FdivFa3wjNfxL7lrhuLvhn6x9GO+OLKCzlzZusn1eruaTim+xVWLo1VxjLj4bUb3DnpljesqV6TWebjmZ5ThUcdj/YC9dCN0v6PqYr/AKifKjRal5sey5g7VkQqJ7Gv1NezpAAAAAAAjKaW1pAeaz9ul/R9fBY+rzIxZuyWx0n1dFNVK0pbX8NxSdogEtvJmTa1zUVOhTlUm+C7MVxk9kV5k1rNp2hhzZ8eGviyTtH/AHRa+aWZNKzwq1cKtxxw7FPwiuPiW8eKK856uV4/VL8R/JTlX+8+71pmakAAAAAAAAAAAADXv7GlcU5Uq9KFWnP1oSSlF/z8T1W9qzvWdkTETylU+dmh3HpVMnVEt/o1R6vKM93kzaYNS+WT81e+D+lVOVcl3FrUdK5oVKNT8M44dLxi9kl4rE2lL1vG9Z3VprMdVxaFfZ1T3iXKjS6l5sey5g7HvzXsycaslsbA+iupeAEvS3wQD0t8EBF3UvACEq0nvf8AsBADg58+z7j5OZGPN2S2Ok+roqe1t51ZqFOEqk5bIRTlJ/BFGImejsr3rSvitO0fd7nN/RxUnhO8l1cdvUxadR+EpbF8MSxTBP4mj4rW6V/lwxv956LGyZk2jbQVOjTjTjvwWuT4t72Wa1isbQ53NnyZreK87y2yWIAAAAAAAAAAAAAAAAa9/YUa8HTr0oVab2wnFTj54Peeq3tWd6zsiYiern5IzbtrOE6dtDqoTm5uGLlFSaw1Y7EesmW2Sd7cytYr0bUrWS2azGl85U2tqYEAAAABJQb2JgfWNtJ+AEL3I9KvTlSq4yhPDpJPDHB47SLViY2llw5rYbxenWH3yfk6jbx6FGlCnHhFJN+b2v4iKxHQy58mWd72mW0SxAAAAAAAAAAAAAAAAAAAAAAAD41gNSQGEBtUQNgAAAAAAAAAAAAAAD//2Q==" class="drapeau" height="74" width="74"  /></a>
					<a href="?page=home&lang=en" target="_self"><img src="https://romainthiery.fr/wp-content/uploads/2020/03/drapeau-anglais-rond-300x300-1-300x300.png" class="drapeau"height="80" width="80"  /></a>
				</div>
				</div>

    <!-- Portfolio -->

        <section>
            <div class="section-inner" style="margin-bottom:50px">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb100 wow">
                            <h2 class="section-heading"> <?if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Travaux Récent","Recent works");
                            echo $description[$langue]; ?> </a> </h2>
                            <h3 class="section-subheading secondary-font">Une photo vaut mieux que 1000 mots</h3>
                        </div>
                        <div class="col-md-6 text-right">
                            <ul class="portfolio-filter mb30 list-inline wow">
                                <li><a class="btn btn-primary active" href="#" data-filter="*">Tout</a></li>
                                <li><a class="btn btn-primary" href="#" data-filter=".photography">Photographie</a></li>
                                <li><a class="btn btn-primary" href="#" data-filter=".video">Video</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="container" style="margin-bottom:50px">
                    <div class="col-md-12">
                        <ul class="portfolio-items nopadding-lr isotope list-unstyled">

                        <?php foreach($images as $image){?>
                            <li class="col-sm-4 col-xs-12 portfolio-item nopadding-lr photography isotope-item">
                                <div class="hover-item">
                                    <img src="portfolio/img/posts/<?= $image->image?>" class="img-responsive smoothie" alt="">
                                    <div class="overlay-item-caption smoothie"></div>
                                    <div class="hover-item-caption smoothie">
                                        <div class="vertical-center smoothie">
                                            <h3 class="smoothie mb30"><a href="single-portfolio-fullscreen.html" title="view project"><?= $image->title?></a></h3>
                                            <a href=portfolio/img/posts/<?= $image->image ?> title="View Gallery" class="btn btn-primary lb-link smoothie">Zoom</a>
                                            <a href="portfolio/?page=post_image&id=<?= $image->id ?>" class="smoothie btn btn-primary">Voir l'article</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        <?php foreach($videos as $video){?>
                            <li class="col-sm-4 col-xs-12 portfolio-item nopadding-lr video isotope-item">
                                <div class="hover-item">
                                    <figure class="media"><oembed url="<?= $video->image?>"></oembed></figure>
                                    <div class="overlay-item-caption smoothie"></div>
                                    <div class="hover-item-caption smoothie">
                                        <div class="vertical-center smoothie">
                                            <h3 class="smoothie mb30"><a href="single-portfolio-fullscreen.html" title="view project"><?= $video->title?></a></h3>
                                            <a href="<?= $video->image?>" title="View Gallery" class="btn btn-primary lb-link smoothie"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Regarder la vidéo","Watch the video");
                            echo $description[$langue]; ?></a>
                                        <a href="?page=post_video&id=<?= $video->id ?>" class="smoothie btn btn-primary"><?php $langue=0;
                                if(isset($_GET["lang"]))
                                $langue=1;
                                $description = array("Visionner","See");
                            echo $description[$langue]; ?></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <section class="dark-wrapper dark-grey-opaqued opaqued parallax" data-parallax="scroll" data-image-src="assets/img/photo/IMG_165.jpg" data-speed="0.7" style="margin-bottom:50px">
            <div class="section-inner">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                            <div class="icon-box-1 match-height mb30">
                                <i class="fa-4x pe-7s-camera"></i>
                                <div class="content-area">
                                    <h3 class="title">Web Design</h3>
                                    <div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                            <div class="icon-box-1 match-height mb30">
                                <i class="fa-4x pe-7s-camera"></i>
                                <div class="content-area">
                                    <h3 class="title">Web Design</h3>
                                    <div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 wow fadeIn" data-wow-delay="0.2s">
                            <div class="icon-box-1 match-height mb30">
                                <i class="fa-4x pe-7s-camera"></i>
                                <div class="content-area">
                                    <h3 class="title">Web Design</h3>
                                    <div class="content">Goodbye gray sky hello blue. There's nothing can hold me when I hold you. Feels so right it cant be wrong.</div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="white-bg" style="margin-bottom:50px">
            <div class="section-inner nopadding-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9 match-height">
                            <div class="row">
                                <div class="col-xs-12">
                                    <ul class="owl-carousel-paged testimonial-owl wow fadeIn list-unstyled" data-items="3" data-items-tablet="[768,2]" data-items-mobile="[479,1]">
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/photo/IMG_0858.jpg" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">John Doe</a></h3>
                                                        <ul class="smoothie list-inline social-links wow">
                                                            <li>
                                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-behance"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/photo/IMG_0807.jpg" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">Barry Scott</a></h3>
                                                        <ul class="smoothie list-inline social-links wow">
                                                            <li>
                                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-behance"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/photo/IMG_0785.jpg" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">Tom Smooth</a></h3>
                                                        <ul class="smoothie list-inline social-links wow">
                                                            <li>
                                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-behance"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="row hover-item">
                                                <div class="col-xs-12">
                                                    <img src="assets/img/photo/IMG_0568.jpg" class="img-responsive smoothie" alt="">
                                                </div>
                                                <div class="col-xs-12 hover-item-caption smoothie">
                                                    <div class="vertical-center">
                                                        <h3 class="smoothie"><a href="single-portfolio.html" title="view project">Harvey Wallace</a></h3>
                                                        <ul class="smoothie list-inline social-links wow">
                                                            <li>
                                                                <a href="#"><i class="fa fa-twitter"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-pinterest"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-dribbble"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-facebook"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-behance"></i></a>
                                                            </li>
                                                            <li>
                                                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3 match-height">
                            <div class="vertical-center">
                                <h2 class="section-heading">Quelques Photos</h2>
                                <h3 class="section-subheading secondary-font"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="assets/js/init.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script type="text/javascript">
    $(document).ready(function() {
        'use strict';
        jQuery('#headerwrap').backstretch([
            "assets/img/photo/IMG_165.jpg"
        ], {
            duration: 8000,
            fade: 500
        });
    });
    </script>
    <script charset="utf-8" src="//cdn.iframe.ly/embed.js?api_key=9867fe0fb5b91b3ddca9ba"></script>
    <script>
        document.querySelectorAll( 'oembed[url]' ).forEach( element => {
            iframely.load( element, element.attributes.url.value );
        } );
    </script>

</body>

</html>
