<?php
//подключение к БД
$server = "localhost";
$login ="alexatash_pricel";
$pass = "pricelistcapsula";
$name_db = "alexatash_pricel";

$link = mysqli_connect($server, $login, $pass, $name_db);

if ($link == False)
{
    echo "Соединение не удалось";
}
//делаем запрос к БД и достаем сущность из таблицы message в переменную result
$result = mysqli_query($link, "SELECT * FROM `woman_clother_sew`");
$result2 = mysqli_query($link, "SELECT * FROM `kids_clother_sew`");
$result3 = mysqli_query($link, "SELECT * FROM `repair_skirts`");
$result4 = mysqli_query($link, "SELECT * FROM `repair_pants`");
$result5 = mysqli_query($link, "SELECT * FROM `repair_jeans`");
$result6 = mysqli_query($link, "SELECT * FROM `repair_dress`");
$result7 = mysqli_query($link, "SELECT * FROM `repair_blazer`");
$result8 = mysqli_query($link, "SELECT * FROM `repair_coat`");
$result9 = mysqli_query($link, "SELECT * FROM `repair_shirt`");
$result10 = mysqli_query($link, "SELECT * FROM `repair_jacket`");

 ?> 

<!DOCTYPE html>
<html lang="ru">
  <head>
      <!-- Yandex.Metrika counter -->
<script type="text/javascript" >
   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
   m[i].l=1*new Date();
   for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
   k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

   ym(94320010, "init", {
        clickmap:true,
        trackLinks:true,
        accurateTrackBounce:true,
        webvisor:true
   });
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/94320010" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="description"
      content="Страница с ценами на индивидуальный пошив и ремонт одежды"
    />
    <link rel="icon" href="favicon.ico" />
    <link rel="icon" href="images/favicon.svg" type="image/svg+xml" />
    <link rel="apple-touch-icon" href="images/apple.png" />
    <link rel="stylesheet" href="css/price.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap"
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,300;0,400;0,500;1,500&display=swap"
      rel="stylesheet"
    />
    <title>Цены</title>
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,300;0,400;0,500;1,300;1,400;1,500&display=swap");
    </style>
  </head>
  <body>
    <section class="header-wrap">
      <header class="header">
      <div class="header-adaptive-wrap">
        <div class="burger">
          <span></span>
        </div>
        <a href="index.html">
          <img src="images/logo.png" alt="логотип" class="logo" />
        </a>
