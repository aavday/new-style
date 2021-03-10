<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
CModule::IncludeModule('iblock'); 
$arSelect = Array("ID", "IBLOCK_ID","CREATED_BY","NAME", "PROPERTY_*");
$arFilter = Array("ID" => 2, "IBLOCK_ID"=>2,  "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
$ob = $res->GetNextElement(); $info = $ob->GetProperties();
?>
<div class="preloader">
	<div>
		
	</div>
</div>
<header class="header">
        <div class="container">
            <div class="header-inner-wrapper">
                <div class="header-inner row justify-content-md-between justify-content-center">
                    <div class="header__figure"></div>
                    <a href="" class="header__logo">
                        <img src="<?=SITE_TEMPLATE_PATH?>/dist/assets/img/logo.png" alt="" class="header__logo-img">
                        <img src="<?=SITE_TEMPLATE_PATH?>/dist/assets/img/logo_fixed.png" alt="" class="header__logo-img-fixed">
                    </a>
                    <nav class="header__nav d-md-flex d-none">
                        <ul class="header__nav-list">
                            <li class="header__nav-list-item">
                                <a href="" class="text-decoration-none" data-scroll=".about">О компании</a>
                            </li>
                            <li class="header__nav-list-item">
                                <a href="" class="text-decoration-none" data-scroll=".portfolio">Портфолио и отзывы</a>
                            </li>
                            <li class="header__nav-list-item">
                                <a href="" class="text-decoration-none" data-scroll=".stages">Этапы работ</a>
                            </li>
                            <li class="header__nav-list-item">
                                <a href="" class="text-decoration-none" data-scroll=".contacts">Контакты</a>
                            </li>
                        </ul>
                    </nav>
                    <div class="col-xl-4 header__social d-flex flex-sm-row flex-column align-items-sm-center justify-content-sm-end align-items-end">
                        <div class="header__social-links">
                            <a href="<?=$info['INSTAGRAM']['VALUE']?>"><i class="icon mx-2 fab fa-instagram"></i></a>
                            <!--<a href="<?=$info['VKONTAKTE']['VALUE']?>"><i class="icon mx-2 fab fa-vk"></i></a>-->
                            <a href="<?=$info['WHATSAPP']['VALUE']?>"><i class="icon mx-2 fab fa-whatsapp"></i></a>
                        </div>
                        <?=$info['PHONE']['~VALUE']['TEXT']?>
                    </div>
                    <div class="header__buttons text-center">
                        <button class="button button-grey my-3 d-block"><a href="" class="text-decoration-none" data-scroll=".portfolio">Портфолио</a></button>
                        <button class="button button-orange my-3 d-block modal-link">Узнать стоимость</button>
                    </div>
                </div>
            </div>
            <div class="burger d-md-none d-block">
                <div class="burger__item"></div>
            </div>
        </div>
	</header>
	
    <main class="main">
        <section class="section intro" id="intro">
            <div class="owl-carousel owl-theme intro__slider">

				<?
				$arSelect = Array("ID", "IBLOCK_ID","CREATED_BY","NAME", "PREVIEW_PICTURE");
				$arFilter = Array("IBLOCK_ID"=>3,  "ACTIVE"=>"Y");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);       
                while($slider = $res->GetNextElement()):?> 
				<? $slider = $slider->GetFields();?>

                <div class="item owl-lazy" data-src="<?=CFile::GetPath($slider['PREVIEW_PICTURE'])?>">
                    <div class="container">
                        <div class="intro-inner d-flex flex-column justify-content-center align-items-md-end align-items-center text-md-right text-center">
                            <p class="intro__title">Дизайн интерьера</p>
                            <p class="intro__subtitle">ПОД КЛЮЧ</p>
                            <p class="intro__advantages mt-4 mb-5 d-flex flex-md-row flex-column segoe-ui">
                                <span><i class="fas fa-check ml-md-5 ml-0"></i><span class="ml-2">Концепция</span></span>
                                <span><i class="fas fa-check ml-md-5 ml-0"></i><span class="ml-2">3D визуализация</span></span>
                                <span><i class="fas fa-check ml-md-5 ml-0"></i><span class="ml-2">Строительные чертежи</span></span>
                                <span><i class="fas fa-check ml-md-5 ml-0"></i><span class="ml-2">Авторский надзор</span></span>
                            </p>
                            <div>
								<button class="button button-grey mr-3"><a href="" class="text-decoration-none" style="color: black;" data-scroll=".portfolio">Портфолио</a></button>
                                <button class="button button-orange modal-link">Узнать стоимость</button>
                            </div>
                        </div>
                    </div>
				</div>

				<? endwhile; ?>

            </div>
        </section>
        <section class="section about" id="about">
            <a href="" data-scroll=".about" alt="" class="intro__mouse">
                <span class="intro__mouse-line"></span>
            </a>
            <div class="container">
                <h2 class="section-title mt-sm-4 mt-0">
                    О компании
                </h2>
				<?
				$arSelect = Array("ID", "IBLOCK_ID","CREATED_BY","NAME", "PREVIEW_TEXT","PREVIEW_PICTURE");
				$arFilter = Array("ID"=>5, "IBLOCK_ID"=>4,  "ACTIVE"=>"Y");
				$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);       
				$about = $res->GetNextElement();
				$aboutf = $about->GetFields();
				?>
                <div class="row text-md-left text-center">
                    <div class="col-1"></div>
                    <div class="col-lg-3 col-md-5 col-12">
                        <div class="about__portrait-wrapper">
                            <div data-src="<?=CFile::GetPath($aboutf['PREVIEW_PICTURE'])?>" alt="" class="lazy about__portrait"></div>
                            <div class="about__portrait-figure"></div>
                        </div>
                    </div>
                    <div class="col-1 d-lg-block d-none"></div>
                    <div class="col-md-6 col-12 about__text">
						<?=$aboutf['PREVIEW_TEXT']?>                      
                    </div>
                </div>
                <div class="row about__advantages text-sm-center text-left">
					
					<?
					$arSelect = Array("ID", "IBLOCK_ID","CREATED_BY","NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT");
					$arFilter = Array("IBLOCK_ID"=>5,  "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);       
					while($advantage = $res->GetNextElement()):?> 
					<? $adv = $advantage->GetFields();?>
					<div class="col-lg-4 col-sm-6 col-12 about__advantages-item mt-3 d-sm-block d-flex flex-sm-column flex-row">
                        <img src="<?=CFile::GetPath($adv['PREVIEW_PICTURE'])?>" alt="" class="lazy about__advantages-item-img mr-sm-0 mr-4">
                        <div>
                            <?=$adv['PREVIEW_TEXT']?>
                        </div>
					</div>
					<? endwhile; ?>

                </div>
            </div>
        </section>
    
        <section class="section portfolio" id="portfolio">
            <div class="container-wide">
                <h2 class="section-title text-white mb-sm-3 mb-5">
                    Портфолио и отзывы
                </h2>
                <div class="owl-carousel owl-theme portfolio__slider">
					
					<?
					$arSelect = Array("ID", "IBLOCK_ID","CREATED_BY","NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");
					$arFilter = Array("IBLOCK_ID"=>6,  "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);       
					while($feedback = $res->GetNextElement()):?> 
					<? $fbf = $feedback->GetFields(); $fbp = $feedback->GetProperties(); ?>			
                    <div class="item">
                        <div class="d-flex flex-xl-row flex-column">
                            <div class="portfolio__inner-slider-wrapper">
                                <span class="portfolio__example-name text-white font-biggest"><?=$fbp['TITLE']['~VALUE']['TEXT']?></span>
                                <div class="portfolio__inner-slider owl-carousel owl-theme">
									<? foreach($fbp['GALERY']['VALUE'] as $fbphoto):?>
                                    <div class="item owl-lazy" data-src='<?=CFile::GetPath($fbphoto)?>' data-thumb="<img src='<?=CFile::GetPath($fbphoto)?>' class='lazy'>"></div>
                                    <? endforeach; ?>
                                </div>
                            </div>
                            <div class="portfolio__feedback justify-content-xl-center text-xl-center text-sm-left text-center d-flex flex-xl-column flex-sm-row flex-column">
                                <div class="lazy portfolio__feedback-portrait mx-xl-auto mr-sm-2 mx-auto mb-sm-0 mb-3" data-src="<?=CFile::GetPath($fbp['AUTHOR']['VALUE'])?>"></div>
                                <div class="portfolio__feedback-text d-flex justify-content-center flex-column ml-xl-0 ml-4">
                                    <p class="font-bigger my-xl-5 mt-0 mb-3 font-italic">
										<?=$fbp['FEEDBACK']['VALUE']['TEXT']?>
                                    </p>
                                    <a href="<?=$fbp['INSTAGRAM']['VALUE']?>" class="text-coffee"><i class="icon fab fa-instagram mr-2"></i><span><?=$fbp['INSTAGRAM']['VALUE']?></span></a>
                                </div>
                            </div>
                        </div>
					</div>					
					<? endwhile; ?>

                </div>
            </div>
        </section>
    
        <section class="section stages" id="stages">
            <div class="container">
                <h2 class="section-title mb-sm-0 mb-4 mt-sm-t mt-0">
                    Этапы работ
                </h2>
                <p class="text-center font-bigger">
                    Начинаем работу с приятного знакомства, обсуждения будущего интерьера и Ваших пожеланий.
                </p>
                <div class="row mt-5 text-center">

					<?
					$arSelect = Array("ID", "IBLOCK_ID","CREATED_BY","NAME", "PREVIEW_PICTURE", "PREVIEW_TEXT", "PROPERTY_*");
					$arFilter = Array("IBLOCK_ID"=>7,  "ACTIVE"=>"Y");
					$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);       
					while($steps = $res->GetNextElement()):?> 
					<? $step = $steps->GetFields(); $step = $steps->GetProperties(); ?>
					<div class="col-lg-4 col-sm-6 col-12 mt-sm-3 mt-0">
                        <div class="stages__img">
                            <img src="<?=CFile::GetPath($step['NUMBER']['VALUE'])?>" alt="" class="lazy stages__img-number">
                            <img src="<?=CFile::GetPath($step['PHOTO']['VALUE'])?>" alt="" class="lazy">
                        </div>
                        <p class="font-big text-uppercase font-weight-bold">
                            <span class="text-border-bottom"><?=$step['TITLE']['VALUE']?></span>
                        </p>
                        <p>
							<?=$step['CONTENT']['VALUE']['TEXT']?>
                        </p>
					</div>
					<? endwhile; ?>
                    
                </div>
            </div>
        </section>

        <section class="section contacts" id="contacts">
            <div class="container-wide">
				<h2 class="section-title mb-5">Контакты</h2>
                <div class="shadow d-flex flex-xl-row flex-column-reverse">
                    <div class="contacts__map" id="contacts__map"></div>
                    <div class="contacts__info d-flex align-items-center flex-xl-column flex-md-row flex-column justify-content-center text-xl-center text-md-left text-center">
                        <div class="d-flex flex-column col-xl col-md-7">
                            <div class="font-biggest mb-xl-2 mb-0">
                                Студия дизайна интерьеров <span class="font-weight-bold">«НОВЫЙСТИЛЬ»</span>
                            </div>
                            <div class="d-flex flex-xl-column flex-sm-row flex-column font-bigger my-2 justify-content-md-start justify-content-center">
                                <div>
									<?=$info['CITY']['VALUE']?>
                                </div>
                                <div>
									<?=$info['STREET']['VALUE']?>
                                </div>
							</div>
								<?=$info['PHONE_FOOTER']['~VALUE']['TEXT']?>
                        	</div>
                        <div class="d-flex flex-column col-xl col-md-5 align-items-xl-center align-items-md-end align-items-center">
                            <p>
                                <a href=""><i class="icon mx-2 fab fa-instagram"></i></a>
                                <!--<a href=""><i class="icon mx-2 fab fa-vk"></i></a>-->
                                <a href=""><i class="icon mx-2 fab fa-whatsapp"></i></a>
                            </p>
                            <button class="mt-3 button button-yellow modal-link">Получить консультацию</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer text-grey">
        <a href="" data-scroll=".intro" alt="" class="footer__mouse">
            <span class="footer__mouse-arrow-1"></span>
            <span class="footer__mouse-arrow-2"></span>
            <span class="footer__mouse-line"></span>
        </a>
        <div class="container-wide">
            <div class="d-flex justify-content-between row flex-sm-row flex-column">
                <div class="d-flex align-items-center text-sm-left text-center justify-content-sm-start justify-content-center flex-sm-row flex-column col-sm-6 mb-sm-0 mb-4">
                    <a href="" class="footer__logo"><img src="<?=SITE_TEMPLATE_PATH?>/dist/assets/img/logo_mini.png" alt="" class="mb-sm-0 mb-3"></a>
                    <span class="ml-4">© Студия дизайна интерьеров <span class="font-weight-bold">«НОВЫЙСТИЛЬ»</span>. Все права защищены.</span>
                </div>
                <div class="d-flex align-items-center justify-content-sm-end justify-content-center col-sm-6"><span class="mr-2">Создание и поддержка –</span><img src="<?=SITE_TEMPLATE_PATH?>/dist/assets/img/it-chelny_logo.png" alt=""></div>
            </div>
        </div>
    </footer>

    <div class="modal px-3">
        <div class="modal-content price-request">
            <a class="modal-close"></a>
            <form action="" onsubmit="return false;" class="price-request__form text-center">
                <div class="price-request__form-title futura-book">
                    Узнать стоимость
                </div>
                <div class="font-big mb-4">Заполните и отправьте форму и мы скоро вам перезвоним</div>
                <input type="text" id="name" class="price-request__form-input price-request__form-name my-2" placeholder="Ваше имя">
                <input type="text" id="phone" class="price-request__form-input price-request__form-organization my-2" placeholder="Телефон">
                <input type="email" id="mail" class="price-request__form-input price-request__form-mail my-2" placeholder="E-mail">
                <textarea type="text" id="question" class="price-request__form-textarea my-2" placeholder="Ваш вопрос"></textarea>
                <span class="text-right d-block text-dark-grey">Отправляя форму, вы соглашаетесь на обработку персональных данных</span>
                <button  id="btn_submit" class="button button-orange price-request__form-button my-4 mx-auto">
                    ОТПРАВИТЬ
                </button>
            </form>
        </div>
    </div>




<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>