</div>
        <nav>
          <ul class="menu">
            <li>
              <p class="menu_link">
                ПОШИВ НА ЗАКАЗ <span class="arrow"></span>
              </p>
              <ul class="sub-menu_list">
                <li><a href="order1.html">ПОШИВ ПО ГОТОВОМУ ФАСОНУ</a></li>
                <li><a href="ind_order.html">ИНДИВИДУАЛЬНЫЙ ПОШИВ</a></li>
              </ul>
            </li>
            <li><a href="#">РЕМОНТ ОДЕЖДЫ</a></li>
            <li><a href="price.php">ЦЕНЫ</a></li>
            <li><a href="portfolio.html">ПОРТФОЛИО</a></li>
            <li><a href="delivery.html">ДОСТАВКА И ВОЗВРАТ</a></li>
          </ul>
        </nav>
      </header>
    </section>
    <section class="main-wrap">
      <div class="main">
        <div class="main-text">
          <h1 class="title">
            Цены на индивидуальный пошив<br />
            и ремонт одежды
          </h1>
        </div>
      </div>
    </section>
    <section class="content-wrap">
      <div class="desc-price">
        <div class="text-price">
          <p>
            Стоимость пошива зависит от сложности изделия, деталей, кроя,
            фасона, ткани.<br /><br />

            Каждый усложняющий элемент увеличивает стоимость пошива.<br /><br />

            Карманы, воротники, манжеты, рельефы, складки, кокетки, капюшоны,
            декоративные детали и т.д. – являются усложняющими элементами.
          </p>
        </div>
      </div>
      <h2>Пошив женской одежды</h2>

      <div class="ind-price-wrap">
        <div class="ind-price-list">
          <div class="title-ind-price">
            <h3>Наименование изделия</h3>
            <h3 class="price-title" >Цена, руб.</h3>
          </div>
        </div>
        <?php
        while($new = mysqli_fetch_assoc ($result)) { ?>
          <div class="ind-price-list">
          <div class="title-ind-price">
            <h4><?php echo $new['name']; ?></h4>
            <h6> <?php echo $new['price']; ?></h6>
          </div>
          <hr />
          <?php
        }
        ?> 
        </div>
        </div>     
    </section>
    <section class="kids-clother-wrap">
    <h2>Пошив детской одежды</h2>
    <div class="ind-price-wrap">
        <div class="ind-price-list">
          <div class="title-ind-price">
            <h3>Наименование изделия</h3>
            <h3>Цена, руб.</h3>
          </div>
        </div>
        <?php
         while($new2 = mysqli_fetch_assoc ($result2)) { ?>
        <div class="ind-price-list">
          <div class="title-ind-price">
            <h4><?php echo $new2['kidsname']; ?></h4>
            <h6><?php echo $new2['kidsprice']; ?></h6>
          </div>
          <hr />
          <?php
        }
        ?> 
        </div>
        </div>    
    </section>
    <section class="price-main-wrap">
      <div class="price-wrap">
    <h2>Ремонт одежды</h2>
    <div class="repair-item">
      <h5>Юбки</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>

    <div class="repair-wrap">
    <?php
         while($new3 = mysqli_fetch_assoc ($result3)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new3['name']; ?></h4>
    <h6><?php echo $new3['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" /> 

    <div class="repair-item">
      <h5>Брюки</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new4 = mysqli_fetch_assoc ($result4)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new4['name']; ?></h4>
    <h6><?php echo $new4['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" /> 

        <div class="repair-item">
      <h5>Джинсы</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new5 = mysqli_fetch_assoc ($result5)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new5['name']; ?></h4>
    <h6><?php echo $new5['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" />

        <div class="repair-item">
      <h5>Платье</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new6 = mysqli_fetch_assoc ($result6)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new6['name']; ?></h4>
    <h6><?php echo $new6['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" />

        <div class="repair-item">
      <h5>Пиджаки и жакеты</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new7 = mysqli_fetch_assoc ($result7)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new7['name']; ?></h4>
    <h6><?php echo $new7['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" />
        <div class="repair-item">
      <h5>Пальто</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new8 = mysqli_fetch_assoc ($result8)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new8['name']; ?></h4>
    <h6><?php echo $new8['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" />

        <div class="repair-item">
      <h5>Блузки и рубашки</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new9 = mysqli_fetch_assoc ($result9)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new9['name']; ?></h4>
    <h6><?php echo $new9['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" />

        <div class="repair-item">
      <h5>Куртки</h5>
      <div>
      <img src=images/arrow_img.png class="arrow" alt="стрелка">
      </div>
    </div>
    <div class="repair-wrap">
    <?php
         while($new10 = mysqli_fetch_assoc ($result10)) { ?>
    <div class="repair-price">
    <div class="title-ind-price">
    <h4><?php echo $new10['name']; ?></h4>
    <h6><?php echo $new10['price']; ?></h6>
    </div>
    </div>
    <hr /> 
    <?php
        }
        ?>
        </div> 
        <hr class="line" />



      </div>
    </section>
    <footer>
      <div class="footer-wrap">
        <div class="footer-links">
          <div class="footer-contacts">
            <h7 class="contacts">Контакты</h7>
            <p>
              Тел.: +7 (902) 799-79-22<br />
              Адрес: п. Суксун, ул. Карла Маркса, 7 (универмаг)<br />
              <br />Режим работы: пн-пт: 9:00-18:00 / обед: 12:00-13:00<br />
              сб: 9:00-15:00 / обед: 12:00-13:00<br />
              вс: выходной
            </p>
            <div class="social-links">
              <a href="https://vk.com/capsula_suksun" target="_blank"
                >ВКонтакте</a
              >
              <a href="https://vk.com/capsula_suksun" target="_blank"
                >Telegram</a
              >
<a href="https://wa.me/79027997922?text=%D0%97%D0%B4%D1%80%D0%B0%D0%B2%D1%81%D1%82%D0%B2%D1%83%D0%B9%D1%82%D0%B5!%20%D0%9C%D0%B5%D0%BD%D1%8F%20%D0%B8%D0%BD%D1%82%D0%B5%D1%80%D0%B5%D1%81%D1%83%D0%B5%D1%82..." target="_blank">WhatsApp</a>              <a href="viber://chat?number=%2B79027997922" target="_blank"
                >Viber</a
              >
            </div>
          </div>
          <div class="footer-link">
            <h7>Информация</h7>
            <a href="ind_order.html">Индивидуальный пошив</a>
            <a href="order1.html">Пошив по готовому фасону</a>
            <a href="repair.html">Ремонт одежды</a>
            <a href="price.php">Цены</a>
            <a href="portfolio.html">Портфолио</a>
            <a href="delivery.html">Доставка и возврат</a>
            <button class="modal__btn2 _modal-open" data-modal-open="modal-1">
              Как снять мерки
            </button>
                      </div>
          <div class="footer-documents">
            <h7>Документы</h7>
           
            <p>
            Изображение от <a class="freepik" href="https://ru.freepik.com/free-photo/top-view-sewing-accesories-with-copy-space_8967515.htm#query=%D0%B0%D1%82%D0%B5%D0%BB%D1%8C%D0%B5&position=9&from_view=search&track=sph"target="_blank">Freepik</a>
            </p>
           <p>
              Сайт разработан:<br /><br />
            
           
            <a class="footer-link_my" href="https://t.me/sashatashaa" target="_blank"
              >Александрой Ташлыковой</a
            > </p>
            <p class="footer-logo">© CAPSULA 2023</p>
          </div>
        </div>
      </div>
    </footer>

    <div class="_modal" data-modal="modal-1">
      <div class="modal-bg">
        <div class="modal-body">
          <div class="modal-close"><img src="images/close.svg" alt="" /></div>
          <div class="modal-content modal-callback">
            <div class="modal-image">
              <img src="images/size_img.jpg" alt="как снять мерки" />
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      let menu_link = document.querySelector(".menu_link");
      document.querySelector(".burger").addEventListener("click", function () {
        menu_link.classList.toggle("parent");
        this.classList.toggle("active");
        document.querySelector("nav").classList.toggle("open");
      });
    </script>

    <script src="./js/adaptive_menu.js"></script>
        <script src="js/popup_new.js"></script>

    <script src="./js/price_list.js"></script>
  </body>
</html>
